<?php

namespace App;

class Tag extends Model
{
    /**
     * This model is responsible for handling the tags and describe the relation with other models.
     */

    /**
     * Tags relation with posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * Return the tag name
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'name';
    }
}