@extends('master.main')

@section('content')

    @component('components.userForms.userForm-form-edit', ['userForm' => $userForm, 'students'=> $students, 'users'=>$users])
    @endcomponent

@endsection
