<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    /**
     * Return relation to the post
     */
    public function articles(){
        return $this->hasMany('App\Models\Article');
    }

    /**
     * Return relation to the parent category
     */
    public function parent(){
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function childs(){
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}