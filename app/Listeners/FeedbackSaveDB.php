<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\FeedbackEvent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FeedbackSaveDB
{
    /**
     * Handle the event of saving mail into the database.
     *
     * @param App\Events\FeedbackEvent $event
     * @return void
     */
    public function handle(FeedbackEvent $event)
    {
        $data = $event->getInputData();

        return DB::table('mails')->insert([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
