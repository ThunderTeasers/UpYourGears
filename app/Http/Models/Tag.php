<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model{
    /**
     * Disable timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fillable values on database table
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug'
    ];
    
    /**
     * Get the articles associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles(){
        return $this->belongsToMany('App\Models\Article');
    }
}