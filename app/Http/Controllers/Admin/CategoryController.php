<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;

class CategoryController extends Controller
{
    public function __construct()
    {
        return $this->middleware([IsAdmin::class, Authenticate::class]);
    }
    
    public function index()
    {
        return view('admin.categories.index', [
            'categories'    => Category::all(),
        ]);
    }

    
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => ['required', 'unique:categories'],
        ]);

        Category::create([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category Created');
    }

    
    public function edit(Category $category)
    {  
       return view('admin.categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'  => ['required', 'unique:categories'],
        ]);

        $category->update([
            'name'  => $request->name,
            'slug'  => Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category Updated');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category Deleted');
    }
}
