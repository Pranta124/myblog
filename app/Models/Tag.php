<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    public function post()
    {
        return $this->belongsTo('App\Models\Post','postId','id');
    }
}
