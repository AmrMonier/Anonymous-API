<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
//use Illuminate\Contracts\Validation\Validator;
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
//        return $slug;

        $user = User::where('slug',$slug)->first();

        if($user){
            return new UserResource($user);
        }
        else{
            throw new ModelNotFoundException;
        }
    }

}
