@extends('main.main')

@section('title_page', 'Holm Purchaser registration')



@section('content')
    <section class="mainSection" ng-controller="CustomerRegisration">
        <div class="container">
            @include('includes.breadcrumbs', ['bc_title' => 'Customer Registration'])
            @include('pages.customer_registr.progress_bar')
            @yield('step')
        </div>
    </section>
@endsection