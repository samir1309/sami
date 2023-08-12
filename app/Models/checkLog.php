<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class checkLog extends Model
{
    use SoftDeletes;


    protected $table = 'check_logs';

    protected $fillable = [
        'product_id','inventory_type_id','user_id',
        'factor_id','controller','count','product_specification_value_id'

    ];

}
