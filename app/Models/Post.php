<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'description',
    ];
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function dislikes() {
        return $this->hasMany('App\Models\Dislike');
    }

    public function allLikes($post_id) {
        // return $post_id;
        $posts = $this->likes()->where('post_id', $post_id)->get();
        return count($posts);
    }
}

