@extends(config('settings.frontTheme').'.layouts.homePage')

@section('header')
    {!! $header !!}
@endsection

@section('content')
    {!! $content !!}
@endsection

@section('footer')
    {!! $footer !!}
@endsection

@section('modals')
    {!! $modals !!}
@endsection