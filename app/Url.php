<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'url',
        'hash',
        'pass',
    ];

    public function getRouteKeyName()
    {
        return 'hash';
    }
}
