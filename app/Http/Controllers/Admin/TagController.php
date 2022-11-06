<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;

class TagController extends Controller
{
    public function __construct() {
        return $this->middleware([IsAdmin::class, Authenticate::class]);
    }

    public function index()
    {
        return view('admin.tags.index', [
            'tags'  => Tag::all(),
        ]);
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => ['required', 'unique:tags']
        ]);

        Tag::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Tag Created');
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        //$this->validate($request, [
        //   'name'  => ['required', 'unique:tags']
        // ]);

        $this->validate($request, [
            'name'  => ['required', Rule::unique('tags')->ignore($tag)]
        ]);

        $tag->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Tag Updated');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('success', 'Tag Deleted');
    }
}
