<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'user_name', 'email', 'password',
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
     * Parse as Carbon date
     *
     * @var array
     */
    protected $dates = ['last_activity'];

    /**
     * Get posts written by the user
     *
     * @return array Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class)->latest();
    }

    /**
     * Get topics the user created
     *
     * @return array Topic
     */
    public function topics()
    {
        return $this->hasMany(Topic::class)->orderBy('last_post', 'DESC');
    }

    /**
     * Boolean indicating if the user has a profile picture or not
     *
     * @return boolean
     */
    public function getHasProfilePictureUrlAttribute()
    {
        $path = '/img/profile/' . $this->id . '.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION');
        return file_exists(public_path($path));
    }

    /**
     * Perentage of posts written by the user
     *
     * @return float
     */
    public function getPercentagePostsAttribute()
    {
        $total = Post::count();
        $count = $this->posts()->count();
        $output = 0;

        if ($total > 0) {
            $output = $count * 100 / $total;
        }

        return number_format($output, 2);
    }

    /**
     * Perentage of topics created by the user
     *
     * @return float
     */
    public function getPercentageTopicsAttribute()
    {
        $total = Topic::count();
        $count = $this->topics()->count();
        $output = 0;

        if ($total > 0) {
            $output = $count * 100 / $total;
        }

        return number_format($output, 2);
    }

    /**
     * Posts per day
     *
     * @return float
     */
    public function getPostsPerDayAttribute()
    {
        $days = Carbon::now()->diffInDays($this->created_at) + 1;
        $count = $this->posts()->count();

        return number_format($count / $days, 2);
    }

    /**
     * Get profile picture URL
     *
     * @return string
     */
    public function getProfilePictureUrlAttribute()
    {
        $path = '/img/profile/' . $this->id . '.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION');
        if (file_exists(public_path($path))) {
            return $path;
        } else {
            return '/img/profile/0.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION');
        }
    }

    /**
     * Get profile small picture URL
     *
     * @return string
     */
    public function getProfileSmallPictureUrlAttribute()
    {
        $path = '/img/profile/' . $this->id . '-s.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION');
        if (file_exists(public_path($path))) {
            return $path;
        } else {
            return '/img/profile/0-s.' . \Config::get('constants.PROFILE_PICTURE_EXTENSION');
        }
    }

    /**
     * Topics per day
     *
     * @return float
     */
    public function getTopicsPerDayAttribute()
    {
        $days = Carbon::now()->diffInDays($this->created_at) + 1;
        $count = $this->topics()->count();

        return number_format($count / $days, 2);
    }
}
