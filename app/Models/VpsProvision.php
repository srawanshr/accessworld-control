<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsProvision extends Model
{
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
        'vdi_uuid',
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
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vpsOrder()
    {
        return $this->belongsTo(VpsOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataCenter()
    {
        return $this->belongsTo(DataCenter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provisionedBy()
    {
        return $this->belongsTo(User::class, 'provisioned_by');
    }

    public function renewals()
    {
        return $this->hasMany(VpsRenewal::class);
    }
}
