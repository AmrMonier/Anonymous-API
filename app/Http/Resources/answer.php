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
            'no' => $this->id,
            'answer' => $this->answer,
            'created_at' => $this->created_at
        ];
    }
}
