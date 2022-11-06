<?php

namespace App\Http\Livewire;

use App\Models\Reply;
use Livewire\Component;
use App\Jobs\LikeReplyJob;
use App\Jobs\UnlikeReplyJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;

class LikeReply extends Component
{
    use DispatchesJobs;

    public $reply;

    public function mount(Reply $reply) {
        $this->reply = $reply;
    }

    public function toggleLike() {

        if($this->reply->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeReplyJob($this->reply, Auth::user()));

        } else {
            $this->dispatchSync(new LikeReplyJob($this->reply, Auth::user()));
        }
    }

    public function render()
    {
        return view('livewire.like-reply');
    }
}
