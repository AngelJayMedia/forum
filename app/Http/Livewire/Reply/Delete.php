<?php

namespace App\Http\Livewire\Reply;

use App\Models\Reply;
use Livewire\Component;
use App\Policies\ReplyPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{
    use AuthorizesRequests;
    
    public $replyId;
    public $page;

    public function mount($page) {
        $this->page = $page;
    }

    public function deleteReply() {
        $reply = Reply::findOrFail($this->replyId);
        $this->authorize(ReplyPolicy::DELETE, $reply);
        $reply->delete();
        $this->emitUp('deleteReply', $this->page);
        
    }

    public function render()
    {
        return view('livewire.reply.delete');
    }
}
