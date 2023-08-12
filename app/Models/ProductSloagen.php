<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ProductSloagen extends Model
{
    protected $table='product_sloagen';
    protected $fillable = [
        'product_id',
        'sloagen_id',

    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }
    public function sloagen()
    {
        return $this->belongsTo('App\Models\Sloagen', 'sloagen_id','id');
    }




}
