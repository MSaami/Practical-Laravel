<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ArticleResource::collection($this->collection),
            'meta' => [
                'count' => $this->total(),
                'total_page' => $this->lastPage(),
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage()
            ]

        ];
    }
}
