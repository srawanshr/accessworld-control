<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DhcpMap extends Model
{
    protected $connection = 'DHCP';

    /**
     * Table name
     * @var string
     */
    protected $table = 'maps';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Setting non-incrementing or a non-numeric primary key
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mac', 'subnet', 'hostname', 'serial', 'ip'
    ];

    /**
     * Route resource binding using ip
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'ip';
    }
}
