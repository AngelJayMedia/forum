<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <aside class="flex flex-col items-center h-full p-4 space-y-4 bg-white shadow">

            <a href="{{ route('profile', $user) }}" class="flex flex-col items-center text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                <img class="object-cover w-32 h-32 rounded" src="{{ $user->profile_photo_url }}" alt="{{ $user->name() }}" />
                <span class="mt-2 text-sm text-gray-500">{{ $user->name() }}</span>
            </a>

            <div class="text-xs">
                <h2 class="font-bold text-blue-500">Join Date:</h2>
                <span class="text-gray-600">{{ $user->created_at->diffForHumans() }}</span>
            </div>

            {{-- Follow Buttons --}}
            <div class="">
            </div>

        </aside>

        <section class="flex flex-col col-span-3 gap-y-4">
            <x-alerts.main />

            <span class="w-full p-2 text-blue-500 bg-white rounded shadow">
                Latest Threads
            </span>

            @foreach($user->latestThreads() as $thread)
            <article class="p-5 bg-white shadow">
                <div class="relative grid grid-cols-8">
                    {{-- Thread --}}
                    <div class="relative col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400">
                                {{ $thread->title() }}
                            </h2>
                            <div class="text-gray-500">
                                {!! $thread->body() !!}
                            </div>
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                <livewire:like-thread :thread="$thread" />
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Posted: {{ $thread->created_at->diffForHumans() }}
                            </div>
                        </div>


                    </div>
                    {{-- Edit Button --}}
                    <div class="absolute top-0 right-2">
                        <div class="flex space-x-2">
                            @can(App\Policies\ThreadPolicy::UPDATE, $thread)
                            <x-links.secondary href="{{ route('threads.edit', $thread->slug()) }}">
                                Edit
                            </x-links.secondary>
                            @endcan

                            @can(App\Policies\ThreadPolicy::DELETE, $thread)
                            <livewire:thread.delete :thread="$thread" :key="$thread->id()" />
                            @endcan
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </section>
    </main>
</x-guest-layout>
