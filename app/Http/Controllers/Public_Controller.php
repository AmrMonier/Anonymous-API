<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
//use Illuminate\Contracts\Validation\Validator;
use App\Http\Resources\PublicQuestion;
use App\Question;
use \Validator;
use App\Message;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Resources\publicUser as UserResource;


class Public_Controller extends Controller
{
    public function store(StoreRequest $request){
            $request->validated();
            $user = User::where('slug',$request->slug)->first();
            $msg = new Message();
            $msg->content = $request->input('content');
            $msg->user_id = $user->id;
            $msg->save();
            return response()->json(['msg' => 'Message Created Successfully','code' => 201],201);
    }

    /**
     * @param $slug
     * @return UserResource
     */
    public function getUser($slug){

        $user = User::where('slug',$slug)->first();

        if($user){
            return new UserResource($user);
        }
        else{
            throw new ModelNotFoundException;
        }
    }
    public function getQuestion($slug){
        $question = Question::where('slug', $slug)->first();
        if($question){
            return new PublicQuestion($question);
        }
        else{
            throw new ModelNotFoundException;
        }
    }

    public function storeAnswer(Request $request){
//        return response()->json(['msg' => 'Answer Created Successfully','code' => 201],201);
        $ans = new Answers();
//        return $ans;
            $ans->question_id = $request->q_id;
        $ans->answer = $request->ans_content;
        $ans->save();
        return response()->json(['msg' => 'Answer Created Successfully','code' => 201],201);

    }


}
