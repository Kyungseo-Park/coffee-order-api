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
    /**
     * @param Office $office
     * @return EloquentCollection
     */
    public function getCategoryList(Office $office): EloquentCollection
    {
        return Category::whereOfficeId($office->id)->get();
    }

    /**
     * @param Model|EloquentCollection|Office|array|null $office
     * @return array
     */
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

    /**
     * @param $id
     * @return \Illuminate\Support\HigherOrderCollectionProxy|mixed
     */
    public function getCoffeeListByCategory($id)
    {
        return Category::find($id)->products;
    }

    /**
     * @param \App\Http\Requests\CoffeeRequest $request
     * @return Model|Product
     * @throws \Exception
     */
    public function create(\App\Http\Requests\CoffeeRequest $request): Model|Product
    {
        $data = $request->all();
        // 바리스타는 자신의 오피스에서만 생성 가능
        if (auth()->user()->auth == 'barista') {
            if (auth()->user()->office_id != $data['office_id']) {
                throw new \Exception('바리스타는 자신의 오피스에서만 생성 가능합니다.');
            }
        } else if (auth()->user()->auth == 'employee') {
            throw new \Exception('사원은 생성 불가능합니다.');
        }
        return Product::create($data);
    }

    /**
     * @param \App\Http\Requests\CoffeeRequest $request
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function update(\App\Http\Requests\CoffeeRequest $request, $id): bool
    {
        $data = $request->all();
        // 바리스타는 자신의 오피스에서만 생성 가능
        if (auth()->user()->auth == 'barista') {
            if (auth()->user()->office_id != $data['office_id']) {
                throw new \Exception('바리스타는 자신의 오피스에서만 수정 가능합니다.');
            }
        } else if (auth()->user()->auth == 'employee') {
            throw new \Exception('사원은 수정 불가능합니다.');
        }
        return Product::find($id)->update($data);
    }

    /**
     * @param $id
     * @return Model|EloquentCollection|Product|array|null
     */
    public function getCoffee($id): Model|EloquentCollection|Product|array|null
    {
        return Product::find($id);
    }
}
