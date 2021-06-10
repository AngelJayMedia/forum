<aside class="min-h-screen col-span-1 px-8 bg-white shadow">
    <div class="py-6 space-y-7">
        {{-- Dashboard --}}
        <div>
            <x-sidenav.title>
                {{ __('Dashboard') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    <x-zondicon-user class="w-3 text-green-400" />
                    <span>{{ __('Profile') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    <x-zondicon-user-group class="w-3 text-green-400" />
                    <span>{{ __('Users') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Categories --}}
        <div>
            <x-sidenav.title>
                {{ __('Categories') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('categories.create') }}" :active="request()->routeIs('categories.create')">
                    <x-zondicon-compose class="w-3 text-green-400" />
                    <span>{{ __('Create') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Threads') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('threads.index') }}" :active="request()->routeIs('threads.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Authentication') }}
            </x-sidenav.title>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-sidenav.link href="{{ route('logout') }}" onclick="event.preventDefault();                                               this.closest('form').submit();">
                        <x-heroicon-o-logout class="w-4 text-green-400" />
                        <span>{{ __('Logout') }}</span>
                    </x-sidenav.link>

                </form>

            </div>
        </div>

    </div>
</aside>
