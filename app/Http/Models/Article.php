<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    /**
     * Return relation to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get article category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the tags associated with the given article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    /**
     * Get article comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
}