<?php

namespace App\Mail;

use App\Models\Reply;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $reply;
    public $subscription;

    public function __construct(Reply $reply, Subscription $subscription)
    {
        $this->reply = $reply;
        $this->subscription = $subscription;
    }

    public function build()
    {
        return $this->subject("Re: {$this->reply->replyAble()->replyAbleSubject()}")
            ->markdown('emails.new_reply');
    }
}
