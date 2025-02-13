@extends('shopify-app::layouts.default')

@section('styles')
    @routes
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    <ui-nav-menu>
        <a href="/" rel="home">Home</a>
        <a href="/campaigns">Campaigns</a>
        <a href="/subscribers">Subscribers</a>
        <a href="/automations">Automations</a>
        <a href="/forms">Forms</a>
    </ui-nav-menu>
    @inertiaHead
@endsection

@section('content')
    @inertia
@endsection

@section('scripts')
    @parent
@endsection
