@component('mail::message')
{{ __('dictionary.team-invitation.invitation', ['team' => $invitation->team->name]) }}

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
{{ __('dictionary.team-invitation.register') }}

@component('mail::button', ['url' => route('register')])
{{ __('dictionary.team-invitation.create_account') }}
@endcomponent

{{ __('dictionary.team-invitation.register_accept') }}

@else
{{ __('dictionary.team-invitation.invite_accept') }}
@endif


@component('mail::button', ['url' => $acceptUrl])
{{ __('dictionary.team-invitation.accept') }}
@endcomponent

{{ __('dictionary.team-invitation.discard') }}
@endcomponent
