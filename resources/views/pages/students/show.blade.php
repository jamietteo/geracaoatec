@extends('master.main')

@section('content')

    @component('components.students.student-form-show', ['student' => $student])
    @endcomponent

@endsection
