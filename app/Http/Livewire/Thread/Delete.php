<?php

namespace App\Http\Livewire\Thread;

use App\Policies\ThreadPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;

    public $thread; 
    public $confirmingThreadDeletion =false;

    public function confirmThreadDeletion() {
        
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('confirming-delete-thread');
        $this->confirmingThreadDeletion = true;
    }

    public function deleteThread() {

        $this->authorize(ThreadPolicy::DELETE, $this->thread);
        $this->thread->delete();
        session()->flash('success', 'Thread Deleted !');
        return redirect()->route('threads.index');
    }

    public function render()
    {
        return view('livewire.thread.delete');
    }
}
