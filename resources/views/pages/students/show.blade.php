@extends('master.main')

@section('content')

    @component('components.students.student-form-show', ['student' => $student, 'userform' => $userform, 'evaluations' => $evaluations, 'medias' => $medias ])
    @endcomponent

@endsection
