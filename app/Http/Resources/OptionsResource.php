<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

class OptionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    #[ArrayShape(["id" => "mixed", "name_en" => "mixed", "name_ko" => "mixed", "thumbnail" => "mixed", "sort" => "mixed"])]
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "name_en" => $this->name_en,
            "name_ko" => $this->name_ko,
            "thumbnail" => $this->thumbnail,
            "sort" => $this->sort,
        ];
    }
}
