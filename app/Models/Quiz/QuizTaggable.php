<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizTaggable extends Model
{
    protected $fillable = [
        'tag_id' , 'taggable_id' ,'taggable_type'
    ];

}
