@extends(config('settings.frontTheme').'.layouts.purchaserPrivateProfileLayout')

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
