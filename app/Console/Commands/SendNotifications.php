<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notification;
use Illuminate\Support\Carbon;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marketingplatform:sendnotifications';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $validTime= Carbon::now()->subHours(2)->toDateTimeString();

        $notification=Notification::where("created_at", "<", $validTime)
                    ->where("status", false)
                    ->first();
        // $notification=Notification::where("id", 205)->first();

                        $notification->subject=$notification->updateSubject();

                        $mostVowelsWord=$notification->getWordWithMostWovels();

                        $recipients=DB::table('ricipient_notifications')
                                ->where("notification_id",$notification->id)
                                ->get();

                         foreach($recipients as $recipient){
                                Mail::to($recipient->email)->send(new NotificationMail($notification, $mostVowelsWord));

                                DB::table('ricipient_notifications')
                                    ->where("notification_id",$notification->id)
                                    ->where("email",$recipient->email)
                                    ->update(['status' => true]);
                       }

        $notification->status=true;
        $notification->save();
    }
}
