<?php

namespace App\Http\Controllers\Pages;

use App\Models\Tag;
use App\Models\Thread;
use App\Models\Category;
use App\Jobs\CreateThread;
use App\Jobs\UpdateThread;
use Illuminate\Http\Request;
use App\Policies\ThreadPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\ThreadStoreRequest;
use App\Jobs\SubscribeToSubscriptionAble;
use App\Jobs\UnsubscribeFromSubscriptionAble;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

class ThreadController extends Controller
{
    public function __construct() {
        return $this->middleware([Authenticate::class, EnsureEmailIsVerified::class])->except(['index', 'show']);
    }


    public function index()
    {
        return view('pages.threads.index', [
            'threads'   => Thread::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return  view('pages.threads.create', [
            'categories'    => Category::all(),
            'tag'           => Tag::all(),
        ]);
    }

    public function store(ThreadStoreRequest $request)
    {
        $this->dispatchSync(CreateThread::fromRequest($request));

        return redirect()->route('threads.index')->with('success', 'Thread created !');
    }

    public function show(Category $category, Thread $thread)
    {
        return view('pages.threads.show', compact('thread', 'category'));
    }

    public function edit(Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);
        
        $oldTags = $thread->tags()->pluck('id')->toArray();
        $selectedCategory = $thread->category;

        return view('pages.threads.edit', [
            'thread'            => $thread,
            'tags'              => Tag::all(),
            'oldTags'           => $oldTags,
            'categories'        => Category::all(),
            'selectedCategory'  => $selectedCategory,
        ]);
    }


    public function update(ThreadStoreRequest $request, Thread $thread)
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);

        $this->dispatchSync(UpdateThread::fromRequest($thread, $request));

        return redirect()->route('threads.index')->with('success', 'Thread Updated !');
    }


    public function subscribe(Request $request, Category $category, Thread $thread) {
        $this->authorize(ThreadPolicy::SUBSCRIBE, $thread);

        $this->dispatchSync(new SubscribeToSubscriptionAble($request->user(), $thread));

        return redirect()->route('threads.show', [$thread->category->slug(), $thread->slug()])
            ->with('success', 'You have been subscribed to this thread');
    }

    public function unsubscribe(Request $request, Category $category, Thread $thread) {
        $this->authorize(ThreadPolicy::UNSUBSCRIBE, $thread);

        $this->dispatchSync(new UnsubscribeFromSubscriptionAble($request->user(), $thread));

        return redirect()->route('threads.show', [$thread->category->slug(), $thread->slug()])
            ->with('success', 'You have been unsubscribed from this thread');
    }
}
