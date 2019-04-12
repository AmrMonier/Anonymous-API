<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = ['content','question_id'];

    public function question(){
        return $this->belongsTo('App\Question','question_id','id');
    }
}
