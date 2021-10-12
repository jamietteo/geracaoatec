@extends('master.main')

@section('content')

    @component('components.tests.test-form-create', ['students' => $students, 'groups' => $groups])
    @endcomponent

@endsection
