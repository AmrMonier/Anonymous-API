<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Message as MessageResource;
use App\Http\Resources\question as QuestionResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'slug' => $this->slug,
//            'messages' => MessageResource::collection($this->messages),
//            'questions' => QuestionResource::collection($this->questions)
        ];
    }
}
