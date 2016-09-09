<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsOrder extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'order_id', 'name', 'term', 'cpu', 'ram', 'disk', 'traffic', 'price', 'discount', 'is_trial', 'is_managed', 'is_provisioned', 'additional_ip'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
