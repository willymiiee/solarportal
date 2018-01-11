@component('mail::message')

{{ $data['message'] }}

@component('mail::button', ['url' => array_get($data, 'preview') ? '' : $invitation_url])
Join Invitation
@endcomponent


Thanks,<br>
{{ config('app.name') }} Team's

@endcomponent
