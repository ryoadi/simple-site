<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {
    #[Rule('required|min:5')]
    public $message = '';

    #[Rule('required|email')]
    public $email = '';
    
    public function submit() {
        $this->validate();

        // Here you would typically handle the form submission, 
        // e.g., send an email or save to the database.
        session()->flash('success');
    }
} ?>

<x-layouts.app :title="__('Contact Us')">
    @volt
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
        
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                Thank you for your message! We will get back to you soon.
            </div>
        @endif

        <form wire:submit.prevent="submit" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                <input type="email" id="email" wire:model.lazy="email" 
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="message" class="block text-sm font-medium text-gray-300">Message</label>
                <textarea id="message" wire:model.lazy="message" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                @error('message') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>

            <button type="submit" 
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Send Message
            </button>
        </form>
    </div>
    @endvolt
</x-layouts.app>