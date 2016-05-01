<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    /**
     * Fillable values on database table
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'body',
        'slug',
        'is_published',
        'category_id',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at'
    ];

    /**
     * Scope to quick check if article is published
     *
     * @param $query
     */
    public function scopeIsPublished($query){
        $query->where('is_published', 1);
    }

    public function getCreatedAtAttribute($date){
        return Carbon::parse($date)->format('Y-m-d');
    }

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

    /**
     * Get a list of tag ids associated with the current article
     *
     * @return array
     */
    public function getTagListAttribute(){
        return $this->tags->lists('id')->all();
    }
}