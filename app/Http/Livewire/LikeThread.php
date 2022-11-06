<?php

namespace App\Http\Livewire;

use App\Models\Thread;
use Livewire\Component;
use App\Jobs\LikeThreadJob;
use App\Jobs\UnlikeThreadJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;

class LikeThread extends Component
{
    use DispatchesJobs;

    public $thread;

    public function mount(Thread $thread) {
        $this->thread = $thread;
    }

    public function toggleLike() {

        if($this->thread->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeThreadJob($this->thread, Auth::user()));

        } else {
            $this->dispatchSync(new LikeThreadJob($this->thread, Auth::user()));
        }
    }

    public function render()
    {
        return view('livewire.like-thread');
    }
}
