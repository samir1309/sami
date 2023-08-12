<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ProductComplement extends Model
{
    protected $table='product_complement';
    protected $fillable = [
        'product_id',
        'category_id',
        'type',

    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }
    public function complement()
    {
        return $this->belongsTo('App\Models\Category', 'category_id','id');
    }




}
