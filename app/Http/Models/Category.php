<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    /**
     * Fillable values on database table
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
        'parent_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at'
    ];

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
        return $this->belongsTo('App\Models\Category', 'parent_id')->first();
    }

    /**
     * Return relation to the childrens of current category
     */
    public function childs(){
        return $this->hasMany('App\Models\Category', 'parent_id')->get();
    }
}