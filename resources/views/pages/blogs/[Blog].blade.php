<x-layouts.app :title="__($blog->title)">
    <div class="container mx-auto flex">
        <main class="px-4 py-8 w-3/4">
            <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>
            <p class="mb-4">{!! nl2br($blog->content) !!}</p>

            <livewire:blogs.clap :blog="$blog" />
        </main>

        <aside class="px-4 py-8 w-1/4">
            <livewire:blogs.favorites />
        </aside>
    </div>
</x-layouts.app>
