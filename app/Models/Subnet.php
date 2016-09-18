<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subnet extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subnet', 'serial', 'lease_time', 'gateway', 'subnet_mask', 'broadcast_address', 'domain_name_servers', 'domain_name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ips()
    {
        return $this->hasMany(Ip::class);
    }
}
