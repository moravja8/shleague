@extends('..._layouts.default')

@section('title')
    {{{'SH League - User edit'}}}
@stop

@section('content')
    <h1>Registrace</h1>
    {{ Form::open(array('route' => array('user.store'), 'method' => 'get')) }}
        @include('users._partials.form')
    {{ Form::close() }}

@stop