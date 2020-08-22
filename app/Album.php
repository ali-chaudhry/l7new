<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use Uuid;
    protected $primaryKey = 'id';
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
         'name', 'user','cover_image', 'description', 'publish'
    ];
}
