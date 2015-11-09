@extends('..._layouts.default')

@section('title')
    {{{'SH League - User'}}}
@stop

@section('content')
    <h1>Uživatel</h1>
       <table>
           <tr>
               <th class="horizontal">
                   Nick
               </th>
               <td>
                   {{{ $user->nickname }}}
               </td>
           </tr>
            <tr>
              <th class="horizontal">
                  Email
              </th>
              <td>
                  {{{$user->mail}}}
              </td>
          </tr>
          <tr>
             <th class="horizontal">
                 Jméno
             </th>
             <td>
                 {{{$user->name}}}
             </td>
         </tr>
         <tr>
              <th class="horizontal">
                  Datum narození
              </th>
              <td>
                  {{{$user->birthdate}}}
              </td>
          </tr>
          <tr>
                <th class="horizontal">
                    Město
                </th>
                <td>
                    {{{$user->city}}}
                </td>
            </tr>
          <tr>
             <th class="horizontal">
                 Země
             </th>
             <td>
                 {{{$user->state}}}
             </td>
          </tr>
          <tr>
             <th class="horizontal">
                 Informace
             </th>
             <td>
                 {{{$user->info}}}
             </td>
          </tr>
       </table>
       {{ Form::open(array('route' => array('user.edit', $user->id), 'method' => 'get')) }}
               {{ Form::submit('Upravit údaje') }}
       {{ Form::close() }}
@stop