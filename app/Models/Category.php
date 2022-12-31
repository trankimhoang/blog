<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 * @method static paginate(int $int)
 */
class Category extends Model {
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function post(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Post::class, 'category_id');
    }
}
