<x-guest-layout>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav />

        <section class="flex flex-col col-span-3 gap-y-4">
            <small class="text-sm text-gray-400">threads>{{ $thread->title() }}>edit</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        {{-- <x-user.avatar /> --}}
                    </div>

                    {{-- Create --}}
                    <div class="col-span-7 space-y-6">
                        <x-form action="{{ route('threads.update', $thread->slug()) }}">
                            <div class="space-y-8">

                                {{-- Title --}}
                                <div>
                                    <x-form.label for="title" value="{{ __('Title') }}" />
                                    <x-form.input id="title" class="block w-full mt-1" type="text" name="title" :value="$thread->title()" autofocus />
                                    <x-form.error for="title" />
                                </div>


                                {{-- Category --}}
                                <div>
                                    <x-form.label for="category" value="{{ __('Category') }}" />
                                    <select name="category" id="category" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id() }}" @if($category->id() == 
                                        $selectedCategory->id) selected @endif>
                                                {{ $category->name() }}
                                        </option>
                                    @endforeach
                                    </select>
                                    <x-form.error for="category" />
                                </div>

                                {{-- Tag --}}
                                <div>
                                    <x-form.label for="tags" value="{{ __('Tags') }}" />
                                    <select name="tags[]" id="tags" x-data="{}" x-init="function () { choices($el) }" class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple>
                                        @foreach ($tags as $tag)
                                        <option value="{{ $tag->id() }}" @if (in_array($tag->id(), $oldTags)) selected
                                        @endif >    
                                            {{ $tag->name() }}
                                        </option>
                                    @endforeach
                                    </select>
                                    <x-form.error for="tags" />
                                </div>

                                {{-- Body --}}
                                <div>
                                    <x-form.label for="body" value="{{ __('Description') }}" />
                                    <x-trix name="body" styling="shadow-inner bg-gray-100">
                                        {{ $thread->body() }}
                                    </x-trix>
                                    <x-form.error for="body" />
                                </div>

                                {{-- Button --}}
                                <x-buttons.primary>
                                    {{ __('Update') }}
                                </x-buttons.primary>
                        </x-form>
                    </div>
                </div>
            </article>
        </section>
    </main>
</x-guest-layout>
