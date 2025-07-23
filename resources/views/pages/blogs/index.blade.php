<?php

use App\Models\Blog;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;

    #[Url]
    public string $keyword =  '';

    public function with(): array
    {
        return [
            'blogs' => Blog::query()
                ->when($this->keyword)
                    ->whereLike('title', "%{$this->keyword}%")
                ->latest()
                ->paginate(),
        ];
    }
}; ?>

<x-layouts.app :title="__('Blogs')">
    @volt
        <main>
            <div class="flex items-center justify-between">
                <flux:heading level="1" size="xl">{{ __('Blogs') }}</flux:heading>

                <form wire:submit.prevent>
                    <flux:input
                        type="search"
                        wire:model.live.debounce="keyword" 
                        placeholder="{{ __('Search blogs...') }}" 
                    />
                </form>    
            </div>
            <flux:separator class="mt-2 mb-4" />

            @if($blogs->isEmpty())
                <flux:text variant="subtle">{{ __('No blogs found.') }}</flux:text>
            @else
                <flux:text size="lg">
                    <ul class="space-y-2 mb-4">
                        @foreach($blogs as $blog)
                            <li>
                                <flux:link href='{{ url("blogs/{$blog->id}") }}' variant="ghost" wire:navigate>
                                    {{ $blog->title }}
                                </flux:link>
                            </li>
                        @endforeach
                    </ul>
                </flux:text>

                {{ $blogs->links() }}
            @endif
        </main>
    @endvolt

    <x-slot:aside>
        <livewire:blogs.favorites />
    </x-slot:aside>
</x-layouts.app>
