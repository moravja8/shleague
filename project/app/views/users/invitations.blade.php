@extends('_layouts.default')

@section('title')
    {{{'SH League - Player invitations'}}}
@stop

@section('content')
    <h1>Moje týmy</h1>
    @if(count(Auth::user()->teams()))
        <table>
            <tr>
                <th>Tým</th><th></th>
            </tr>
            @foreach(Auth::user()->teams() as $member)
                <tr>
                    <td>
                        {{{ Team::find($member->team_id)->name }}}
                    </td>
                    <td>
                    @if ($member->captain == 0)
                        {{ Form::open(array('route' => array('team_members.destroy', $member->id), 'method' => 'delete', 'class' => 'destroy')) }}
                                {{ Form::submit('Opustit tým') }}
                        {{ Form::close() }}
                    @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @else
    -
    @endif

    <h1>Pozvánky od týmů</h1>
    @if(count(Auth::user()->invitations()))
    <table>
        <tr>
            <th>Tým</th><th></th>
        </tr>
        @foreach(Auth::user()->invitations() as $invitation)
            <tr>
                <td>
                    {{ Team::findOrFail($invitation->team_id)->name }}
                </td>
                <td>
                    {{ Form::open(array('route' => array('invitations.accept', $invitation->id), 'method' => 'get')) }}
                            {{ Form::submit('Přijmout pozvánku') }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
    </table>
    @else
    -
    @endif
@stop