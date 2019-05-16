<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class answer extends JsonResource
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
            'number' => $this->id,
            'answer' => $this->answer,
            'created_at' =>  date('M d,Y h:i',strtotime($this->created_at))
        ];
    }
}
