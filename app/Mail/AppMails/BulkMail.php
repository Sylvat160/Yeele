<?php

namespace App\Mail\AppMails;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\ImageManagerStatic as Image;

class BulkMail extends Mailable
{
    use Queueable, SerializesModels;

    public Participant $participant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        string $email,
        public array $imagesPaths,
        public string $subject,
        public string $body
    )
    {
        $this->participant = Participant::where('email', $email)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this
        ->subject($this->subject)
        ->view('app.mails.bulkmail', [
            'body' => $this->body
        ]);

        foreach ($this->imagesPaths as $key => $value) {
            $img = Image::make(public_path($value));
            $img->text(
                $this->participant->firstname,
                $img->width() / 2,
                $img->height() / 2 + 10, function($font) use($key) {
                    $font->file(public_path('fonts/karla-Regular.ttf'));
                    $font->color('#000');
                    $font->align('center');
                    $font->valign('center');
                    if($key === "certificate") $font->size(30);
                    else $font->size(16);
                });
                $newFileName = time() . '.' . $img->extension;
                if (!file_exists(public_path('images/participants_assets'))) {
                    mkdir(public_path('images/participants_assets'), 0777, true);
                }
            $img->save(public_path('images/participants_assets') . '/' . $newFileName);
            $this->attach(public_path('images/participants_assets') . '/' . $newFileName);
        }

        return $this;
    }
}
