<?php

namespace App\Http\Resources;

use App\Http\Resources\Article as ArticleResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Articles extends ResourceCollection
{
    public static $wrap = 'articles';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ResourceCollection
     */
    public function toArray($request)
    {
        return ArticleResource::collection($this->collection);
    }

    public function with($request)
    {
        return [
            'success' => true,
            'total_elements' => count($this->collection),
        ];
    }
}
