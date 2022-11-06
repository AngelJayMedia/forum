<?php

namespace App\Http\Controllers\Pages;

use App\Models\Tag;
use App\Models\Thread;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Tag $tag) {
        return view('pages.tags.index', [
            'threads'   => Thread::ForTag($tag->slug())->paginate(10),
        ]);
    }
}
