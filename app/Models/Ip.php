<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'subnet_id', 'ip', 'mac', 'hostname', 'is_used'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_used' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subnet()
    {
        return $this->belongsTo(Subnet::class);
    }

    /**
     * @param $query
     * @param bool $type
     */
    public function scopeUsed($query, $type = true)
    {
        return $query->where('is_used', $type);
    }
}
