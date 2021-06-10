<article class="p-5 bg-white shadow">

    <div class="grid grid-cols-8 gap-2">

        {{-- Avatar --}}
        <div class="col-span-1">
            <x-user.avatar />
        </div>

        {{-- Content --}}
        <div class="col-span-6 space-y-4">

            <a href="{{ route('single') }}" class="space-y-2">
                <h2 class="text-xl tracking-wide hover:text-blue-400">This is the heading for the forum post</h2>
                <p class="text-gray-500">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime laboriosam quo recusandae tempora voluptatum dignissimos quidem nemo animi, repellendus saepe?
                </p>
            </a>

            {{-- Indicators --}}
            <div class="flex space-x-6">
                {{-- Comments Count --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="text-xs text-gray-500">20</span>
                </div>

                {{-- Views Count --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <span class="text-xs text-gray-500">125</span>
                </div>

                {{-- Post Date --}}
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-xs text-gray-500">4 hours ago</span>
                </div>
            </div>
        </div>

        {{-- Category --}}
        <div class="col-span-1 space-y-3">
            <div>
                <a href="" class="p-1 text-sm text-white bg-indigo-400 rounded">
                    Category One
                </a>
            </div>
        </div>

    </div>
</article>
