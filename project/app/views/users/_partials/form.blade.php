<table>
   <tr>
       <th class="horizontal">
           {{Form::label('nickname', 'Nick*')}}
       </th>
       <td>
           {{Form::text('nickname') }}
           {{$errors->first('nickname', '<span class="error">:message</span>')}}
       </td>
   </tr>
  </tr>
   <tr>
      <th class="horizontal">
          {{Form::label('mail', 'Email*')}}
      </th>
      <td>
          {{Form::text('mail') }}
          {{$errors->first('mail', '<span class="error">:message</span>')}}
      </td>
  </tr>
  <tr>
     <th class="horizontal">
         {{Form::label('name', 'Jméno')}}
     </th>
     <td>
         {{Form::text('name') }}
         {{$errors->first('name', '<span class="error">:message</span>')}}
     </td>
 </tr>
 <tr>
      <th class="horizontal">
          {{Form::label('birthdate', 'Datum narození')}}
      </th>
      <td>
          {{Form::text('birthdate') }}
          {{$errors->first('birthdate', '<span class="error">:message</span>')}}
      </td>
  </tr>
  <tr>
        <th class="horizontal">
            {{Form::label('city', 'Město*')}}
        </th>
        <td>
            {{Form::text('city') }}
            {{$errors->first('city', '<span class="error">:message</span>')}}
        </td>
    </tr>
  <tr>
     <th class="horizontal">
         {{Form::label('state', 'Země*')}}
     </th>
     <td>
         {{Form::text('state') }}
         {{$errors->first('state', '<span class="error">:message</span>')}}
     </td>
  </tr>
  <tr>
     <th class="horizontal">
         {{Form::label('info', 'Informace')}}
     </th>
     <td>
         {{Form::textarea('info') }}
         {{$errors->first('info', '<span class="error">:message</span>')}}
     </td>
  </tr>
  <tr>
       <th class="horizontal">
           {{Form::label('password', 'Heslo*')}}
       </th>
       <td>
           {{Form::password('password') }}
           {{$errors->first('password', '<span class="error">:message</span>')}}
       </td>
  </tr>
</table>
<p>* tyto informace jsou povinné</p>
{{ Form::submit('Uložit') }}