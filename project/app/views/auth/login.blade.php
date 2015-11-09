@extends('_layouts.default')

@section('title')
    {{{'SH League - Login'}}}
@stop

@section('content')
    <h1>Login</h1>
    {{ Form::open(array('route' => array('login.post'))) }}
       <table>
           <tr>
               <th class="horizontal">
                   {{Form::label('nickname', 'Nickname')}}
               </th>
               <td>
                   {{Form::text('nickname') }}
                   {{$errors->first('nickname', '<span class="error">:message</span>')}}
               </td>
           </tr>
           <tr>
               <th class="horizontal">
                   {{Form::label('password', 'Password')}}
               </th>
               <td>
                   {{Form::password('password') }}
                   {{$errors->first('password', '<span class="error">:message</span>')}}
               </td>
           </tr>
       </table>
       <hr>
       {{ Form::submit('Log in') }}
    {{ Form::close() }}
@stop