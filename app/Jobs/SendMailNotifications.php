<?php

namespace App\Jobs;

use App\Mail\SendNotificationMail;
use App\Models\Email;
use App\Models\MailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMailNotifications implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected MailNotification $mailNotification)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $emails = Email::where('user_id',$this->mailNotification->user_id)->get();

        foreach($emails as $email){
            Mail::to($email->email)->send(new SendNotificationMail($this->mailNotification));
        }

        $this->mailNotification->update(['status' => 2]);
    }
}
