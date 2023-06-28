@extends('base.app')

@section('conteudo')
@section('tituloPagina', 'Listagem do Local do Acolhimento')

<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
-->

<div id="mymap"></div>

<!--
<script type="text/javascript">
    var locations = <?php // print_r(json_encode($locations));
    ?>;


    var mymap = new GMaps({
        el: '#mymap',
        lat: 21.170240,
        lng: 72.831061,
        zoom: 6
    });


    $.each(locations, function(index, value) {
        mymap.addMarker({
            lat: value.lat,
            lng: value.lng,
            title: value.city,
            click: function(e) {
                alert('This is ' + value.city + ', gujarat from India.');
            }
        });
    });
</script>

-->
<style>
    #mapa {
        width: 100%;
        height: 10px;
    }
</style>
<div>
    <h1>Listagem do Local do Acolhimento</h1>
    <form action="{{ route('locaisacolhimento.search') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-2">
                <select name="campo" class="form-select">
                    <option value="nome">Nome</option>
                    <option value="latitude">Latitude</option>
                    <option value="longitude">Longitude</option>
                    <option value="telefone">Telefone</option>
                    <option value="endereco">Endereço</option>
                </select>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
            </div>
            <div class="col-6">
                <button class="btn btn-primary" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i> Buscar
                </button>
                <a class="btn btn-success"
                    href='{{ action('App\Http\Controllers\LocalAcolhimentoController@create') }}'><i
                        class="fa-solid fa-plus"></i> Cadastrar</a>
            </div>
        </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @php
                $marcadores = [];

            @endphp
            @foreach ($locaisacolhimento as $item)
                @php
                    $marcadores[] = ['lat' => $item->latitude, 'long' => $item->longitude];
                @endphp
                <tr>
                    <td scope='row'>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->latitude }}</td>
                    <td>{{ $item->longitude }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->endereco }}</td>
                    <td><a href="{{ action('App\Http\Controllers\LocalAcolhimentoController@edit', $item->id) }}"><i
                                class='fa-solid fa-pen-to-square' style='color:orange;'></i>Editar</a></td>
                    <td>
                        <form method="POST"
                            action="{{ action('App\Http\Controllers\LocalAcolhimentoController@destroy', $item->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            @csrf
                            <button type="submit" onclick='return confirm("Deseja Excluir?")' style='all: unset;'><i
                                    class='fa-solid fa-trash' style='color:red;'> Deletar</i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>

    <div class="row">
        <div class="col-12">
            <label class="form-label">Mapa</label><br>
            <x-maps-leaflet id="mapa" leafletVersion='1.9.4' :centerPoint="['lat' => -27.1313921, 'long' => -52.6027439]"
                :zoomLevel="14" :markers="$marcadores">
            </x-maps-leaflet>

        </div>
    </div>

</div>
@endsection
