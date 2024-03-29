<?php

namespace App\Mail\AppMails;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $link;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct(string $link, User $notifiable)
    {
        $this->link = $link;
        $this->user = $notifiable;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Réinitialisation de mot de passe')
        ->view(
            'app.mails.reset-password-mail',
            [
                'link' => $this->link,
                'user' => $this->user
                ]
        );
    }
}
