<?php

namespace App;

class Comment extends Model
{
    /**
     * This model is responsible for handling the comments and describe the relation with other models.
     */

    /**
     * Comments relation with posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Comments relation with users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}