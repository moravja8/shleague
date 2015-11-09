@extends('..._layouts.default')

@section('title')
    {{{'SH League - User edit'}}}
@stop

@section('content')
    <h1>Upravit údaje uživatele</h1>
    {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'put')) }}
        @include('users._partials.form')
    {{ Form::close() }}

@stop