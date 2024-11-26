<div>
    {{-- Header & Create Model --}}
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-50 dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between">
                        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-2">
                            <h5>Episodes</h5>
                        </div>
                        <div>
                            <flux:modal.trigger name="create-episode">
                                <flux:button>Create</flux:button>
                            </flux:modal.trigger>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>

    {{-- Table of Episodes --}}
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-zinc-50 dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <flux:table :paginate="$this->episodes">
                    <flux:columns>
                        <flux:column sortable :sorted="$sortBy === 'season_id'" :direction="$sortDirection" wire:click="sort('season_id')">Season</flux:column>
                        <flux:column sortable :sorted="$sortBy === 'episode_number'" :direction="$sortDirection" wire:click="sort('episode_number')">Episode</flux:column>
                        <flux:column sortable :sorted="$sortBy === 'episode_type'" :direction="$sortDirection" wire:click="sort('episode_type')">Type</flux:column>
                        <flux:column sortable :sorted="$sortBy === 'topic'" :direction="$sortDirection" wire:click="sort('topic')">Topic</flux:column>
                        <flux:column sortable :sorted="$sortBy === 'episode_upload_date'" :direction="$sortDirection" wire:click="sort('episode_upload_date')">Upload Date</flux:column>
                        <flux:column>Actions</flux:column>
                    </flux:columns>

                    <flux:rows>
                        @foreach ($this->episodes as $episode)
                            <flux:row :key="$episode->getKey()">
                                <flux:cell class="whitespace-nowrap">{{ $episode->season->name }}</flux:cell>

                                <flux:cell>
                                    <flux:badge size="sm" :color="$episode->status_color" inset="top bottom">{{ $episode->episode_number }}</flux:badge>
                                </flux:cell>

                                <flux:cell variant="strong">{{ $episode->episode_type == 1  ? 'Debate' : 'Discussion' }}</flux:cell>
                                <flux:cell variant="strong">{{ $episode->topic }}</flux:cell>
                                <flux:cell variant="strong">{{ $episode->episode_upload_date->format('M d, Y') }}</flux:cell>

                                <flux:cell>
                                    <flux:dropdown>
                                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal" inset="top bottom"></flux:button>

                                        <flux:menu>
                                            <flux:menu.item icon="pencil" wire:click="edit('{{ $episode->getKey() }}')">Edit</flux:menu.item>
                                            <flux:menu.item icon="trash" wire:click="confirm('{{ $episode->getKey() }}')">Delete</flux:menu.item>
                                        </flux:menu>
                                    </flux:dropdown>
                                </flux:cell>
                            </flux:row>
                        @endforeach
                    </flux:rows>
                </flux:table>
            </div>
        </div>
    </div>

    {{-- Create Modal --}}
    <flux:modal name="create-episode" variant="flyout" class="space-y-6">
        <div>
            <flux:heading size="lg">Create a new Episode.</flux:heading>
        </div>

        <form wire:submit="store">
            <div class="py-2">
                <flux:select variant="listbox" class="mb-3" wire:model.self="createForm.season_id" label="Which Season?" required>
                    <flux:option value="3">Season 3</flux:option>
                    <flux:option value="2">Season 2</flux:option>
                    <flux:option value="1">Season 1</flux:option>
                </flux:select>

                <flux:input class="mb-3" wire:model="createForm.episode_number" label="Episode Number" type="number" min="1" required />
                <flux:input class="mb-3" wire:model="createForm.topic" label="Episode Topic" required />

                <flux:radio.group class="mb-3" wire:model.live="createForm.episode_type" label="Episode Type" required>
                    <flux:radio value="{{ $debate }}" label="Debate" />
                    <flux:radio value="{{ $discussion }}" label="Discussion" />
                </flux:radio.group>

                @if ($createForm->episode_type == $debate)
                    <flux:checkbox.group class="mb-3" wire:model.live="createForm.winners" label="Who were the Winners?">
                        <flux:checkbox label="apandah" value="apandah_result" />
                        <flux:checkbox label="astrid" value="astrid_result" />
                        <flux:checkbox label="jschaltt" value="jschlatt_result" />
                        <flux:checkbox label="mikasacus" value="mikasacus_result" />
                    </flux:checkbox.group>
                @endif

                <flux:radio.group class="mb-3" wire:model.live="createForm.has_guest" label="Was there a guest?" required>
                    <flux:radio value="1" label="Yes" />
                    <flux:radio value="0" label="No" />
                </flux:radio.group>

                @if ($createForm->has_guest == true)
                    @if ($createForm->episode_type == $debate)
                        <flux:radio.group class="mb-3" wire:model="createForm.guest_result" label="Did the guest win?">
                            <flux:radio value="1" label="Yes" />
                            <flux:radio value="0" label="No" />
                        </flux:radio.group>
                    @endif
        
                    <flux:input class="mb-3" wire:model="createForm.guest_name" label="Guest Name" />
                @endif

                <flux:input class="mb-3" wire:model="createForm.episode_url" label="Episode Link" />
                <flux:input class="mb-3" type="date" wire:model="createForm.episode_upload_date" label="Episode Upload Date" required />
            </div>
                    
            <div class="flex my-2">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Create</flux:button>
            </div>
        </form>
    </flux:modal>

    {{-- Edit Modal --}}
    <flux:modal name="edit-episode" variant="flyout" class="space-y-6" @close="$this->editForm->reset()">
        <div>
            <flux:heading size="lg">Edit Episode: {{ $this->editForm->episode_number }}</flux:heading>
        </div>

        <form wire:submit="update">
            <div class="py-2">
                <flux:select variant="listbox" class="mb-3" wire:model.self="editForm.season_id" label="Which Season?" required>
                    <flux:option value="3">Season 3</flux:option>
                    <flux:option value="2">Season 2</flux:option>
                    <flux:option value="1">Season 1</flux:option>
                </flux:select>

                <flux:input class="mb-3" wire:model="editForm.episode_number" label="Episode Number" type="number" min="1" required />
                <flux:input class="mb-3" wire:model="editForm.topic" label="Episode Topic" required />

                <flux:radio.group class="mb-3" wire:model.live="editForm.episode_type" label="Episode Type" required>
                    <flux:radio value="{{ $debate }}" label="Debate" />
                    <flux:radio value="{{ $discussion }}" label="Discussion" />
                </flux:radio.group>

                @if ($editForm->episode_type == $debate)
                    <flux:checkbox.group class="mb-3" wire:model.live="editForm.winners" label="Who were the Winners?">
                        <flux:checkbox label="apandah" value="apandah_result" />
                        <flux:checkbox label="astrid" value="astrid_result" />
                        <flux:checkbox label="jschaltt" value="jschlatt_result" />
                        <flux:checkbox label="mikasacus" value="mikasacus_result" />
                    </flux:checkbox.group>
                @endif

                <flux:radio.group class="mb-3" wire:model.live="editForm.has_guest" label="Was there a guest?" required>
                    <flux:radio value="1" label="Yes" />
                    <flux:radio value="0" label="No" />
                </flux:radio.group>

                @if ($editForm->has_guest == true)
                    @if ($editForm->episode_type == $debate)
                        <flux:radio.group class="mb-3" wire:model="editForm.guest_result" label="Did the guest win?">
                            <flux:radio value="{{1}}" label="Yes" />
                            <flux:radio value="{{0}}" label="No" />
                        </flux:radio.group>
                    @endif
        
                    <flux:input class="mb-3" wire:model="editForm.guest_name" label="Guest Name" />
                @endif

                <flux:input class="mb-3" wire:model="editForm.episode_url" label="Episode Link" />
                <flux:input class="mb-3" type="date" wire:model="editForm.episode_upload_date" label="Episode Upload Date" required />
            </div>
                    
            <div class="flex my-2">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Update</flux:button>
            </div>
        </form>
    </flux:modal>

    {{-- Destroy Confirm Modal --}}
    <flux:modal name="destroy-episode" class="md:w-96 space-y-6">
        <div>
            <flux:heading size="lg">Delete Episode {{ $selectedEpisode?->episode_number }}?</flux:heading>
            <flux:subheading>Are you sure you want to delete this episode?</flux:subheading>
        </div>

        <div class="flex">
            <flux:spacer />

            <form wire:submit="destroy">
                <flux:button type="submit" variant="danger" size="xs">Delete</flux:button>
            </form>
        </div>
    </flux:modal>
</div>