<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category', 'author', 'comments'];


    //scope filter
    function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', "LIKE", '%' . $search . '%')
                    ->orWhere('body', "LIKE", '%' . $search . '%');
            });
        });

        $query->when($filter['category'] ?? false, function ($query, $slug) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });

        $query->when($filter['author'] ?? false, function ($query, $user_name) {
            $query->whereHas('author', function ($query) use ($user_name) {
                $query->where('user_name', $user_name);
            });
        });
    }

    //one blog belongs to one category
    function category()
    {
        return $this->belongsTo(Category::class);
    }

    //one blog belongs to one user
    function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //one blog can has many comments
    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //each blog can have many subscribers
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'blog_user');
    }
}
