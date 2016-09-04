<?php

namespace App\Models;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'size'];

    /**
     * @param  string  $value
     * @return string
     */
    public function getPathAttribute($value)
    {
        return 'storage/'.$value;
    }

    /**
     * Unlink Image
     */
    public function deleteImage()
    {
        if ( ! empty($this->path) && file_exists($this->path))
            unlink($this->path);
    }
}
