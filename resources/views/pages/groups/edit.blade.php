@extends('master.main')

@section('content')

    @component('components.groups.group-form-edit', ['group' => $group, 'institutions' => $institutions])
    @endcomponent

@endsection
