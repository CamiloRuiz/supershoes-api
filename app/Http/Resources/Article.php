<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    public static $wrap = null;
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
            'description' => $this->description,
            'name' => $this->name,
            'price' => $this->price,
            'total_in_shelf' => $this->total_in_shelf,
            'total_in_vault' => $this->total_in_vault,
            'store_name' => ($this->store->name) ?? ''
        ];
    }
}
