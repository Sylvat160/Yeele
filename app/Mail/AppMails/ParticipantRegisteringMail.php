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
        $eventName = $this->participant->event->name;
        return $this
        ->subject("Confirmation de votre inscription à l'évènement $eventName")
        ->view(
            'app.mails.participantRegisteringMail',
            [
                'participant' => $this->participant
            ]
        );
    }
}
