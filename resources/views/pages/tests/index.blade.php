@extends('master.main')

@section('content')

    @component('components.tests.tests-list', ['tests' => $tests])
    @endcomponent

@endsection
