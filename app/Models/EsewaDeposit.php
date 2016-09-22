<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsewaDeposit extends Model
{
    protected $fillable = ['refid', 'is_verified'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function deposit()
    {
        return $this->morphOne(Deposit::class, 'depositable');
    }
}
