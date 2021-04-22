<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Topic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'last_post',
    ];

    /**
     * Parse as Carbon date
     *
     * @var array
     */
    protected $dates = ['last_post'];

    /**
     * Get the creator of the topic
     *
     * @return User
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get posts in the topic
     *
     * @return array Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get last post in this topic
     *
     * @return Post
     */
    public function getLastPostAttribute()
    {
        return $this->posts()->latest()->first();
    }
}
