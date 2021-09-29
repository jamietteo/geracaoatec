@extends('master.main')

@section('content')

    @component('components.groups.group-form-create', ['institutions' => $institutions])
    @endcomponent

@endsection
