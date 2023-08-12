<?php namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class QuizQuestion extends Model
{
    protected $table = 'quiz_questions';
    use SoftDeletes;
    protected $fillable = [
        'content',
        'quiz_id',
        'sort'

    ];
    public  function answers(){
        return $this->hasMany('App\Models\Quiz\QuizAnswer' , 'question_id');
    }
    public  function quiz(){
        return $this->belongsTo('App\Models\Quiz\Quiz' , 'quiz_id');
    }

}
