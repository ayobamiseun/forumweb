<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'topic_id', 'post',
    ];

    /**
     * Get the author of the post
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the topic in which the post is found
     *
     * @return Topic
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
