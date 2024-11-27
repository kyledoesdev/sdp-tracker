<?php

namespace App\Livewire;

use App\Livewire\Forms\EpisodeForm;
use App\Livewire\Traits\Sortable;
use App\Models\Episode;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Episodes extends Component
{
    use WithPagination;
    use Sortable;

    public EpisodeForm $createForm;
    public EpisodeForm $editForm;
    public int $debate = Episode::DEBATE;
    public int $discussion = Episode::DISCUSSION;

    public ?Episode $selectedEpisode = null;

    public function render()
    {
        return view('livewire.pages.episodes.index');
    }

    #[Computed]
    public function episodes()
    {
        return Episode::query()
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->with('season')
            ->paginate(10);
    }

    public function edit(int $episodeId) {
        $this->editForm->reset();
        $this->editForm->edit($episodeId);
    }

    public function store() {
        $this->createForm->store();
    }

    public function update() {
        $this->editForm->update();
    }

    public function confirm(int $episodeId) {
        $this->selectedEpisode = Episode::findOrFail($episodeId);

        Flux::modal('destroy-episode')->show();
    }

    public function destroy() {
        $this->selectedEpisode->delete();

        Flux::modal('destroy-episode')->close();
        Flux::toast(variant: 'success', text: 'Episode Deleted!', duration: 3000);
    }
}
