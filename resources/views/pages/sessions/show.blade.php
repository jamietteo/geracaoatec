@extends('master.main')

@section('content')

    @component('components.sessions.session-form-show', ['session' => $session, 'userForms' => $userForms])
    @endcomponent

@endsection
