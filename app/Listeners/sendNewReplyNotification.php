<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\ReplyWasCreated;
use App\Notifications\NewReplyNotification;

class sendNewReplyNotification
{
    public function handle(ReplyWasCreated $event)
    {
        $thread = $event->reply->replyAble();

        // foreach ($event->reply->subscriptions() as $subscription) {
            //if ($this->replyAuthorDoesNotMatchSubscriber($event->reply->author(), $subscription)) {
                //$subscription->user()->notify(new  NewReplyNotification($event->reply, $subscription));
            //}
        //}
    }

    private function replyAuthorDoesNotMatchSubscriber(User $author, $subscription): bool
    {
        return !$author->matches($subscription->user());
    }
}
