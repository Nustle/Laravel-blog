<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\FeedbackEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackMailNotify
{
    /**
     * Handle the event of sending mail to user
     *
     * @param App\Events\FeedbackEvent $event
     * @return void
     */
    public function handle(FeedbackEvent $event)
    {
        $data = $event->getInputData();

        return Mail::to(env('MAIL_USERNAME'))
            ->send(new FeedbackMail($data));
    }
}
