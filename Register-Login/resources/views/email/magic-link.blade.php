@component('mail::message')
# Login with magic link


@component('mail::button', ['url' => $link])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
