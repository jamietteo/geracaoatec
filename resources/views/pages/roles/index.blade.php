@extends('master.main')

@section('content')

    @component('components.roles.roles-list', ['roles' => $roles])
    @endcomponent

@endsection
