@extends('master.main')

@section('content')

    @component('components.tests.test-form-insert-evaluation', ['test' => $test, 'groups' => $groups])
    @endcomponent

@endsection
