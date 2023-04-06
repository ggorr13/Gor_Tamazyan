<?php

namespace App\Repositories;

interface TypeRepositoryInterface
{
    public function all();

    public function paginate();

    public function create(array $payload);

    public function find(int $id);

    public function update(int $id, array $payload);

    public function delete(int $id);
}
