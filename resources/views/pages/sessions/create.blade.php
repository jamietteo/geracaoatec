@extends('master.main')

@section('content')

    @component('components.sessions.session-form-create', ['sessions' => $sessions, 'userForms' => $userForms])
    @endcomponent

@endsection
