@extends('base.app')

@section('conteudo')
@section('tituloPagina', 'Listagem do Local do Acolhimento')
<h1>Listagem do Local do Acolhimento</h1>
<form action="{{ route('localacolhimento.search') }}" method="post">
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
            <a class="btn btn-success" href='{{ action('App\Http\Controllers\LocalAcolhimentoController@create') }}'><i
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
       <!-- foreach ($locaisacolhimento as $item)
            php
                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.png';
            endphp-->
            <tr>
                <td scope='row'>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->latitude }}</td>
                <td>{{ $item->longitude }}</td>
                <td>{{ $item->telefone }}</td>
                <td>{{ $item->endereco }}</td>
                <td><a href="{{ action('App\Http\Controllers\LocalAcolhimentoController@edit', $item->id) }}"><i
                            class='fa-solid fa-pen-to-square' style='color:orange;'></i></a></td>
                <td>
                    <form method="POST"
                        action="{{ action('App\Http\Controllers\LocalAcolhimentoController@destroy', $item->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" onclick='return confirm("Deseja Excluir?")' style='all: unset;'><i
                                class='fa-solid fa-trash' style='color:red;'></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
