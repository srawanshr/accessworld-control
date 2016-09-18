<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailProvision extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'customer_id',
        'email_order_id',
        'provisioned_by',
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
    public function emailOrder()
    {
        return $this->belongsTo('App\Models\EmailOrder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provisionedBy()
    {
        return $this->belongsTo('App\Models\User', 'provisioned_by');
    }
}
