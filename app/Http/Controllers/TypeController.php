<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Services\MarkService;
use App\Services\TypeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TypeController extends Controller
{
    public function __construct(
        private readonly TypeService $typeService,
        private readonly MarkService $markService
    ) {

    }

    public function index(): View
    {
        $types = $this->typeService->paginate();

        return view('type.index', compact('types'));
    }

    public function create(): View
    {
        $marks = $this->markService->all();

        return view('type.create', compact('marks'));
    }

    public function store(StoreTypeRequest $request): RedirectResponse
    {
        $this->typeService->store($request->validated());

        return redirect()->route('type.index');
    }

    public function edit(int $id): View
    {
        $type = $this->typeService->show($id);
        $marks = $this->markService->all();

        return view('type.edit', compact('type','marks'));
    }

    public function update(UpdateTypeRequest $request, int $id): RedirectResponse
    {
        $this->typeService->update($id, $request->validated());

        return redirect()->route('type.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->typeService->destroy($id);

        return redirect()->route('type.index');
    }
}
