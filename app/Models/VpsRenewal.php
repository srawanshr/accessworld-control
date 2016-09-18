<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsRenewal extends Model
{
    protected $fillable = [ 'customer_id', 'invoice_id', 'vps_provision_id', 'provisioned_by', 'term', 'price', 'discount', 'start_date', 'expiry_date' ];
}
