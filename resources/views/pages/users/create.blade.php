@extends('master.main')

@section('content')

    @component('components.users.user-form-create', ['institutions' => $institutions, 'roles' => $roles])
    @endcomponent

@endsection
