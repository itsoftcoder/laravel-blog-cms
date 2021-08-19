<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title','slug','body','status','image','user_id','is_approved','view_count'];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_post')->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','post_tag')->withTimestamps();
    }

    public function favorites()
    {
        return $this->belongsToMany('App\Models\User','user_favorite_post')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function notifications(){
        return $this->hasMany('App\Models\Notification');
    }
}
