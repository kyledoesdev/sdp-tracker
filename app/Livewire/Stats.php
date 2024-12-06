<?php

namespace App\Livewire;

use App\Models\Episode;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Stats extends Component
{
    public string $winner;

    public function mount()
    {
        $this->winner = Episode::getChampion();
    }

    public function render()
    {
        return view('livewire.pages.stats');
    }

    #[Computed]
    public function episodes()
    {
        return Episode::all();
    }
}
