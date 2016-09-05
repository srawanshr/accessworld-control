<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['service_id', 'name', 'slug', 'description', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components()
    {
        return $this->hasMany('App\Models\Component');
    }

    public static function boot()
    {
        parent::boot();

        // registering a callback to be executed upon the creation of an activity AR
        static::creating(function ($package)
        {

            // produce a slug based on the activity title
            $slug = str_slug($package->name);

            // check to see if any other slugs exist that are the same & count them
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            // if other slugs exist that are the same, append the count to the slug
            $package->slug = $count ? "{$slug}-{$count}" : $slug;

        });
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}