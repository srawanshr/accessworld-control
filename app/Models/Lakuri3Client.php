<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lakuri3Client extends Model
{
    protected $connection = 'LAKURI3';

    protected $table = 'client';

    protected $primaryKey = 'client_id';

    public $timestamps = false;
}
