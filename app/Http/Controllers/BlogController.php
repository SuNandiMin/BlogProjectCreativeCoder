<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'random_blogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    //subscription handaler function
    public function subscriptionHandaler(Blog $blog)
    {
        if (User::find(auth()->id())->isSubscribed($blog)) {
            $this->unSubscribe($blog);
            return back()->with('success', 'unsubscribted success for this blog');
        } else {
            $this->subscribe($blog);
            return back()->with('success', 'subscribted success for this blog');
        }
    }

    private function unSubscribe($blog)
    {
        $blog->subscribers()->detach(auth()->id());
    }

    private function subscribe($blog)
    {
        $blog->subscribers()->attach(auth()->id());
    }
}
