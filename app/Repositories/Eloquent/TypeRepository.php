<?php

namespace App\Repositories\Eloquent;

use App\Models\Type;
use App\Repositories\TypeRepositoryInterface;

class TypeRepository implements TypeRepositoryInterface
{

    public function all()
    {
        return Type::query()->orderByDesc('id')->get();
    }

    public function paginate()
    {
        return Type::query()->orderByDesc('id')->paginate(5);
    }

    public function create(array $payload)
    {
        return Type::query()->create($payload);
    }

    public function find(int $id)
    {
        return Type::query()->find($id);
    }

    public function update(int $id, array $payload)
    {
        return Type::query()->where('id', $id)->update($payload);
    }

    public function delete(int $id)
    {
        return Type::query()->where('id', $id)->delete();
    }
}
