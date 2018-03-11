<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /**
     * This model is responsible for handling the user, and describe the relation with other models.
     */

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Users relation with the posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Save the post and assign the post for the current user.
     *
     * @param Post $post
     */
    public function publish(Post $post)
    {
        // Save the array, that already given
        $this->posts()->save($post);
    }

    /**
     * Update the post and assign the post for the current user.
     *
     * @param Post $post
     */
    public function updatePost(Post $post)
    {
        // Save the array, that already given
        $this->posts()->update($post);
    }

    /**
     * Check the user is admin.
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Users relation with the comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}