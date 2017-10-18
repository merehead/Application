@component('mail::message')
    # {{ $content['title'] }}

{{ $content['body'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
