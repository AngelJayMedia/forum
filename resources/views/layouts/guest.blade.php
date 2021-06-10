<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-partials.head />
</head>

<body class="bg-gray-100">

    {{-- Header --}}
    <header class="relative flex items-center justify-center h-40 bg-blue-500">
        <img class="absolute z-10 object-cover w-full h-40 opacity-10" src="{{ asset('img/bg/bg-header.jpg') }}" alt="">
        <h2 class="z-50 text-4xl font-bold text-gray-200">Welcome to the community</h2>
    </header>

    {{-- Navbar --}}
    <x-partials.nav />

    {{-- Slot --}}
    <div class="mb-8 font-sans antialiased text-gray-900">
        {{ $slot }}
    </div>

    {{-- Footer --}}
    <x-partials.footer />

    <livewire:scripts />
    @bukScripts(true)
</body>

</html>
