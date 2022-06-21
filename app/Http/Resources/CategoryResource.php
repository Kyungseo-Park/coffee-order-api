<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            "id"=> $this->id,
            "slug"=> $this->slug,
            "name_ko"=> $this->name_ko,
            "name_en"=> $this->name_en,
            'parents' => $this->parents,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
            "products" => ProductResource::collection($this->products),
        ];
    }
}
