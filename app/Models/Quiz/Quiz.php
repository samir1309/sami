<?php namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Quiz extends Model
{
    protected $table = 'quizes';
    use SoftDeletes;
    protected $fillable = [
        'title',
        'image',
        'image2',
        'description',
        'lead',
        'title_seo',
        'description_seo',
        'url',
        'h1',
        'alt_image'

    ];
    public  function questions(){
        return $this->hasMany('App\Models\Quiz\QuizQuestion','quiz_id');
    }
    public function getQuizCoverAttribute()
    {
        if(file_exists('assets/uploads/content/quiz/big/'.$this->attributes['image']) && $this->attributes['image'] != null){
            return asset('assets/uploads/content/quiz/big/'.$this->attributes['image']);
        }else{
            return asset('assets/site/images/notfound.png');
        }
    }
    public function getQuizHeaderAttribute()
    {
        if(file_exists('assets/uploads/content/quiz/big/'.$this->attributes['image2']) && $this->attributes['image2'] != null){
            return asset('assets/uploads/content/quiz/big/'.$this->attributes['image2']);
        }else{
            return asset('assets/site/images/wiz.jpg');
        }
    }

}
