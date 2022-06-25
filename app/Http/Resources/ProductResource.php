<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable as ArrayableAlias;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|ArrayableAlias|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|ArrayableAlias
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "name_en" => $this->name_en,
            "name_ko" => $this->name_ko,
            "slug" => $this->slug,
            "is_delete" => $this->is_delete,
            "star" => $this->star,
            "thumbnail" => $this->thumbnail,
            "sort" => $this->sort,
            "status" => $this->status,
            "options" => OptionsResource::collection($this->options),
        ];
    }
}
