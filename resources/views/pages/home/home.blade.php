@extends('main.main')

@section('title_page', 'Page Home')


@section('content')
    @include('pages.home.section_home')
    @include('pages.home.section_most_popular')
    @include('pages.home.section_questions')
    @include('pages.home.section_testimonials')
@endsection