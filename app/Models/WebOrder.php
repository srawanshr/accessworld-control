<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebOrder extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'name', 'term', 'domain', 'disk', 'traffic', 'price', 'discount', 'is_provisioned'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
