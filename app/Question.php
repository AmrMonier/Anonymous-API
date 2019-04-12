<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

class Question extends Model
{
    protected $fillable = ['content','user_id'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function  answers(){
        return $this->hasMany('App\Answers','question_id','id');
    }
}
