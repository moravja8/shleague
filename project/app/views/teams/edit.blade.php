@extends('_layouts.default')

@section('title')
    {{{'SH League - Team Edit'}}}
@stop

@section('content')
    <h1>Úprava týmu</h1>
    {{ Form::model($team, array('route' => array('teams.update', $team->id), 'method'=>'put')) }}
        @include('teams._partials.form')
    {{ Form::close() }}

    <h2>Členové</h2>
    <table>
    <tr><th>Nick</th><th></th><th></th></tr>
    @foreach($team->members() as $member)
        <tr>
            <td>{{{ User::get($member->user_id)->nickname }}}</td>
            <td>
                @if ($member->captain == 1)
                    kapitán
                @endif
            </td>
            <td>
                @if ($member->captain == 0)
                    {{ Form::open(array('route' => array('team_members.destroy', $member->id), 'method' => 'delete', 'class' => 'destroy')) }}
                            {{ Form::submit('Vyhodit hráče') }}
                    {{ Form::close() }}
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
    {{ Form::open(array('route' => array('team.invite_user', $team->id), 'method' => 'put')) }}
        {{ Form::select('user_id', User::lists('nickname', 'id')) }}
        {{ Form::submit('Pozvat hráče') }}
    {{ Form::close() }}
@stop