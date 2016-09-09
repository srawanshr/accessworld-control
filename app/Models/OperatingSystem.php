<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'slug', 'name', 'price', 'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
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
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    /**
     * @param $query
     */
    public function scopeActive($query, $type = true)
    {
        return $query->where('is_active', $type);
    }

    /**
     * @return bool
     */
    public function isUbuntu()
    {
        return str_contains(strtolower($this->name), 'ubuntu');
    }

    /**
     * @return bool
     */
    public function isCentos()
    {
        return str_contains(strtolower($this->name), 'centos');
    }

    /**
     * @return bool
     */
    public function isWindows()
    {
        return str_contains(strtolower($this->name), 'windows');
    }

    /**
     * @return bool
     */
    public function isIspConfig()
    {
        return str_contains(strtolower($this->name), 'ispconfig');
    }

    /**
     * @return bool
     */
    public function isCpanel()
    {
        return str_contains(strtolower($this->name), 'cpanel');
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        $this->image->delete();

        return parent::delete($options);
    }
}
