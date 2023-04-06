<?php

namespace App\Services;

use App\Repositories\CarRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class CarService
{
    public const STORAGE = "images/cars";

    public function __construct(private readonly CarRepositoryInterface $carRepository)
    {
    }

    public function paginate()
    {
        return $this->carRepository->paginate();
    }

    public function all()
    {
        return $this->carRepository->all();
    }

    public function store(array $payload)
    {
        $payload["image"] = 'storage/'. $payload["image"]->store(static::STORAGE, "public");
        $payload['published'] =  $payload['published'] === 'on';

        return $this->carRepository->create($payload);
    }

    public function show(int $id)
    {
        return $this->carRepository->find($id);
    }

    public function update(int $id, array $payload)
    {

        if (array_key_exists('image',$payload)) {
            $car = $this->carRepository->find($id);
            $img = $car->image;
            Storage::delete("public/$img");
            $payload["image"] = 'storage/'. $payload["image"]->store(static::STORAGE, "public");
        }

        $payload['published']  = array_key_exists('published', $payload) && $payload['published'] === 'on';

        return $this->carRepository->update($id, $payload);
    }

    public function destroy(int $id)
    {
        return $this->carRepository->delete($id);
    }

    public function filterPublishedCars(?int $mark, ?int $type)
    {
        return $this->carRepository->filterPublishedCars($mark,$type);
    }
}
