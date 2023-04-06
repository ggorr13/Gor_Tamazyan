<?php

namespace App\Services;

use App\Repositories\MarkRepositoryInterface;

class MarkService
{
    public function __construct(private readonly MarkRepositoryInterface $markRepository)
    {
    }

    public function paginate()
    {
        return $this->markRepository->paginate();
    }

    public function all()
    {
        return $this->markRepository->all();
    }

    public function store(array $payload)
    {
        return $this->markRepository->create($payload);
    }

    public function show(int $id)
    {
        return $this->markRepository->find($id);
    }

    public function update(int $id, array $payload)
    {
        return $this->markRepository->update($id, $payload);
    }

    public function destroy(int $id)
    {
        return $this->markRepository->delete($id);
    }

    public function getTypes(int $id)
    {
        return $this->markRepository->getTypes($id);
    }
}
