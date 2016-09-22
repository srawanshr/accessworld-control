<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManualDeposit extends Model
{
    protected $fillable = ['user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function deposit()
    {
        return $this->morphOne(Deposit::class, 'depositable');
    }
}
