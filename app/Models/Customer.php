<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'activation_code',
        'country',
        'first_name',
        'last_name',
        'phone',
        'address',
        'company',
        'status',
        'is_subscribed'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes appended in the JSON form.
     *
     * @var array
     */
    protected $appends = [
        'name'
    ];

    /**
     * Route resource binding using slug
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Append display name to JSON form
     * @return string
     */
    public function getNameAttribute()
    {
        return empty($this->first_name) ? ucwords($this->username) : ucwords($this->first_name) . ' ' . ucwords($this->last_name);
    }

    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($customer)
        {
            $customer->activation_code = str_random(60);
        });
    }

    /**
     * Confirm the customer.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->status = true;
        $this->activation_code = null;
        $this->save();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function vpsProvisions()
//    {
//        return $this->hasMany(VpsProvision::class);
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function emailProvisions()
//    {
//        return $this->hasMany(EmailProvision::class);
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function webProvisions()
//    {
//        return $this->hasMany(WebProvision::class);
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function domainProvisions()
//    {
//        return $this->hasMany(DomainOrder::class);
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function sslProvisions()
//    {
//        return $this->hasMany(SslOrder::class);
//    }
}
