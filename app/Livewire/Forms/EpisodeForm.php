<?php

namespace App\Livewire\Forms;

use App\Models\Episode;
use Carbon\Carbon;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EpisodeForm extends Form
{
    #[Validate('required|integer')]
    public $season_id;

    #[Validate('required|string|max:255')]
    public $topic;

    #[Validate('required|integer')]
    public $episode_type = null;

    #[Validate('required')]
    public $has_guest = null;

    #[Validate('required|date')]
    public $episode_upload_date;

    public $episode_number;
    public array $winners = [];
    public $episode_url = null;
    public $guest_result = null;
    public $guest_name = null;

    public ?int $episodeId = null;

    public function store() {
        $this->validate();

        $winners = collect($this->winners);

        Episode::create([
            'season_id' => $this->season_id,
            'episode_number' => $this->episode_number,
            'episode_type' => $this->episode_type,
            'topic' => $this->topic,
            'apandah_result' => $winners->contains('apandah_result'),
            'astrid_result' => $winners->contains('astrid_result'),
            'jschlatt_result' => $winners->contains('jschlatt_result'),
            'mikasacus_result' => $winners->contains('mikasacus_result'),
            'has_guest' => boolval($this->has_guest),
            'guest_result' => boolval($this->guest_result),
            'guest_name' => $this->guest_name,
            'episode_url' => $this->episode_url,
            'episode_upload_date' => $this->episode_upload_date,
        ]);

        $this->reset();

        Flux::modal('create-episode')->close();

        Flux::toast(variant: 'success', text: 'Episode Created!', duration: 3000);
    }

    public function edit(int $episodeId) {
        $episode = Episode::findOrFail($episodeId);

        $this->winners = [];
        $this->episodeId = $episodeId;

        $this->season_id = $episode->season_id;
        $this->episode_number = $episode->episode_number;
        $this->episode_type = $episode->episode_type;
        $this->topic = $episode->topic;
        $this->winners[] = $episode->apandah_result ? 'apandah_result' : '';
        $this->winners[] = $episode->astrid_result ? 'astrid_result' : '';
        $this->winners[] = $episode->jschlatt_result ? 'jschlatt_result' : '';
        $this->winners[] = $episode->mikasacus_result ? 'mikasacus_result' : '';
        $this->has_guest = $episode->has_guest == true ? 1 : 0;
        $this->guest_result = $episode->guest_result == true ? 1 : 0;
        $this->guest_name = $episode->guest_name;
        $this->episode_url = $episode->episode_url;
        $this->episode_upload_date = Carbon::parse($episode->episode_upload_date)->format('Y-m-d');

        Flux::modal('edit-episode')->show();
    }

    public function update() {
        $this->validate();

        $winners = collect($this->winners);

        Episode::findOrFail($this->episodeId)->update($this->validate() + [
            'has_guest' => boolval($this->has_guest),
            'guest_result' => boolval($this->guest_result),
            'guest_name' => $this->guest_name,
            'apandah_result' => $winners->contains('apandah_result'),
            'astrid_result' => $winners->contains('astrid_result'),
            'jschlatt_result' => $winners->contains('jschlatt_result'),
            'mikasacus_result' => $winners->contains('mikasacus_result'),
        ]);

        $this->reset();

        Flux::modal('edit-episode')->close();
        Flux::toast(variant: 'success', text: 'Episode Updated!', duration: 3000);
    }

    public function rules(): array {
        return [
            'episode_number' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('episodes')->ignore($this->episodeId)
            ]
        ];
    }
}
