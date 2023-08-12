<?php

namespace App\Models;

use App\Library\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'products';
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'status', 'keyword','description_seo',
        'url', 'title_seo', 'brand_id', 'lead','popular','end_date','vid_fix',
        'sort','special','max','weight','sell','newest','available','timer','date',
        'hour','video_link','title_en','warning','old_id','count','seo_convert','not_found','convert_spf','how_to_use'
        ,'ingredients','specification_title','barcode','check_stock','price','old_price','fix','stocks','stock_fix','fix_st','noindex'
        ,'order_count','like_count','int_old_price','int_price','deleted_at','stocks_c','stock','check_item','pr','old_pr'

    ];



    public function getPriceFirstAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }

        $prices_specifications = ProductSpecification::orderBy('id','DESC')->where('type','1')->where('product_id',$this->attributes['id'])->get();
        $selected_specification = null;
        $founded = false;

        if($prices_specifications){
            foreach($prices_specifications as $row){
                if($founded == false && intval(@$row->price) !== 0){

                    $selected_specification = $row;
                    $founded = true;
                }
            }
        }




        if($selected_specification === null){


            return ['old'=> number_format(intval($this->attributes['old_price'])) . ' تومان ','price'=> $prices->price ? number_format(intval($this->attributes['price'])) . ' تومان ': 'ناموجود'];


        }elseif($selected_specification){


            return ['old'=> number_format(intval($selected_specification->old_price)) . ' تومان ','price'=> $selected_specification->price ? number_format(intval($selected_specification->price)) . ' تومان ': 'ناموجود'];



        }else{

            return ['old'=>'','price'=>'ناموجود'];

        }

    }




    public function getPriceFirstHamideAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }

        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();

        if(@$prcies_specification->price == 0){
            return ['old'=> number_format(intval($this->attributes['old_price'])) . ' تومان ','price'=> $this->attributes['price'] ? number_format(intval($this->attributes['price'])) . ' تومان ': 'ناموجود'];
        }elseif($prcies_specification){
            return ['old'=> number_format(intval($prcies_specification->old_price)) . ' تومان ','price'=> $prcies_specification->price ? number_format(intval($prcies_specification->price)) . ' تومان ': 'ناموجود'];
        }else{
            return ['old'=>'','price'=>'ناموجود'];
        }

    }

    public function getStockCountAttribute(){
        $stock_in = InventoryReceipt::where('product_id',$this->attributes['id'])->orderBy('id','DESC')->In()->sum('count');
        $stock_out = InventoryReceipt::where('product_id',$this->attributes['id'])->orderBy('id','DESC')->Out()->sum('count');
        $mines = intval($stock_in-$stock_out);

        if($mines > 0 ){
            return $mines;

        }else{
            return 0;

        }
    }


    public function getStockCountEditAttribute(){
        $stock_in = InventoryReceipt::where('product_id',$this->attributes['id'])->whereHas('productSpecificationValue',function($q){
            $q->whereHas('sp');
        })->orderBy('id','DESC')->In()->sum('count');
        $stock_out = InventoryReceipt::where('product_id',$this->attributes['id'])->whereHas('productSpecificationValue',function($q){
            $q->whereHas('sp');
        })->orderBy('id','DESC')->Out()->sum('count');
        $mines = intval($stock_in-$stock_out);
        if($mines > 0 ){
            return $mines;

        }else{
            return 0;

        }
    }



    public function getPriceSecondAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }
        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();


        if(@$prcies_specification->price == 0){
            return ['old'=>$this->attributes['old_price'] ,'price'=>$this->attributes['price'] ];
        }elseif($prcies_specification){
            return ['old'=>$prcies_specification->old_price ,'price'=>$prcies_specification->price];
        }else{
            return ['old'=>0,'price'=>0];
        }


    }


    public function getPriceAdminAttribute(){
        $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();
        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();

        if($prices){
            return ['old'=>$this->attributes['old_price'] ,'price'=>$this->attributes['price'] ];
        }elseif($prcies_specification){
            return ['old'=>$prcies_specification->old_price ,'price'=>$prcies_specification->price];

        }else{
            return ['old'=>0,'price'=>0];
        }
    }
    public function getCalcuteListAttribute(){
        if($this->attributes['old_price'] == 0){
            $off = 0;
        }else{
            $off = (intval($this->attributes['old_price']) - intval($this->attributes['price']))*100/intval($this->attributes['old_price']);
        }
        return round($off);
    }

    public function getCalcuteAttribute(){
        $set = Setting::first();
        if ($set->black_friday == 1){
            $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->whereNotNull('old_price')->whereNotNull('price')->first();
            if (!$prices){
                $prices = Price::where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

            }
        }
        else{
            $prices = Price::where('black_friday',0)->where('priceable_id',$this->attributes['id'])->orderBy('id','DESC')->where('priceable_type','App\Models\Product')->first();

        }
        $prcies_specification = ProductSpecification::whereHas('prices')->orderBy('id','DESC')->where('product_id',$this->attributes['id'])->first();
        if(@$prcies_specification->price == 0){
            if($this->attributes['old_price'] == 0){
                $off = 0;
            }else{
                $off = (intval($this->attributes['old_price']) - intval($this->attributes['price']))*100/intval($this->attributes['old_price']);
            }
            return round($off);
        }elseif($prcies_specification) {
            if($prcies_specification->old_price == 0){
                $off = 0;

            }else{
                $off = (intval($prcies_specification->old_price) - intval($prcies_specification->price)) * 100/intval($prcies_specification->old_price);

            }
            return round($off);
        }
    }

    public function getProImageAttribute(){
        $thumbnail = Image::where('product_id',$this->attributes['id'])->show()->whereNotNull('file')->first();
        $product_image = Image::where('product_id',$this->attributes['id'])->whereNotNull('file')->first();


        if($thumbnail){
            return file_exists('assets/uploads/content/pro/medium/'.@$thumbnail->file) ? asset('assets/uploads/content/pro/medium/'.@$thumbnail->file) :asset('assets/site/images/notfound.png');
        }elseif($product_image){
            return file_exists('assets/uploads/content/pro/medium/'.@$product_image->file) ? asset('assets/uploads/content/pro/medium/'.@$product_image->file) :asset('assets/site/images/notfound.png');
        }else{
            return asset('assets/site/images/notfound.png');
        }
    }


    public function scopeSpecial($query)
    {
        $records = $query->whereSpecial('1');
        return $records;
    }

    public function scopeactive($query)
    {
        $records = $query->whereStatus('1');
        return $records;
    }


    public function brands()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }


    public function sp()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC')->with('prices');
    }
    public function pro_sp()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC');
    }
    public function sprcificationstock()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC')->whereHas('prices');
    }
    public function sprcificationstocks()
    {
        return $this->hasMany('App\Models\ProductSpecification', 'product_id')->orderBy('sort','ASC')->where('price','<>','0');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_category');
    }
    public function cats()
    {
        return $this->belongsToMany('App\Models\Category','product_category')->orderBy('id','desc');
    }
    public function category()
    {
        return $this->belongsToMany('App\Models\Category','product_category')->whereDoesntHave('childs')->orderBy('id','desc');
    }

    public function assignCategory($role)
    {
        return $this->categories()->attach($role);
    }

    public function deleteCategory($role)
    {
        return $this->categories()->detach($role);
    }


    public function specifications()
    {
        return $this->belongsToMany('App\Models\ProductSpecificationType',
            'product_specifications', 'product_id', 'product_specification_value_id')
            ->withPivot('product_specification_type_id', 'description', 'price', 'id')->whereNull('product_specifications.deleted_at')->withTimestamps();
    }


