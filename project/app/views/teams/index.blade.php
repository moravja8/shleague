@extends('..._layouts.default')

@section('title')
    {{{'SH League - Teams'}}}
@stop

@section('content')
    <h1>Týmy</h1>
    <p>
    </p>
    @if(count($teams))
        <ul>
        @foreach($teams as $team)
            <li>
                {{ link_to_route('teams.show', $team->name, array($team->id)) }}
            </li>
        @endforeach
        </ul>
        <p class="links">{{$teams->links()}}</p>
        <hr>
    @endif
    {{ Form::open(array('route' => array('teams.create'), 'method' => 'get')) }}
            {{ Form::submit('Vytvořit tým') }}
    {{ Form::close() }}
@stop