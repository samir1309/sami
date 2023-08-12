<?php namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class QuizAnswer extends Model
{
    protected $table = 'quiz_answers';
    use SoftDeletes;

    protected $fillable = [
        'content',
        'question_id',
        'icon',
        'sort'

    ];

    public function getAnswerCoverAttribute()
    {
        if (file_exists('assets/uploads/content/answer/' . $this->attributes['icon']) && $this->attributes['icon'] != null) {
            return asset('assets/uploads/content/answer/' . $this->attributes['icon']);
        } else {
            return asset('assets/site/images/quiz/make-up.png');
        }
    }

}
