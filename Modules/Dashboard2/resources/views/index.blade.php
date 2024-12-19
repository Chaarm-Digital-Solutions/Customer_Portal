<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard2::dictionary.dashboard2.title') }}
        </h2>
    </x-slot>

    @vite(['Modules/Dashboard2/Resources/assets/js/app.js', 'Modules/Dashboard2/Resources/assets/sass/app.scss'])

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <button class="save-grid mb-4 px-4 py-2 bg-blue-500 text-white rounded">
                    Save Layout
                </button>
                
                <div class="grid-stack">
                    <!-- Example widgets -->
                    <div class="grid-stack-item" gs-x="0" gs-y="0" gs-w="4" gs-h="2">
                        <div class="grid-stack-item-content">
                            Widget 1
                        </div>
                    </div>
                    <div class="grid-stack-item" gs-x="4" gs-y="0" gs-w="4" gs-h="2">
                        <div class="grid-stack-item-content">
                            Widget 2
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>