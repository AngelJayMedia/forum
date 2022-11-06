<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <section class="px-6">
        {{-- Livewire Index --}}
        <livewire:notifications.index />
    </section>


</x-app-layout>
