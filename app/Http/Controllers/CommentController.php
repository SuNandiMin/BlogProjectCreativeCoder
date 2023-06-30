<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog, Request $request)
    {
        $valided = $request->validate([
            'body' => 'required'
        ]);

        $blog->comments()->create([
            'user_id' => auth()->id(),
            'body' => $valided['body']
        ]);

        $subscribers = $blog->subscribers->filter(function ($subscriber) {
            return $subscriber->id != auth()->id();
        });

        $subscribers->each(function ($subscriber) use ($blog) {
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect('/blogs/' . $blog->slug);
    }
}
