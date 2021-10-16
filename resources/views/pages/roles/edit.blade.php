@extends('master.main')

@section('content')

    @component('components.roles.role-form-edit', ['role' => $role])
    @endcomponent

@endsection
