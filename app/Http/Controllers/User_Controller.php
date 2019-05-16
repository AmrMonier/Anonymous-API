<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Resources\MessageCollection as Messages;
use App\Http\Resources\questionsCollection as Questions;
use App\Http\Resources\question as QuestionJSON;
use App\Http\Resources\User as UserResource;
use App\User;
use App\Message;
use App\Question;


class User_Controller extends Controller
{
    public function getUser(){
        return new UserResource(Auth::user());
    }
    public function getMessages(){
       return new Messages(Auth::user()->messages);
    }
    public function getQuestions(){
        return new Questions(Auth::user()->questions);
    }
    public function deleteMessage($number){
        Message::destroy($number);
        return response()->json(['msg' => 'Message Deleted Successfully','code' => 202],202);
    }
    public function storeQuestion(Request $request){
            $q = new Question();
            $q->content = $request->content;
            $q->user_id = Auth::user()->id;
            $q->slug = 'question-';
            $q->save(['slug' => 'question-id']);
            $q->slug = 'question-'.$q->id;
            $q->save();
            //        Question::create($request->all());
            return response()->json([
                    'msg' => 'Question Created Successfully',
                    'question' => new QuestionJSON($q),
                    'code' => 202]
                , 202);
        }
    public function getQuestion($number){
        return new QuestionJSON(Question::find($number));
    }
    public function deleteQuestion($number){
        $q = Question::find($number);
        Answers::destroy($q->answers->pluck('id'));
        Question::destroy($number);
        return response()->json(['msg' => 'Question Deleted Successfully','code' => 202],202);
    }

    public function deleteAnswer($number){
        Answers::destroy($number);
        return response()->json(['msg' => 'Answer Deleted Successfully','code' => 202],202);
    }
}
