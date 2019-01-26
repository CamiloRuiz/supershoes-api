<?php

namespace App\Http\Resources;

use App\Http\Resources\Store as StoreResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Stores extends ResourceCollection
{
    public static $wrap = 'stores';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ResourceCollection
     */
    public function toArray($request)
    {
        return StoreResource::collection($this->collection);
    }

    public function with($request)
    {
        return [
            'success' => true,
            'total_elements' => count($this->collection),
        ];
    }
}
