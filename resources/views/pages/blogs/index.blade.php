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
    <div class="container mx-auto flex">
        @volt
            <main class="px-4 py-8 w-3/4">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-3xl font-bold mb-4">{{ __('Blogs') }}</h1>

                    <form wire:submit.prevent>
                        <input type="text" 
                            wire:model.live.debounce="keyword" 
                            placeholder="{{ __('Search blogs...') }}" 
                            class="px-4 py-2 rounded w-full mb-4"
                        >
                    </form>
                </div>
                

                @if($blogs->isEmpty())
                    <p class="text-gray-500">{{ __('No blogs found.') }}</p>
                @else
                    <ul class="space-y-4">
                        @foreach($blogs as $blog)
                            <li>
                                <a href="{{ url("blogs/{$blog->id}") }}" class="hover:underline">
                                    <h2 class="text-xl font-bold mb-4">{{ $blog->title }}</h2>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    {{ $blogs->links() }}
                @endif
            </main>
        @endvolt

        <aside class="px-4 py-8 w-1/4">
            <livewire:blogs.favorites />
        </aside>
    </div>
</x-layouts.app>
