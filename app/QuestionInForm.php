<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionInForm extends Model
{
    protected $fillable = [
        'form_id', 'ques_id'
    ];
}
