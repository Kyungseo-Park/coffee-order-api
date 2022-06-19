<?php

namespace App\Http\Repositories;

use App\Models\Office;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;

class OfficeRepository
{
    public function getAll(): EloquentCollection
    {
        return Office::get();
    }

    public function getMe(User $user): EloquentCollection
    {
        return $user->office->get();
    }

    public function create($data): Model|Office
    {
        return Office::create($data);
    }

    public function update($data): bool
    {
        return Office::update($data);
    }

    public function delete(): bool
    {
        return Office::delete();
    }
}
