<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsProvision extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'customer_id',
        'vps_order_id',
        'operating_system_id',
        'data_center_id',
        'server_id',
        'virtual_machine',
        'uuid',
        'cpu',
        'ram',
        'disk',
        'traffic',
        'ip',
        'mac',
        'password',
        'is_trial',
        'is_managed',
        'is_suspended',
        'expiry_date',
        'provisioned_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_managed'   => 'boolean',
        'is_suspended' => 'boolean'
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
    public function vpsOrder()
    {
        return $this->belongsTo('App\Models\VpsOrder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataCenter()
    {
        return $this->belongsTo('App\Models\DataCenter');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provisionedBy()
    {
        return $this->belongsTo('App\Models\User', 'provisioned_by');
    }
}
