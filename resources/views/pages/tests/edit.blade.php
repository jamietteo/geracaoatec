@extends('master.main')

@section('content')

    @component('components.tests.test-form-edit', ['test' => $test])
    @endcomponent

@endsection
