@extends('master.main')

@section('content')

    @component('components.sessions.sessions-list', ['sessions' => $sessions])
    @endcomponent

@endsection
