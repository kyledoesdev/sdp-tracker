<flux:container class="space-y-6 md:w-1/2 mt-6">
    <div class="flex justify-between items-center">
        <div class="w-2/3">
            <flux:heading>
                Season 3 Call-In Segments
            </flux:heading>
        </div>
    </div>

    @forelse ($this->episodes as $episode)
        <flux:card class="my-0">
            <div class="flex justify-between my-2">
                <div>
                    <h5>
                        Episode {{ $episode->episode_number }}
                    </h5>
                </div>
                <div>
                    <flux:badge color="{{ $episode->isDebate() ? 'sky' : 'lime' }}">
                        {{ $episode->type }}
                    </flux:badge>
                </div>
            </div>

            <flux:separator class="my-4 "/>

            <div class="flex justify-between">
                <div class="flex flex-col pb-2">
                    <div class="py-1">
                        <flux:badge icon="pencil">{{ $episode->topic }}</flux:badge>
                    </div>
                    <div class="py-1">
                        <flux:badge icon="user">
                            @if ($episode->has_guest)
                                Guest: {{ $episode->guest_name }}
                            @else
                                Guest: N/A
                            @endif
                        </flux:badge>
                    </div>
                    <div class="py-1">
                        <flux:badge icon="clock">Uploaded At: {{ $episode->episode_upload_date->format('M d Y') }}</flux:badge>
                    </div>
                </div>
                @if ($episode->isDebate())
                    <div>
                        <flux:accordion heading="Winners" transition>
                            <flux:accordion.item>
                                <flux:accordion.heading>Winners</flux:accordion.heading>

                                @foreach (['apandah', 'astrid', 'jschlatt', 'mikasacus'] as $member)
                                    <flux:accordion.content>
                                        <div class="flex flex-col">
                                            <flux:badge icon="{{ $episode->{$member.'_result'} ? 'check' : 'x-mark'}}" color="{{ $episode->{$member.'_result'} ? 'green' : 'red' }}">
                                                {{ Str::ucfirst($member) }}
                                            </flux:badge>
                                        </div>
                                    </flux:accordion.content>
                                @endforeach

                                @if ($episode->has_guest)
                                    <flux:accordion.content>
                                        <div class="flex flex-col">
                                            <flux:badge icon="{{ $episode->guest_result ? 'check' : 'x-mark'}}" color="{{ $episode->guest_result ? 'green' : 'red' }}">
                                                {{ $episode->guest_name }} (Guest)
                                            </flux:badge>
                                        </div>
                                    </flux:accordion.content>
                                @endif
                            </flux:accordion.item>
                        </flux:accordion>
                    </div>
                @endif
            </div>
        </flux:card>
    @empty
        
    @endforelse
</flux:container>