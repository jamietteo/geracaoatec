@extends('master.main')

@section('content')

    @component('components.students.student-form-create', ['groups' => $groups])
    @endcomponent

@endsection
