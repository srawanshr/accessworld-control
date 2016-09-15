<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyTraffic extends Model
{
    public $timestamps = false;
    protected $table = 'daily_traffic';
    protected $connection = 'DATACENTER';
    protected $fillable = [ 'uuid', 'date' ];
}
