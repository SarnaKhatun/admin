@extends('backend.layouts.master')
@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @if(isset($results['clients']))
        <h2>Clients</h2>
        @include('backend.search.load-page.clients')
    @endif

    @if(isset($results['directors']))
        <h2>Directors</h2>
        @include('backend.search.load-page.directors')
    @endif

    @if(isset($results['schemes']))
        <h2>Schemes</h2>
        @include('backend.search.load-page.scheme')
    @endif

    @if(isset($results['members']))
        <h2>Members</h2>
        @include('backend.search.load-page.members')
    @endif

    @if(isset($results['provident_funds']))
        <h2>Provident Funds</h2>
        @include('backend.search.load-page.provident-funds')
    @endif

    @if(isset($results['monthly_collections']))
        <h2>Monthly Collections</h2>
        @include('backend.search.load-page.monthly-collections')
    @endif

    @if(isset($results['withdraws']))
        <h2>Withdraws</h2>
        @include('backend.search.load-page.withdraws')
    @endif

    @if(isset($results['users']))
        <h2>Users</h2>
        @include('backend.search.load-page.users')
    @endif
@endsection

