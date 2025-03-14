<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('title')
             ->saveSlugsTo('slug');
     }
    
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes (){
        return $this->hasMany(Like::class);
    }

    public function commentsOnPosts(){
        return $this->hasManyThrough(Comment::class, Post::class);

    }

    public function likesOnPost(){
        return $this->hasManyThrough(Like::class, Post::class);
    }
    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'followee_id', 'follower_id');
    }
    public function followees(){
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followee_id');
    }
}

