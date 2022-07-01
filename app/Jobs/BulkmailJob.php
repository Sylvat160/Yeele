<?php

namespace App\Jobs;

use App\Mail\AppMails\BulkMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class BulkmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public array $participants,
        public array $imagesPaths,
        public string $subject,
        public string $body
    )
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->participants as $email) {
            Mail::to($email)->send(new BulkMail(
                $email,
                $this->imagesPaths,
                $this->subject,
                $this->body
            ));
        }
    }
}
