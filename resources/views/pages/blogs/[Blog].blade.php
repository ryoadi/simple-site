<x-layouts.app :title="__($blog->title)">
    <flux:heading level="1" size="xl">{{ $blog->title }}</flux:heading>
    <flux:separator class="mt-2 mb-4" />

    <flux:text class="mb-4">{!! nl2br($blog->content) !!}</flux:text>

    <livewire:blogs.clap :blog="$blog" />

    <x-slot:aside>
        <livewire:blogs.favorites />
    </x-slot:aside>
</x-layouts.app>
