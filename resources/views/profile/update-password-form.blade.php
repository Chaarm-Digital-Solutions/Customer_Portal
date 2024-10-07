<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('dictionary.update-password-form.title') }}
    </x-slot>

    <x-slot name="description">
        {{ __('dictionary.update-password-form.description') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('dictionary.update-password-form.current_password') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('dictionary.update-password-form.new_password') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('dictionary.update-password-form.current_password') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('dictionary.update-password-form.saved') }}
        </x-action-message>

        <x-button>
            {{ __('dictionary.update-password-form.save') }}
        </x-button>
    </x-slot>
</x-form-section>
