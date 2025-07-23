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

<div class="flex items-center gap-2">
    <flux:button variant="ghost" size="sm" icon="hand-thumb-up" inset wire:click="clap"></flux:button>
    <flux:text>{{ __(':fav favorite(s)', ['fav' => $blog->claps]) }}</flux:text>
</div>
