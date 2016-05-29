<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model{
    /**
     * Fillable values on database table
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'text'
    ];
}