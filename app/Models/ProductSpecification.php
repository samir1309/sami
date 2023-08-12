<?php namespace App\Models;

use App\Library\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductSpecification extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id', 'product_specification_type_id',
        'product_specification_value_id',
        'image', 'price', 'description','color',
        'barcode','max','sort','convert_hamide','stocks','stocks_c'
        ,'check_item','type','old_price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function productSpecificationType()
    {
        return $this->belongsTo('App\Models\ProductSpecificationType', 'product_specification_type_id');
    }
     public function productFilter()
    {
        return $this->belongsTo('App\Models\ProductSpecificationType', 'product_specification_type_id')->where('filter','1');
    }

    public function getStockCountAttribute(){
        $stock_in = InventoryReceipt::where('product_id',$this->attributes['product_id'])->where('product_specification_value_id',$this->attributes['product_specification_value_id'])->orderBy('id','DESC')->In()->sum('count');
        $stock_out = InventoryReceipt::where('product_id',$this->attributes['product_id'])->where('product_specification_value_id',$this->attributes['product_specification_value_id'])->orderBy('id','DESC')->Out()->sum('count');
        $mines = intval($stock_in-$stock_out);
        if($mines > 0 ){
            return $mines;
        }else{
            return 0;

        }
    }

    public function productSpecificationValue()
    {
        return $this->belongsTo('App\Models\ProductSpecificationType', 'product_specification_value_id');
    }
    public function prices()
    {
        $set = Setting::first();
        if ($set->black_friday == 1){
            return $this->morphMany('App\Models\Price', 'Priceable')->orderBy('id','DESC');
        }
        else{
            return $this->morphMany('App\Models\Price', 'Priceable')->where('black_friday',0)->orderBy('id','DESC');

        }
    }

    public function pricesThird()
    {
        $set = Setting::first();
        if ($set->black_friday == 1){
            return $this->morphMany('App\Models\Price', 'Priceable')->where('price','>','1')->orderBy('price','ASC');
        }
        else{
            return $this->morphMany('App\Models\Price', 'Priceable')->where('black_friday',0)->where('price','>','1')->orderBy('price','ASC');

        }
    }
    public function pricesAdmin()
    {
        return $this->morphMany('App\Models\Price', 'Priceable');
    }
    public function sp_images()
    {
               return $this->hasMany('App\Models\Image', 'product_specification_id')->orderby('sort','ASC')->orderby('thumbnail','DESC');

    }
    public function sp_image()
    {
               return $this->hasMany('App\Models\Image', 'product_specification_id')->where('thumbnail','1')->take(1)->orderby('id','ASC');

    }
       public function sp_imgs()
    {
        return $this->hasMany('App\Models\Image', 'product_specification_id')->orderby('id','DESC')->orderby('thumbnail','DESC');
    }
    public function getProImageAttribute(){
        $thumbnail = Image::where('product_specification_id',$this->attributes['id'])->show()->first();
        $product_image = Image::where('product_specification_id',$this->attributes['id'])->first();
        if($thumbnail){
            return file_exists('assets/uploads/content/pro/big/'.@$thumbnail->file) ? asset('assets/uploads/content/pro/big/'.@$thumbnail->file) :asset('assets/site/images/notfound.png');
        }elseif($product_image){
            return file_exists('assets/uploads/content/pro/big/'.@$product_image->file) ? asset('assets/uploads/content/pro/big/'.@$product_image->file) :asset('assets/site/images/notfound.png');
        }else{
            return asset('assets/site/images/notfound.png');
        }
    }
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = intval(Helper::persian2LatinDigit(str_replace(',','',str_replace('،','',$value))));
    }
    public function setOldPriceAttribute($value)
    {
        $this->attributes['old_price'] = intval(Helper::persian2LatinDigit(str_replace(',','',str_replace('،','',$value))));
    }


}
