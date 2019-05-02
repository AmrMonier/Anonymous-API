<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MessageCollection;
use App\Message;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Resources\MessageCollection as Messages;
use App\Http\Resources\User as UserResource;
use App\User;

class User_Controller extends Controller
{
    public function getUser(){

        return new UserResource(Auth::user());
    }

    public function deleteMessage($number){
        Message::destroy($number);
        return response()->json(['msg' => 'Message Deleted Successfully','code' => 202],202);
    }

    public function storeQuestion(StoreRequest $request){
        $request->validated();
        Question::create($request->all());
        return response()->json(['msg' => 'Question Created Successfully','code' => 202],202);

    }

    public function updateQuestion(StoreRequest $request, $number){
        $question = Question::findOrFail($number);
    //    $request->validated();
//        $question->content = $request->content;
//        $question->save();
        return response()->json(['msg' => 'Question Updated Successfully','code' => 202,'data'=>$request],202);
    }
    public function deleteQuestion($number){
        Question::destroy($number);
        return response()->json(['msg' => 'Question Deleted Successfully','code' => 202],202);

    }

    public function storeAnswer(){}
    public function deleteAnswer(){}
}
