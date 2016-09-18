<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'slug', 'date', 'created_by', 'approved_by', 'status'
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
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vpsOrder()
    {
        return $this->hasMany(VpsOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vpsRenewals()
    {
        return $this->hasMany(VpsRenewal::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function webOrder()
    {
        return $this->hasMany(WebOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emailOrder()
    {
        return $this->hasMany(EmailOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
