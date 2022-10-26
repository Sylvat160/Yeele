<?php

namespace App\Mail\AppMails;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipantRegisteringMail extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = route('participant-update-page', [$this->participant->id, $this->participant->event->uid]);
        $file = view('app.pdf', compact(['participant' => $this->participant]))->render();
        return $this
        ->subject("Inscription à l'évènement \"" . $this->participant->event->name . "\" réussie.")
        ->from(env('MAIL_FROM_ADDRESS'), "Yeele")
        ->view(
            'app.mails.participantRegisteringMail',
            [
                'participant' => $this->participant,
                'link' => $link
            ]
        )
        ->attachData($file, 'inscription.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
}