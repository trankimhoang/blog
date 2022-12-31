<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static find($id)
 */
class Comment extends Model {
    protected $table = "comments";
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
