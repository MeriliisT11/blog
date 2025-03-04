<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Ensure Storage facade is imported

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'image']; // Add 'image' if it's fillable

    public function snippet(): Attribute {
        return Attribute::get(function() {
            return explode("\n\n", $this->body)[0]; // Return the first paragraph of the body
        });
    }

    public function imageFile(): Attribute {
        return Attribute::get(function() {
            // Check if the 'image' attribute exists and is a valid URL
            if (isset($this->attributes['image']) && parse_url($this->attributes['image'], PHP_URL_SCHEME) !== null) {
                return false; // Return false if it's a valid URL
            } else {
                return Storage::url($this->attributes['image']); // Return the storage URL
            }
        });
    }

    public function image(): Attribute {
        return Attribute::get(function() {
            // Check if the 'image' attribute exists
            if (isset($this->attributes['image']) && parse_url($this->attributes['image'], PHP_URL_SCHEME) !== null) {
                return $this->attributes['image']; // Return the image directly if it's a valid URL
            } else {
                return Storage::url($this->attributes['image']); // Return the storage URL
            }
        });
    }

    public function authHasLiked(): Attribute {
        return Attribute::get(function() {
            if(!auth()->user()){
                return false;
            }
           return auth()->user()->likes()->where('post_id', $this->id)->exists();
        });
    }


    protected static function booted(): void {
        static::deleting(function ($post){
            Storage::disk('public')->delete($post->imageFile);
        });

    }
   
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function comments (){
        return $this->hasMany(Comment::class)->latest();
    }

    public function tags (){
        return $this->belongsToMany(Tag::class);
    }

    public function likes (){
        return $this->hasMany(Like::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

