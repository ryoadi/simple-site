<?php

use App\Models\Blog;
use Illuminate\View\View;

use function Laravel\Folio\render;

render(fn(View $view) => $view->with('blogs', Blog::latest()->paginate()));

?>

<x-layouts.app :title="__('Blogs')">
    <div class="container mx-auto flex">
        <main class="px-4 py-8 w-3/4">
            <h1 class="text-3xl font-bold mb-4">{{ __('Blogs') }}</h1>

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

        <aside class="px-4 py-8 w-1/4">
            <livewire:blogs.favorites />
        </aside>
    </div>
</x-layouts.app>
