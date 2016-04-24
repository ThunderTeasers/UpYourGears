<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    /**
     * Get associated article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article(){
        return $this->belongsTo('App\Models\Article');
    }

    /**
     * Get associated user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}