<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');//user_id
        
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');//Category_id
    }
    public function tags()
    {
        return $this->hasMany('App\Models\Tag','postId','id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    //Define scope
    //Published()
    public function scopePublished($query)
    {
        return $query->where('status',1);
    }
    //Many to Many
    public function likedUsers()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

}
