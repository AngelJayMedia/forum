<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Thread;
use App\Exceptions\CannotLikeItem;


class LikeThreadJob
{
    private $thread;
    private $user;

    public function __construct(Thread $thread, User $user)
    {
        $this->thread = $thread;
        $this->user = $user;
    }

    public function handle()
    {
        if($this->thread->isLikedBy($this->user)) {
            throw CannotLikeItem::alreadyLiked('thread');
        }

        $this->thread->LikedBy($this->user);
    }
}
