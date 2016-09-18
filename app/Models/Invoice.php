<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $prefix = "AWT-IN";

    protected $fillable = [ 'customer_id', 'order_id', 'date', 'code', 'sub_total', 'discount', 'vat', 'total', 'payable_id', 'payable_type' ];

    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($invoice) {
            $invoice->code = $invoice->setCode();
            $invoice->date = date('Y-m-d');
        });
    }

    /**
     * @return float
     */
    public static function getVat()
    {
        $vat = 0.13;
        return $vat;
    }

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

    /**
     * @return string
     */
    protected function setCode()
    {
        $maxId = self::where('code', 'like', $this->prefix . "-" . date('Ymd') . "%")->max('code');

        if ($maxId)
            $serialNumber = sprintf('%04d', intval(explode('-', $maxId)[3] + 1));
        else
            $serialNumber = sprintf('%04d', 1);

        $date = date('Ymd');
        return $this->prefix . '-' . $date . '-' . $serialNumber;
    }

    public function payable()
    {
        return $this->morphTo();
    }
}
