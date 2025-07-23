<?php

use App\Models\Blog;
use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'blogs' => Blog::latest('claps')->limit(5)->get(),
        ];
    }
}; ?>

<div>
    <flux:heading level="2" size="lg">{{ __('Favorite Blogs') }}</flux:heading>
    <flux:separator class="mt-2 mb-4" />

    <flux:text>
        <ul class="space-y-2">
            @foreach($blogs as $blog)
                <li>
                    <flux:link href='{{ url("/blogs/{$blog->id}") }}' variant="ghost" wire:navigate>
                        {{ $blog->title }}
                    </flux:link>
                </li>
            @endforeach
        </ul>
    </flux:text>
</div>
