<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ['name', 'content', 'admin_id', 'category_id'];

    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
