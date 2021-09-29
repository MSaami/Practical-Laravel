@component('mail::message')
# Verify your email

Dear {{$name}}

@component('mail::button', ['url' => $link])
Verify your email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
