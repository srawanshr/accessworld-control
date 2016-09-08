<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCenter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'prefix', 'price', 'country'
    ];

    /**
     * Route resource binding using slug
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
