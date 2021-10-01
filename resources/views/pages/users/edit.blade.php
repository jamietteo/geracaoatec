@extends('master.main')

@section('content')

    @component('components.users.user-form-edit', ['user' => $user, 'institutions' => $institutions, 'roles' => $roles])
    @endcomponent

@endsection
