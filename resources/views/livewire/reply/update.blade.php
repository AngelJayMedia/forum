<div>

    <div x-data="
    {
        editReply:false,
        focus: function() {
            const textInput = this.$refs.textInput;
            textInput.focus();
        }
    }" x-cloak>

    <div x-show="!editReply" class="relative">

        <div class="p-5 space-y-4 text-gray-500 bg-white border-l-4 border-blue-300 shadow">
            <div class="grid grid-cols-8">
                
                {{-- Avatar --}}
                <div class="col-span-1">
                    <x-user.avatar :user="$author"/>
                </div>

                <div class="relative col-span-6 space-y-4">
                    <p>
                        {!! $replyOrigBody !!}
                    </p>
                    <div class="absolute flex justify-between w-full bottom-1">
                        {{-- Likes --}}
                        <div class="flex space-x-5 text-gray-500">
                            <livewire:like-reply :reply='App\Models\Reply::find($replyId)'>
                        </div>

                        {{-- Date Posted --}}
                        <div class="flex items-center text-xs text-gray-500">
                            <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                            Replied: {{ $createdAt->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute space-x-3 flex top-2 right-2">
            @can(App\Policies\ReplyPolicy::UPDATE, App\Models\Reply::find($replyId))
            <x-links.secondary x-on:click="editReply = true; $nextTick(() => focus())" class="cursor-pointer">
                {{ __('Edit') }}
            </x-links.secondary>
            @endcan

            @can(App\Policies\ReplyPolicy::DELETE, App\Models\Reply::find($replyId))
            <livewire:reply.delete :replyId="$replyId" :wire:key="$replyId" :page="request()->fullUrl()" />
            @endcan
        </div>

    </div>

        <div x-show="editReply">
            <form wire:submit.prevent="updateReply">
                <input class="w-full bg-gray-100 border-none shadow-inner focus:ring-blue-500" type="text" name="replyNewBody" wire:model.lazy="replyNewBody" x-ref="textInput" x-on:keydown.enter="editReply = false" x-on:keydown.escape="editReply false">
                
                <div class="mt-2 space-x-3 text-xs">
                    <button type="button" class="text-green-400" x-on:click="editReply = false">
                        Cancel
                    </button>

                    <button type="submit" class="text-red-400" x-on:click="editReply = false">
                        Save
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>
