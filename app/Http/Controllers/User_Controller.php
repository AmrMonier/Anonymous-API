<?php

namespace App\Http\Controllers;

use App\Http\Resources\MessageCollection;
use App\Message;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Resources\MessageCollection as Messages;
use App\User;

class User_Controller extends Controller
{
    /**
     * @return Messages
     */
    public function index (){
//        return new MessageCollection(Auth::user()->messages);
        return new MessageCollection(User::find(1)->messages);
    }

    public function deleteMessage($number){
        Message::destroy($number);
        return response(204);
        // todo:: return the response no. of deletion
    }

    public function storeQuestion(Request $request){
        $this->validate(
            $request,
            [
                'content' => 'required|string|max:500'
            ]
        );
        $question = Question::create($request->all);
        // todo:: return the created response number

    }
    public function updateQuestion(Request $request, $number){
        $question = Question::findOrFail($number);
        $this->validate(
            $request,
            [
                'content' => 'required|string|max:500'
            ]
        );
        $question->content = $request->get('content');
        $question->save();
        // todo:: return the updated response number and check for better method to update
    }
    public function deleteQuestion($number){
        Question::destroy($number);
        // todo:: return the delete response number
    }

    public function storeAnswer(){}
    public function deleteAnswer(){}
}
