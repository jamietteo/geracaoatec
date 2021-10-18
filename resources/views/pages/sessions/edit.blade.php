@extends('master.main')

@section('content')

    @component('components.sessions.session-form-edit', ['session' => $session, 'userForms' => $userForms])
    @endcomponent

@endsection
