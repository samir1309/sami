<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizTag extends Model
{
    protected $table = 'quiz_tags';
    use SoftDeletes;
    protected $fillable = ['title'];



    public function products()
    {
        return $this->morphedByMany('App\Models\Product', 'taggable');
    }
    public function quizes()
    {
        return $this->morphedByMany('App\Models\Quiz\Quiz', 'taggable');
    }


}
