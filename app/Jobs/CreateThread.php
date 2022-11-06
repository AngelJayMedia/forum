<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Requests\ThreadStoreRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateThread implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $title; 
    private $body;
    private $category;
    private $tags; 
    private $author;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $title, string $body, string $category, array $tags, User $author)
    {
        $this->title = $title; 
        $this->body = $body;
        $this->category = $category;
        $this->tags = $tags;
        $this->author = $author; 
    }

    public static function fromRequest(ThreadStoreRequest $request): self {
        
        return new static (
            $request->title(),
            $request->body(),
            $request->category(),
            $request->tags(),
            $request->author(),
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Thread
    {
        $thread = new Thread([
            'title'         => $this->title,
            'slug'          => Str::slug($this->title),
            'body'          => $this->body,
            'category_id'   => $this->category,
        ]);

        $thread->authoredBy($this->author);
        $thread->syncTags($this->tags);
        $thread->save();

        return $thread;

    }
}
