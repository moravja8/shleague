@extends('..._layouts.default')

@section('title')
    {{{'SH League - Login'}}}
@stop

@section('content')
    <h1>Register</h1>
    {{ Form::open(array('route' => array('login.post'))) }}

    {{ Form::close() }}
@stop