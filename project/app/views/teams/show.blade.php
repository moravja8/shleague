@extends('_layouts.default')

@section('title')
    {{{'SH League - Team Show'}}}
@stop

@section('content')
    <h1>Tým</h1>
    <table>
        <tr>
            <th class="horizontal">
                Name
            </th>
            <td>
                {{{$team->name}}}
            </td>
        </tr>
        <tr>
            <th class="horizontal">
                Abbreviation
            </th>
            <td>
                {{{ $team->abbreviation }}}
            </td>
        </tr>
        <tr>
            <th class="horizontal">
                Description
            </th>
            <td>
                {{{ $team->description }}}
            </td>
        </tr>
    </table>

    <h2>Členové</h2>
    <table>
    <tr><th>Nick</th><th></th></tr>
    @foreach($team->members() as $member)
        <tr>
            <td>{{{ User::find($member->user_id)->nickname }}}</td>
            <td>
                @if ($member->captain == 1)
                    kapitán
                @endif
            </td>
        </tr>
    @endforeach
    </table>

    <h2>Zaslané pozvánky</h2>
    @if(count($team->sentInvitations()))
        <table>
        <tr><th>Nick</th></tr>
        @foreach($team->sentInvitations() as $invitation)
            <tr>
                <td>{{{ User::find($invitation->user_id)->nickname }}}</td>
            </tr>
        @endforeach
        </table>
    @else
    -
    @endif
    <hr>

    {{ Form::open(array('route' => array('teams.edit', $team->id), 'method' => 'get')) }}
            {{ Form::submit('Upravit tým') }}
    {{ Form::close() }}
    {{ Form::open(array('route' => array('teams.destroy', $team->id), 'method' => 'delete', 'class' => 'destroy')) }}
            {{ Form::submit('Smazat tým') }}
    {{ Form::close() }}
@stop