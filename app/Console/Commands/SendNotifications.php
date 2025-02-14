<?php

namespace App\Console\Commands;

use App\Jobs\SendMailNotifications;
use App\Models\MailNotification;
use Illuminate\Console\Command;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $activeMailNotification = MailNotification::where('status',0)->where('published_at','<=',now())->get();
        foreach($activeMailNotification as $notification){
            $notification->update(['status' => 1]);
            SendMailNotifications::dispatch($notification);
        }
    }
}
