<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'short_description', 'description', 'order', 'view', 'is_featured', 'is_published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_featured'  => 'boolean',
        'is_published' => 'boolean'
    ];

    /**
     * Route resource binding using slug
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function banner()
    {
        return $this->morphOne('App\Models\Banner', 'bannerable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany('App\Models\Feature');
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        $this->image->delete();

        parent::delete($options);
    }
}
