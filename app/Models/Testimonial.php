<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'quote', 'is_published'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }
}
