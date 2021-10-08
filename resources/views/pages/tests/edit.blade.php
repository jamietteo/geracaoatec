@extends('master.main')

@section('content')

    @component('components.tests.test-form-edit', ['test' => $test, 'groups' => $groups])
    @endcomponent

@endsection
