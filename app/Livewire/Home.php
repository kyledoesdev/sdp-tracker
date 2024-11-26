<?php

namespace App\Livewire;

use App\Livewire\Traits\Sortable;
use App\Models\Episode;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Home extends Component
{
    use Sortable;

    #[Url]
    public int $season = 3;

    public function mount()
    {
        $this->season = request()->season ?? 3;
    }

    public function render()
    {
        return view('livewire.pages.home');
    }

    #[Computed]
    public function episodes()
    {
        return Episode::query()
            ->where('season_id', $this->season)
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->with('season')
            ->get();
    }
}
