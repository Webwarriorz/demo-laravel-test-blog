<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    /**
     * This model is responsible for handling the posts and describe the relation with other models.
     */

    /**
     * Posts relation with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Filter the posts by the given date.
     *
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {

        if (!empty($filters) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (!empty($filters) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

        return $query;
    }

    /**
     * Posts relation with the comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Handle the comment, if the user send one.
     *
     * @param string $body
     */
    public function addComment($body)
    {
        $userId = auth()->user()->id;
        $this->comments()->create([
            'body' => $body,
            'user_id' => $userId
        ]);
    }

    /**
     * Collect the posts archives.
     *
     * @return mixed
     */
    public static function archives()
    {
        return Post::selectRaw(' year(created_at) as year, monthname(created_at) as month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    /**
     * Posts relation with tags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}