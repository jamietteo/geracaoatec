@extends('master.main')

@section('content')

    @component('components.groups.groups-list', ['groups' => $groups])
    @endcomponent

@endsection
