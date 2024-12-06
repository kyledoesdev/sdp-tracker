<flux:container class="space-y-6 md:w-1/2 mt-6">
    <div class="flex flex-col items-center">
        <flux:heading class="text-xl md:text-3xl">
            Debate Stats
        </flux:heading>
        <flux:subheading>Debates Won</flux:subheading>
    </div>

    <div class="mt-8">
        <flux:card class="flex flex-col space-y-2">
            <flux:accordion transition>
                <flux:accordion.item>
                    <flux:accordion.heading>
                        <flux:badge class="md:text-xl" color="pink" icon="{{ $winner == 'apandah' ? 'trophy' : '' }}">
                            <span>apandah: {{ $this->episodes->where('apandah_result', true)->count() }}</span>
                        </flux:badge>
                    </flux:accordion.heading>
                    <flux:accordion.content>
                        <flux:table>
                            <flux:columns>
                                <flux:column>Episode</flux:column>
                                <flux:column>Topic</flux:column>
                                <flux:column>Winner</flux:column>
                            </flux:columns>

                            <flux:rows>
                                @foreach ($this->episodes->where('apandah_result', true) as $episode)
                                    <flux:row>
                                        <flux:cell>{{ $episode->episode_number }}</flux:cell>
                                        <flux:cell>{{ $episode->topic }}</flux:cell>
                                        <flux:cell>{{ $episode->winner }}</flux:cell>
                                    </flux:row>
                                @endforeach
                            </flux:rows>
                        </flux:table>
                    </flux:accordion.content>
                </flux:accordion.item>
            </flux:accordion>
            
            <flux:accordion transition>
                <flux:accordion.item>
                    <flux:accordion.heading>
                        <flux:badge class="md:text-xl" color="violet" icon="{{ $winner == 'astrid' ? 'trophy' : '' }}">
                            <span>astrid: {{ $this->episodes->where('astrid_result', true)->count() }}</span>
                        </flux:badge>
                    </flux:accordion.heading>
                    <flux:accordion.content>
                        <flux:table>
                            <flux:columns>
                                <flux:column>Episode</flux:column>
                                <flux:column>Topic</flux:column>
                                <flux:column>Winner</flux:column>
                            </flux:columns>

                            <flux:rows>
                                @foreach ($this->episodes->where('astrid_result', true) as $episode)
                                    <flux:row>
                                        <flux:cell>{{ $episode->episode_number }}</flux:cell>
                                        <flux:cell>{{ $episode->topic }}</flux:cell>
                                        <flux:cell>{{ $episode->winner }}</flux:cell>
                                    </flux:row>
                                @endforeach
                            </flux:rows>
                        </flux:table>
                    </flux:accordion.content>
                </flux:accordion.item>
            </flux:accordion>

            <flux:accordion transition>
                <flux:accordion.item>
                    <flux:accordion.heading>
                        <flux:badge class="md:text-xl" color="sky" icon="{{ $winner == 'jschlatt' ? 'trophy' : '' }}">
                            <span>jschlatt: {{ $this->episodes->where('jschlatt_result', true)->count() }}</span>
                        </flux:badge>
                    </flux:accordion.heading>
                    <flux:accordion.content>
                        <flux:table>
                            <flux:columns>
                                <flux:column>Episode</flux:column>
                                <flux:column>Topic</flux:column>
                                <flux:column>Winner</flux:column>
                            </flux:columns>

                            <flux:rows>
                                @foreach ($this->episodes->where('jschlatt_result', true) as $episode)
                                    <flux:row>
                                        <flux:cell>{{ $episode->episode_number }}</flux:cell>
                                        <flux:cell>{{ $episode->topic }}</flux:cell>
                                        <flux:cell>{{ $episode->winner }}</flux:cell>
                                    </flux:row>
                                @endforeach
                            </flux:rows>
                        </flux:table>
                    </flux:accordion.content>
                </flux:accordion.item>
            </flux:accordion>

            <flux:accordion transition>
                <flux:accordion.item>
                    <flux:accordion.heading>
                        <flux:badge class="md:text-xl" color="orange" icon="{{ $winner == 'mikasacus' ? 'trophy' : '' }}">
                            <span>mikasacus: {{ $this->episodes->where('mikasacus_result', true)->count() }}</span>
                        </flux:badge>
                    </flux:accordion.heading>
                    <flux:accordion.content>
                        <flux:table>
                            <flux:columns>
                                <flux:column>Episode</flux:column>
                                <flux:column>Topic</flux:column>
                                <flux:column>Winner</flux:column>
                            </flux:columns>

                            <flux:rows>
                                @foreach ($this->episodes->where('mikasacus_result', true) as $episode)
                                    <flux:row>
                                        <flux:cell>{{ $episode->episode_number }}</flux:cell>
                                        <flux:cell>{{ $episode->topic }}</flux:cell>
                                        <flux:cell>{{ $episode->winner }}</flux:cell>
                                    </flux:row>
                                @endforeach
                            </flux:rows>
                        </flux:table>
                    </flux:accordion.content>
                </flux:accordion.item>
            </flux:accordion>
        </flux:card>
    </div>
</flux:container>
