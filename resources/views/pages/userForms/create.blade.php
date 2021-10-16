@extends('master.main')

@section('content')

    @component('components.userForms.userForm-form-create', ['userForms' => $userForms, 'students'=> $students, 'users'=>$users])
    @endcomponent

@endsection
