<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $prefix = "AWT-IN";

    protected $fillable = [
        'customer_id',
        'order_id',
        'date',
        'code',
        'sub_total',
        'discount',
        'vat',
        'total',
        'payable_id',
        'payable_type'
    ];

    /**
     * Route resource binding using code
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function setDateAttribute()
    {
        $this->attributes['date'] = date('Y-m-d');
    }

    public function payable()
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    protected function setCodeAttribute()
    {
        $maxId = self::where('code', 'like', $this->prefix . "-" . date('Ymd') . "%")->max('code');

        if ($maxId) $serialNumber = sprintf('%04d', intval(explode('-', $maxId)[3] + 1));
        else
            $serialNumber = sprintf('%04d', 1);

        $date = date('Ymd');
        $this->attributes['code'] = $this->prefix . '-' . $date . '-' . $serialNumber;
    }
}
