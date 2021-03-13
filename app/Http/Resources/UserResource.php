<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostResource;

class UserResource extends JsonResource
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
            'name' => $this->name, // explode(' ', trim($this->name))[0],
            'post' => [
                'count' => count(PostResource::collection($this->post)),
                'latest' => PostResource::collection($this->post)->last()
            ]
        ];
    }
}
