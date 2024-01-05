<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'user_id', 'comments_content'
    ];

    /**
     * Get the commentator that owns the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commentator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }       

    /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

}
