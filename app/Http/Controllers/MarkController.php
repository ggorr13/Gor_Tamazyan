<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMarkRequest;
use App\Http\Requests\UpdateMarkRequest;
use App\Services\MarkService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MarkController extends Controller
{
    public function __construct(private readonly MarkService $markService)
    {
    }

    public function index(): View
    {
        $marks = $this->markService->paginate();

        return view('mark.index', compact('marks'));
    }

    public function create(): View
    {
        return view('mark.create');
    }

    public function store(StoreMarkRequest $request): RedirectResponse
    {
        $this->markService->store($request->validated());

        return redirect()->route('mark.index');
    }

    public function edit(int $id): View
    {
        $mark = $this->markService->show($id);

        return view('mark.edit', compact('mark'));
    }

    public function update(UpdateMarkRequest $request, int $id): RedirectResponse
    {
        $this->markService->update($id, $request->validated());

        return redirect()->route('mark.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->markService->destroy($id);

        return redirect()->route('mark.index');
    }
}
