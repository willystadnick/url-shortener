<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'hash',
        'url',
    ];

    public function getRouteKeyName()
    {
        return 'hash';
    }
}
