<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $prefix = "AWT-DE";

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
        'customer_id', 'amount', 'depositable_type', 'depositable_id'
    ];

    /**
     * Boot the model.
     *
     * @return void
     */
    public static function boot()
    {
        static::creating(function ($deposit) {
            $deposit->code = $deposit->setCode();
        });
        parent::boot();
    }

    /**
     * Route resource binding using slug
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * @return string
     */
    public function type()
    {
        return $this->getMorphClass();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function depositable()
    {
        return $this->morphTo();
    }
}
