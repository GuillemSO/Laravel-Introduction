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


@if ($actors->isEmpty())
        <FONT COLOR="red">No se ha encontrado ninguna actor</FONT>
@else
    <div align="center">
            <table border="2">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cumpleaños</th>
                    <th>País</th>
                    <th>Imagen</th>
                </tr>
        
                @foreach ($actors as $actor)
                    <tr style="border: 1px solid black">
                        <td>{{ $actor->name }}</td>
                        <td>{{ $actor->surname }}</td>
                        <td>{{ $actor->birthdate }}</td>
                        <td>{{ $actor->country }}</td>
                        <td><img src={{ $actor->img_url }} style="width: 100px; height: 120px;" /></td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif
</x-app-layout>