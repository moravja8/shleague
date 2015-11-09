@extends('_layouts.default')

@section('title')
    {{{'SH League - Team Edit'}}}
@stop

@section('content')
    <h1>Create</h1>
    {{ Form::open(array('route' => array('teams.store'))) }}
        @include('teams._partials.form')
    {{ Form::close() }}
@stop