<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
//use Illuminate\Contracts\Validation\Validator;
use \Validator;
use App\Message;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;


class Public_Controller extends Controller
{
    public function store(StoreRequest $request){
        /*
         * i don't know whats is this $rules Var but i found this
         * as a solution for my err on Laracast and clearly it dose n't work for me
         * $validator = Validator::make($request->all(), $rules);
        */
//        $validator = Validator::make($request->all(), [
//            'content' => 'required|string|max:500',
//            'user_id' => 'required|numeric'
//        ]);
//        if ($validator->fails()) {
//
//            //pass validator errors as errors object for ajax response
//            return response()->json(['errors'=>$validator->errors()]);
//        }
//
//        else{
//            $message = Message::create($request->all());
//            return response()->json(['msg' => 'Message Created Successfully'],201);
//        }

            $message = Message::create($request->all());
            return response()->json(['msg' => 'Message Created Successfully'],201);
        // todo:: return the created response Code
    }
    public function getUser($name, $number){
        $user = User::findOrFail($number);
        if($user->name == $name){
            return new UserResource($user);
        }
        return redirect('/');
    }
}
