<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name','slug','image'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','category_post')->withTimestamps();
    }
}
