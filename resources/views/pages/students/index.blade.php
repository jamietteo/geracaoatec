@extends('master.main')

@section('content')

    @component('components.students.students-list', ['students' => $students])
    @endcomponent

@endsection
