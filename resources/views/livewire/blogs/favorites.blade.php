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
    <h2 class="text-2xl font-bold mb-4">Favorite Blogs</h2>
    <ul>
        @foreach($blogs as $blog)
            <li>
                <a href="{{ url("/blogs/{$blog->id}") }}" class="hover:underline">
                    <h3 class="text-lg font-bold mb-3">{{ $blog->title }}</h3>
                </a>
            </li>
        @endforeach
    </ul>
</div>
