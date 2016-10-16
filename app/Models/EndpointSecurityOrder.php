<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndpointSecurityOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'user_count', 'term', 'price', 'currency', 'discount', 'is_provisioned'
    ];

    /**
     * @param $query
     * @param $type
     * @return mixed
     */
    public function scopeProvisioned($query, $type)
    {
        return $query->whereIsProvisioned($type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return mixed
     */
    public function customer()
    {
        return $this->order->customer();
    }
}
