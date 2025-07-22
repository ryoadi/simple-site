<?php

use App\Models\Blog;
use Livewire\Volt\Component;

new class extends Component {
    public Blog $blog;

    public function mount(Blog $blog): void
    {
        $this->blog = $blog;
    }

    public function clap(): void
    {
        $this->blog->increment('claps', 1);
    }
}; ?>

<div>
    <button wire:click="clap" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
        Clap
    </button>
    <span class="ml-2">{{ $blog->claps }} clap(s)</span>
</div>
