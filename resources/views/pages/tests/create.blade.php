@extends('master.main')

@section('content')

    @component('components.tests.test-form-create', ['groups' => $groups])
    @endcomponent

@endsection
