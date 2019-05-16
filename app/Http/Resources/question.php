<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\answer as AnswerResource;

class question extends JsonResource
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
            'id' => $this->id,
            'content' => $this->content,
            'slug' => $this->slug,
            'answers' => AnswerResource::collection($this->answers),
            'created_at' =>  date('M d,Y h:i',strtotime($this->created_at))
        ];
    }
}
