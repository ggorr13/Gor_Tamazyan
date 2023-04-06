<?php

namespace App\Repositories\Eloquent;

use App\Models\Car;
use App\Repositories\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    public function all()
    {
        return Car::query()->orderByDesc('id')->get();
    }

    public function paginate()
    {
        return Car::query()->orderByDesc('id')->paginate(5);
    }

    public function create(array $payload)
    {
        return Car::query()->create($payload);
    }

    public function find(int $id)
    {
        return Car::query()->find($id);
    }

    public function update(int $id, array $payload)
    {
        return Car::query()->where('id', $id)->update($payload);
    }

    public function delete(int $id)
    {
        return Car::query()->where('id', $id)->delete();
    }

    public function filterPublishedCars(?int $mark, ?int $type)
    {
        $query = Car::published();

        if ($mark) $query->where('mark_id', $mark);

        if ($type) $query->where('type_id', $type);

        return $query->paginate();
    }
}
