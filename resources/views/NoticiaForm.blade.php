@extends('base.app')

@section('conteudo')
    @php
        if (!empty($noticias->id)) {
            $route = route('noticias.update', $noticias->id);
        } else {
            $route = route('noticias.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Notícias')
<h1>Formulário de Notícias</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($noticias->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($noticias->id)) {{ $noticias->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Titulo</label><br>
                <input type="text" class="form-control" name="titulo"
                    value="@if (!empty(old('titulo'))) {{ old('titulo') }} @elseif(!empty($noticias->titulo)) {{ $noticias->titulo }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Conteudo</label><br>
                <input type="text" class="form-control" name="conteudo"
                    value="@if (!empty(old('conteudo'))) {{ old('conteudo') }} @elseif(!empty($noticias->conteudo)) {{ $noticias->conteudo }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Informações</label><br>
                <input type="text" class="form-control" name="informacoes"
                    value="@if (!empty(old('informacoes'))) {{ old('informacoes') }} @elseif(!empty($noticias->informacoes)) {{ $noticias->informacoes }} @else {{ '' }} @endif" /><br>
            </div>
            @php
                $nome_imagem = !empty($noticias->imagem) ? $noticias->imagem : 'sem_imagem.png';
            @endphp
            <div class="col-6">
                <br>
                <img class="img-thumbnail" src="/storage/{{ $nome_imagem }}" width="300px" />
                <br><br>
                <input type="file" class="form-control" name="imagem" /><br>
            </div>
            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href='{{ route('noticias.index') }}' class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
