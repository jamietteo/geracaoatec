@extends('master.main')

@section('content')

    @component('components.userForms.userForm-form-show', ['userForm' => $userForm, 'students'=> $students, 'users'=>$users])
    @endcomponent

@endsection
