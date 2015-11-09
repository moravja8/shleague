<table>
    <tr>
        <th class="horizontal">
            {{Form::label('name', 'Jméno*')}}
        </th>
        <td>
            {{Form::text('name') }}
            {{$errors->first('name', '<span class="error">:message</span>')}}
        </td>
    </tr>
    <tr>
        <th class="horizontal">
            {{Form::label('abbreviation', 'Zkratka*')}}
        </th>
        <td>
            {{Form::text('abbreviation') }}
            {{$errors->first('abbreviation', '<span class="error">:message</span>')}}
        </td>
    </tr>
    <tr>
        <th class="horizontal">
            {{Form::label('description', 'Popis*')}}
        </th>
        <td>
            {{Form::textarea('description') }}
            {{$errors->first('description', '<span class="error">:message</span>')}}
        </td>
    </tr>
    <tr>
        <th class="horizontal"></th>
        <td>
            {{ Form::submit('Uložit hodnoty') }}
        </td>
    </tr>
</table>
    <p>* tyto parametry jsou povinné</p>