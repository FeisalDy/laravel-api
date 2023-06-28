<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NovelResource extends JsonResource
{
    public static $wrap = 'novel';
    /**
     * __construct
     *
     * @param  mixed $status
     * @param  mixed $message
     * @param  mixed $resource
     * @return void
     */

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'type' => 'novels',
            'id' => $this->id(),
            'attributes' => [
                'title' => $this->title(),
                'description' => $this->description(),
                'author' => $this->author(),
                'genre' => $this->genre(),
                'image' => $this->image(),
                'created_at' => $this->created_at,
            ],
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
    }
}
