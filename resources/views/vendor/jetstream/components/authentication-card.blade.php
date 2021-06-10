<div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">

    <div class="flex items-center justify-center w-full py-4 bg-white sm:max-w-md rounded-t-md">
        <a href="{{ route('home') }}">
            {{ $logo }}
        </a>
    </div>

    <div class="w-full px-6 py-4 overflow-hidden bg-white shadow-md sm:max-w-md rounded-b-md">
        {{ $slot }}
    </div>

</div>
