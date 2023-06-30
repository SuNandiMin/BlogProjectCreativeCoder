<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;


class AdminBlogController extends Controller
{

    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(6)
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => ['required', Rule::unique('blogs', 'title')],
            'body' => ['required'],
            'category' => ['required', Rule::exists('categories', 'id')]
        ]);
        Blog::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'intro' => Str::of($validated['body'])->words(5, ' >>>'),
            'category_id' => $request->category,
            'user_id' => auth()->id(),
            'avatar' => $request->file('image') ? $request->file('image')->store('image') : null
        ]);
        return redirect('/admin/blogs')->with('success', 'Blog Created Successfully');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|unique:blogs,title,' . $blog->id,
            'body' => ['required'],
            'category' => ['required', Rule::exists('blogs', 'category_id')]
        ]);

        $blog->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'body' => $validated['body'],
            'intro' => Str::of($validated['body'])->words(5, ' >>>'),
            'category_id' => $request->category,
            'user_id' => auth()->id(),
            'avatar' => $request->file('image') ? $request->file('image')->store('image') : $blog->avatar
        ]);

        return redirect('/admin/blogs')->with('success', 'Blog Updated Successfully');
    }

    public function destory(Blog $blog)
    {
        $blog->delete();
        return back();
    }
}
