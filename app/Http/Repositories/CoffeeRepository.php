<?php

namespace App\Http\Repositories;

use App\Models\Category;
use App\Models\Office;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\ArrayShape;

class CoffeeRepository
{
    public function getCategoryList(Office $office): EloquentCollection
    {
        return Category::whereOfficeId($office->id)->get();
    }

    #[ArrayShape(["id" => "int", "slug" => "string", "name_ko" => "string", "name_en" => "string", "products" => "\App\Models\Product[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection"])]
    public function getStarList(Model|EloquentCollection|Office|array|null $office): array
    {
        return [
            "id" => 0,
            "slug" => "new-menu",
            "name_ko" => "새로운 메뉴",
            "name_en" => "New Menu",
            "products" => Product::whereStar(true)->get(),
        ];
    }
}
