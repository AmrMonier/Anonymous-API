<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['content','user_id'];
    /*
     * the user who owns this Message
     */
    public function user()
    {
        return $this->belongsTo('users','user_id','id');
    }
}
