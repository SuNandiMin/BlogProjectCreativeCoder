<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    //one category may has many blog posts
    function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
