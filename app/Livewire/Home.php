<?php

namespace App\Livewire;

use App\Livewire\Traits\Sortable;
use App\Models\Episode;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Home extends Component
{
    use Sortable;

    public $season;

    public function mount()
    {   
        if (request()->season == null || !in_array(request()->season, [1,2,3,4])) {
            $this->redirect(route('home') . '?season=4');
        }

        $this->season = request()->season;
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
