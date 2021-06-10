<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
            <small class="text-sm text-gray-400">category>discussion>topic</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        <x-user.avatar />
                    </div>

                    {{-- Thread --}}
                    <div class="col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400">This is the heading for the forum post</h2>
                            <p class="text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum beatae quod eligendi consequatur omnis sequi veritatis quidem reiciendis asperiores sint illum debitis quam voluptates, nemo rem consectetur dolor error neque fuga nobis est magnam! Pariatur illum enim nobis laboriosam suscipit dolore aperiam aut. Id maiores debitis voluptatem esse expedita ullam!
                            </p>
                            <p class="text-gray-500">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum beatae quod eligendi consequatur omnis sequi veritatis quidem reiciendis asperiores sint illum debitis quam voluptates, nemo rem consectetur dolor error neque fuga nobis est magnam! Pariatur illum enim nobis laboriosam suscipit dolore aperiam aut. Id maiores debitis voluptatem esse expedita ullam!
                            </p>
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                <a href="" class="flex items-center space-x-2">
                                    <x-heroicon-o-heart class="w-5 h-5 text-red-300" />
                                    <span class="text-xs font-bold">148</span>
                                </a>
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Posted: 4hours Ago
                            </div>


                            {{-- Reply --}}
                            <a href="" class="flex items-center space-x-2 text-gray-500">
                                <x-heroicon-o-reply class="w-5 h-5" />
                                <span class="text-sm">Reply</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Replies --}}

            <div class="p-5 space-y-4 text-gray-500 bg-white border-l border-blue-300 shadow">
                <div class="grid grid-cols-8">
                    <button class="flex items-center text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                        {{-- <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /> --}}
                        <img class="object-cover w-16 h-16 rounded" src="{{ asset('img/avatars/person4.jpg') }}" alt="Person One" />
                    </button>
                    <div class="col-span-7 space-y-4">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil tenetur alias maiores, sequi magni nam incidunt a beatae veritatis animi suscipit omnis ipsam, accusantium vitae impedit vero molestiae nostrum illo perspiciatis rerum? Recusandae dicta cumque nulla officiis explicabo aliquid nobis? Consectetur dicta fugiat quas amet corporis facere possimus asperiores harum?
                        </p>
                        <div class="flex justify-between">
                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                <a href="" class="flex items-center space-x-2">
                                    <x-heroicon-o-heart class="w-5 h-5 text-red-300" />
                                    <span class="text-xs font-bold">30</span>
                                </a>
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Replied: 2 mintues ago
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-5 space-y-4 bg-white shadow">
                <h2 class="text-gray-500">Post a reply</h2>
                <x-trix name="about" styling="bg-gray-100 shadow-inner h-40" />
            </div>
        </section>
    </main>
</x-guest-layout>
