@extends('master.main')

@section('content')

    @component('components.userForms.userForms-list', ['userForms' => $userForms])
    @endcomponent

@endsection
