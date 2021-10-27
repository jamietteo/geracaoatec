@extends('master.main')

@section('content')

    @component('components.dashboard.dashboard-list', ['counts' => $counts])
    @endcomponent

@endsection
