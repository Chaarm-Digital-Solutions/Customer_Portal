@push('navigation-links')
    <x-nav-link href="{{ route('gantt-chart') }}" :active="request()->routeIs('gantt-chart')">
        {{ __('ganttchart::dictionary.navigation-menu.title') }}
    </x-nav-link>
@endpush

@push('responsive-navigation-links')
    <x-responsive-nav-link href="{{ route('gantt-chart') }}" :active="request()->routeIs('gantt-chart')">
        {{ __('ganttchart::dictionary.navigation-menu.title') }}
    </x-responsive-nav-link>
@endpush