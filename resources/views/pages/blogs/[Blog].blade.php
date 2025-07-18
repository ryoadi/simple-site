<x-layouts.app :title="__($blog->title)">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>
        <p class="mb-4">{!! nl2br($blog->content) !!}</p>
    </div>
</x-layouts.app>
