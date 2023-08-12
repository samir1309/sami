<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    protected $table = 'brands';
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'image',
         'description_seo','persian_title',
        'url', 'title_seo', 'keyword','status','footer','fix_pic','webp','image_new','error','converted'
    ];
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public function getBrandImageAttribute(){


            return file_exists('assets/uploads/content/brand/medium/'.@$this->attributes['image']) ? asset('assets/uploads/content/brand/medium/'.@$this->attributes['image']) :asset('assets/site/images/notfound.png');

        }


}
