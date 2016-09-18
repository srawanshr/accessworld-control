<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManualPayment extends Model
{
    protected $fillable = [ 'user_id' ];

    public function invoice()
    {
        return $this->morphOne(Invoice::class, 'payable');
    }
}
