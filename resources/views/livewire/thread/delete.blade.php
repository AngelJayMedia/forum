<div class="px-2 py-1 text-xs text-gray-500 transition duration-100 bg-red-300 rounded hover:bg-red-400">
    <a wire:click="confirmThreadDeletion" wire:loading.attr="disabled"
    class="cursor-pointer">
        Delete
    </a>

    <x-jet-dialog-modal wire:model="confirmingThreadDeletion">
        <x-slot name="title">
            {{ __("Delete Thread") }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete thread ?!') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingThreadDeletion')" wire:loading.attr="disabled">
                {{ __("Cancel") }}
            </x-jet-secondary-button>
                
            <x-jet-danger-button wire:click="deleteThread" wire:loading.attr="disabled">
                {{ __('Delete Thread') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
