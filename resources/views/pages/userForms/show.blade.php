@extends('master.main')

@section('content')

    @component('components.userForms.userForm-form-show', ['userForms' => $userForms])
    @endcomponent

@endsection
