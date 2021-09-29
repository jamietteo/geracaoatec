@extends('master.main')

@section('content')

    @component('components.users.users-list', ['users' => $users])
    @endcomponent

@endsection
