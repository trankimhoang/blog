<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, $id)
 * @method static find($id)
 */
class Post extends Model {
    protected $table = "posts";

    protected $fillable = ['name', 'content', 'admin_id', 'category_id', 'image'];

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImage(): string {
        if (!empty($this->image) && is_file(public_path($this->image))) {
            return asset($this->image);
        }

        return asset('images/not_found.jpg');
    }
}
