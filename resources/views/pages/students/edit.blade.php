@extends('master.main')

@section('content')

    @component('components.students.student-form-edit', ['student' => $student, 'groups' => $groups])
    @endcomponent

@endsection
