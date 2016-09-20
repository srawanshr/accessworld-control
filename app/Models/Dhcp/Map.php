<?php

namespace App\Models\Dhcp;

use Illuminate\Database\Eloquent\Model;

class Map extends Model {

    /**
     * Modal Connection String
     *
     * @var string
     */
    protected $connection = 'DHCP';

    /**
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Setting a primary key
     */
    protected $primaryKey = 'mac';

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
        return 'mac';
    }
}
