
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard2::dictionary.dashboard2.title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid-stack">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
<script src="{{ asset('modules/widgetdashboard/js/gridstack-init.js') }}"></script>
@endpush