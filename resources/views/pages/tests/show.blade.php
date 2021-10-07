@extends('master.main')

@section('content')

    @component('components.tests.test-form-show', ['test' => $test])
    @endcomponent

@endsection
