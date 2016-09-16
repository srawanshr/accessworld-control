<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebProvision extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'customer_id',
        'web_order_id',
        'provisioned_by',
        'term',
        'domain',
        'disk',
        'traffic',
        'connection_string',
        'server_domain_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function webOrder()
    {
        return $this->belongsTo('App\Models\WebOrder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provisionedBy()
    {
        return $this->belongsTo('App\Models\User', 'provisioned_by');
    }
}