//    public function color()
//    {
//        return $this->belongsToMany('App\Models\ProductSpecificationType',
//            'product_specifications', 'product_id', 'product_specification_value_id')
//            ->withPivot('product_specification_type_id', 'description', 'price', 'id','color')->whereNull('product_specifications.deleted_at')->withTimestamps();
//    }


    public function colorss()
    {
        return $this->hasMany('App\Models\ProductSpecification','product_id', 'id')
            ->whereHas('pricesAdmin')->orderBy('sort','ASC');
    }
    public function colors()
    {
        return $this->hasMany('App\Models\ProductSpecification','product_id', 'id')
            ->whereType('1')->orderBy('sort','ASC');
    }
    public function img()
    {
        return $this->belongsToMany('App\Models\ProductSpecificationType',
            'product_specifications', 'product_id', 'product_specification_value_id')
            ->withPivot('product_specification_type_id', 'description', 'price', 'id','color','image')->whereNull('product_specifications.deleted_at')->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'Commentable')->whereNull('parent_id');
    }

    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
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
    public function images()
    {
        return $this->hasMany('App\Models\Image', 'product_id')->whereNull('product_specification_id')->orderBy('sort','ASC');
    }
    public function image()
    {
        return $this->hasMany('App\Models\Image', 'product_id')->Show()->take(1)->orderby('id','DESC');
    }
    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'Likeable')->orderBy('id','DESC');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem', 'product_id','id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\OrderItem', 'product_id')->where('order_item_status_id',5);
    }
    public function dot()
    {
        return $this->hasMany('App\Models\ProductSpecification','product_id', 'id')
            ->whereHas('pricesAdmin')->orderBy('sort','ASC')->select('color')->take(5);
    }
    public function sloagens()
    {
        return $this->belongsToMany('App\Models\Sloagen','product_sloagen');
    }
    public function assignSloagen($role)
    {
        return $this->sloagens()->attach($role);
    }

    public function deleteSloagen($role)
    {
        return $this->sloagens()->detach($role);
    }

    public function complements()
    {
        return $this->belongsToMany('App\Models\Category','product_complement')->whereType('1');
    }
    public function assignComp($role)
    {
        return $this->complements()->attach($role, ['type' => 1]);
    }

    public function deleteComp($role)
    {
        return $this->complements()->detach($role);
    }
    public function relates()
    {
        return $this->belongsToMany('App\Models\Category','product_complement')->whereType('2');
    }
    public function assignRel($role)
    {
        return $this->relates()->attach($role, ['type' => 2]);
    }

    public function deleteRel($role)
    {
        return $this->relates()->detach($role);
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
