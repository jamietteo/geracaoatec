@extends('master.main')

@section('content')

    @component('components.groups.group-form-show', ['group' => $group])
    @endcomponent

@endsection
