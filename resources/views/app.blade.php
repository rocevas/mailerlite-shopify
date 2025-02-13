@extends('shopify-app::layouts.default')

@section('styles')
    @routes
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite('resources/js/app.js')
    @inertiaHead
@endsection

@section('content')
    @inertia
@endsection

@section('scripts')
    @parent
@endsection
