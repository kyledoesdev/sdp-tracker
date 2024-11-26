<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/home?season=3', navigate: true);
    }
}; ?>

<flux:header class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:brand
            href="https://patreon.com/c/sleepdeprived/posts"
            logo="{{ asset('img/patreon-logo.png') }}"
            name="Sleep Deprived Podcast"
            class="max-lg:hidden"
            target="_blank"
        />
        @auth
            <flux:navbar.item href="{{ route('dashboard') }}">Dashboard</flux:navbar.item>
        @else
        @endauth

        <flux:navbar.item href="{{ route('home') }}?season=3">Season 3</flux:navbar.item>
        <flux:navbar.item href="{{ route('home') }}?season=2">Season 2</flux:navbar.item>
        <flux:navbar.item href="{{ route('home') }}?season=1">Season 1</flux:navbar.item>
    </flux:navbar>
    <flux:spacer />

    <x-dark-mode-toggle />

    @auth
        <flux:dropdown position="top" align="start">
            <flux:button variant="ghost" icon-trailing="chevron-down">{{ auth()->user()?->name }}</flux:button>

            <flux:menu>
                <flux:menu.item href="{{ route('profile') }}">
                    {{ __('Profile') }}
                </flux:menu.item>

                <flux:menu.item icon="arrow-right-start-on-rectangle" wire:click="logout">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    @else
        <flux:button class="mx-1" href="{{ route('login') }}" icon-trailing="arrow-up-right">Login</flux:button>
    @endauth
</flux:header>