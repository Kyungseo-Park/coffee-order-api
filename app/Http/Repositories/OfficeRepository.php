<?php

namespace App\Http\Repositories;

use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class OfficeRepository
{
    /**
     * @return EloquentCollection
     */
    public function getAll(): EloquentCollection
    {
        return Office::get();
    }

    /**
     * @param User $user
     * @return EloquentCollection
     */
    public function getMe(User $user): EloquentCollection
    {
        return $user->office->get();
    }

    /**
     * @param $data
     * @return Model|Office
     */
    public function create($data): Model|Office
    {
        return Office::create($data);
    }

    /**
     * @param $data
     * @return bool
     */
    public function update($data): bool
    {
        return Office::update($data);
    }

    /**
     * @return bool
     */
    public function delete(): bool
    {
        return Office::delete();
    }

    /**
     * @param int $id
     * @return Model|EloquentCollection|Office|array|null
     */
    public function getOffice(int $id): Model|EloquentCollection|Office|array|null
    {
        return Office::find($id);
    }

    /**
     * @param $id
     * @return Model|EloquentCollection|Office|array|null
     */
    public function getById($id): Model|EloquentCollection|Office|array|null
    {
        return Office::find($id);
    }
}
