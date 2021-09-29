@extends('master.main')

@section('content')

    @component('components.institutions.institutions-list', ['institutions' => $institutions])
    @endcomponent

@endsection
