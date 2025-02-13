@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
    <p>You are: {{ $shopDomain ?? Auth::user()->name }}</p>

    <ui-title-bar title="Products">
        <button onclick="console.log('Secondary action')">Secondary action</button>
        <button variant="primary" onclick="console.log('Primary action')">
            Primary action
        </button>
    </ui-title-bar>
@endsection
