<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Services\CarService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarController extends Controller
{
    public function __construct(private readonly CarService $carService)
    {
    }

    public function index(): Application|View
    {
        $cars = $this->carService->paginate();

        return view('car.index', compact('cars'));
    }

    public function create(): Application|View
    {
        return view('car.create');
    }

    public function store(StoreCarRequest $request): RedirectResponse
    {
        $this->carService->store($request->validated());

        return redirect()->route('car.index');
    }

    public function edit(int $id): Application|View
    {
        $car = $this->carService->show($id);

        return view('car.edit', compact('car'));
    }

    public function update(UpdateCarRequest $request, int $id): RedirectResponse
    {
        $this->carService->update($id, $request->validated());

        return redirect()->route('car.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->carService->destroy($id);

        return redirect()->route('car.index');
    }
}
