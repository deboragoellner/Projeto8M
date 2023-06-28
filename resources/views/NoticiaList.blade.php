@extends('base.app')

@section('conteudo')
@section('tituloPagina', 'Listagem de Notícias')
<h1>Listagem de Notícias</h1>
<form action="{{ route('noticias.search') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-2">
            <select name="campo" class="form-select">
                <option value="titulo">Titulo</option>
                <option value="conteudo">Conteudo</option>
                <option value="informacoes">Informações</option>
               <!--<option value="imagem">imagem</option>-->
            </select>
        </div>
        <div class="col-4">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor" />
        </div>
        <div class="col-6">
            <button class="btn btn-primary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i> Buscar
            </button>
            <a class="btn btn-success" href='{{ action('App\Http\Controllers\NoticiaController@create') }}'><i
                    class="fa-solid fa-plus"></i> Cadastrar</a>
        </div>
    </div>
</form>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titulo</th>
            <th scope="col">Conteudo</th>
            <th scope="col">Informações</th>
            <th scope="col">Imagem</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($noticias as $item)
            @php
                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.png';
            @endphp
            <tr>
                <td scope='row'>{{ $item->id }}</td>
                <td>{{ $item->titulo }}</td>
                <td>{{ $item->conteudo }}</td>
                <td>{{ $item->informacoes }}</td>
                <td><img src="/storage/{{ $nome_imagem }}" width="100px" class="img-thumbnail" /> </td>
                <td><a href="{{ action('App\Http\Controllers\NoticiaController@edit', $item->id) }}"><i
                            class='fa-solid fa-pen-to-square' style='color:orange;'></i>Editar</a></td>
                <td>
                    <form method="POST"
                        action="{{ action('App\Http\Controllers\NoticiaController@destroy', $item->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" onclick='return confirm("Deseja Excluir?")' style='all: unset;'><i
                                class='fa-solid fa-trash' style='color:red;'>Deletar</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
