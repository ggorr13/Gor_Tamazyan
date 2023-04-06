<?php

namespace App\Repositories\Eloquent;

use App\Models\Mark;
use App\Repositories\MarkRepositoryInterface;

class MarkRepository implements MarkRepositoryInterface
{
    public function all()
    {
        return Mark::query()->orderByDesc('id')->get();
    }

    public function paginate()
    {
        return Mark::query()->orderByDesc('id')->paginate(5);
    }

    public function create(array $payload)
    {
        return Mark::query()->create($payload);
    }

    public function find(int $id)
    {
        return Mark::query()->find($id);
    }

    public function update(int $id, array $payload)
    {
        return Mark::query()->where('id', $id)->update($payload);
    }

    public function delete(int $id)
    {
        return Mark::query()->where('id', $id)->delete();
    }

    public function getTypes(int $id)
    {
        return Mark::query()->where('id',$id)->with('types')->first()->types;
    }
}
