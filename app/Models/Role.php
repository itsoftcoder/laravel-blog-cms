<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Models\LaratrustRole;

class Role extends Model
{
    public $guarded = [];

    protected $table = 'roles';

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
