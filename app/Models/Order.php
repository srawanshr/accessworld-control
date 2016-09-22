<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'slug', 'date', 'created_by', 'approved_by'
    ];

    protected $appends = ['status', 'is_pending'];

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopeStatus($query, $type = true)
    {
        return $query->where('status', $type);
    }

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
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function approved_by()
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

    public function getStatusAttribute()
    {
        if(!empty($this->deleted_at))
            return 'Rejected';
        if(empty($this->approved_by))
            return 'Pending';
        else
            return 'Approved';
    }

    public function getIsPendingAttribute()
    {
        if(!empty($this->deleted_at))
            return false;
        if(empty($this->approved_by))
            return true;
        else
            return false;
    }
}
