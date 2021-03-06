<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable{
    use \Illuminate\Auth\Authenticatable;

    /**
     * Fillable values on database table
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'is_admin',
        'is_published',
        'image',
        'created_at',
        'updated_at',
        'remember_token'
    ];

    /**
     * Getting user articles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    /**
     * Check if user is admin
     *
     * @return bool
     */
    public function isAdmin(){
        return $this->is_admin;
    }

    /**
     * Getting user comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Modes\Comment');
    }
}
