<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Post extends Resource
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
            'user_id' => $this->user_id,
            'post_title' => $this->post_title,
            'post_slug' => $this->post_slug,
            'post_description' => $this->post_description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'commnents' => Comment::collection($this->comments)
        ];
    }
}
