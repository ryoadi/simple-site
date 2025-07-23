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
        <main>
            <flux:heading level="1" size="xl">{{ __('Contact Us') }}</flux:heading>
            <flux:separator class="mt-2 mb-4" />
            
            @if (session()->has('success'))
                <flux:callout variant="success" 
                    icon="check-circle"
                    heading="{{ __('Thank you for your message! We will get back to you soon.') }}" 
                    class="mb-4"
                />
            @endif

            <form wire:submit.prevent="submit" class="space-y-4">
                <flux:input type="email" label="{{ __('Email') }}" wire:model.lazy="email" />

                <flux:textarea label="{{ __('Message') }}" wire:model.lazy="message" />

                <flux:button variant="primary" type="submit">{{ __('Send Message') }}</flux:button>
            </form>
        </main>
    @endvolt
</x-layouts.app>