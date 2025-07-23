<x-layouts.app.header :title="$title ?? null">
    <flux:container>
        <flux:main>
            {{ $slot }}
        </flux:main>

        @isset($aside)
            <flux:aside class="pl-6 pt-8 w-70 hidden lg:block">
                {{ $aside }}
            </flux:aside>
        @endisset
    </flux:container>
</x-layouts.app.sidebar>
