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
     *
     */
    public function deleteImage()
    {
        if ( ! empty($this->path) && file_exists('storage/' . $this->path))
            unlink('storage/' . $this->path);
    }
}
