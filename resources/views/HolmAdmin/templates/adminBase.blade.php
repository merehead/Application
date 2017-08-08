@extends(config('settings.theme').'.layouts.app')

@section('logoInfo')
    {!! $logoInfo !!}
@endsection

@section('navigation')
{!! $navigation !!}
@endsection

@section('content')
{!! $content !!}
@endsection
