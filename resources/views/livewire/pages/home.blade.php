<flux:container>
    <div class="flex justify-between items-center mt-4">
        <flux:heading class="text-xl md:text-3xl">
            SDP Call-In Segments
        </flux:heading>
    </div>

    <div class="mt-8 px-4 py-3 shadow-xl border rounded-lg flex items-center justify-center gap-2">
        <flux:icon name="information-circle" class="size-5 shrink-0" />
        <flux:text>
            As of January 01, 2025 the Sleep Deprived Podcast will be ending. This website will remain up. Check out the gang's new project
            <flux:link href="https://www.youtube.com/@daBananaChannel" target="_blank">here</flux:link>.
        </flux:text>
    </div>
    

    <div class="mt-8">
        @forelse ($this->episodes as $episode)
            <flux:card class="p-4 my-0 mb-4" style="overflow-x: auto;">
                <div class="flex justify-between my-2">
                    <div class="text-xl">
                        Episode {{ $episode->episode_number }}
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
                        <div class="py-1 mr-8">
                            <flux:badge icon="pencil">
                                {!! $episode->formatted_topic !!}
                            </flux:badge>
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
                        @if ($episode->episode_url)
                            <div class="py-1">
                                <flux:badge icon="link">
                                    <a href="{{ $episode->episode_url }}">Listen Here</a>
                                </flux:badge>
                            </div>
                        @endif
                    </div>
                    @if ($episode->isDebate())
                        <div class="mt-1">
                            <flux:accordion heading="Winners" transition>
                                <flux:accordion.item>
                                    <flux:accordion.heading>Winners</flux:accordion.heading>
                                    <flux:accordion.content>
                                        <span>{{ $episode->winner }}</span>
                                    </flux:accordion.content>

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
            <p>There's nothing here?</p>
        @endforelse
    </div>

</flux:container>