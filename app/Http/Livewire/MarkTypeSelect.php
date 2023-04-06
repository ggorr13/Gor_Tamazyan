<?php

namespace App\Http\Livewire;

use App\Services\MarkService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class MarkTypeSelect extends Component
{
    private MarkService $markService;

    public Collection $markOptions;

    public int $typeId;

    public int $selectedMark = 0;

    public int $selectedType = 0;

    public string $class;

    public function boot(MarkService $markService)
    {
        $this->markService = $markService;
    }

    public function mount()
    {
        $this->markOptions = $this->markService->all();
    }

    public function getTypeOptionsProperty(): Collection
    {
        if (!$this->selectedMark) return collect();

        return $this->markService->getTypes($this->selectedMark);
    }

    public function render(): Application|View
    {
        return view('livewire.mark-type-select');
    }
}
