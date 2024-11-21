@push('navigation-links')
    <x-nav-link href="{{ route('gantt_chart') }}" :active="request()->routeIs('gantt_chart')">
        {{ __('dictionary.navigation-menu.gantt_chart') }}
    </x-nav-link>
@endpush

@push('responsive-navigation-links')
    <x-responsive-nav-link href="{{ route('gantt_chart') }}" :active="request()->routeIs('gantt_chart')">
        {{ __('dictionary.navigation-menu.gantt_chart') }}
    </x-responsive-nav-link>
@endpush