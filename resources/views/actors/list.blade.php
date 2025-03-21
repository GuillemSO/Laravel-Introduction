<x-app-layout>
<h1>{{$title}}</h1>
<form method="GET" action="{{route('actors.filterByDecade')}}">
{{csrf_field()}}
        <label for="decade">Década nacimiento</label>
        <select name="decade" id="decade">
            <option value="">-- Selecciona una década --</option>
            <option value="1930">1930-1939</option>
            <option value="1940">1940-1949</option>
            <option value="1950">1950-1959</option>
            <option value="1960">1960-1969</option>
            <option value="1970">1970-1979</option>
            <option value="1980">1980-1989</option>
            <option value="1990">1990-1999</option>
            <option value="2000">2000-2009</option>
            <option value="2010">2010-2019</option>
        </select>
        <button type="submit">Buscar</button>
</form>


@if(empty($actors))
    <FONT COLOR="red">No se ha encontrado ningun actor</FONT>
@else
    <div align="center">
    <table class="table">
        <thead>
            <tr>
            @foreach($actors as $actor)
                @foreach(array_keys($actor) as $key)
                    <th scope="col">{{$key}}</th>
                @endforeach
                @break
            @endforeach
            </tr>
        </thead>
        
        <tbody>
            @foreach($actors as $actor)
            <tr >
                <td scope="col">{{$actor['id']}}</td>
                <td>{{$actor['name']}}</td>
                <td>{{$actor['surname']}}</td>
                <td>{{$actor['birthdate']}}</td>
                <td>{{$actor['country']}}</td>
                <td><img src={{$actor['img_url']}} style="width: 100px; heigth: 120px;" /></td>
                <td>{{$actor['salary']}}</td>
                <td>{{ $actor['created_at'] }}</td>
                <td>{{ $actor['updated_at'] }}</td>
            </tr>
             @endforeach
        </tbody>
        
    </table>
</div>
@endif
</x-app-layout>