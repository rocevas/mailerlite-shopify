@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Set MailerLite API Key</h1>

        @if(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif

        <form action="{{ route('mailerlite.connect.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="mailerlite_api_key" class="form-label">MailerLite API Key</label>
                <input type="text" name="mailerlite_api_key" id="mailerlite_api_key" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Save API Key</button>
        </form>
    </div>
@endsection
