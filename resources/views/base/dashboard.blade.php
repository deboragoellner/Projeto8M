@extends('base.app')
@section('conteudo')
@section('tituloPagina', 'Princípal')

                @php
    $nome_imagem = !empty($dashboard->imagem) ? $dashboard->imagem : 'juntassomosgigante.jpg';
@endphp
<br>
<h2>Selecione opção no cabeçalho</h2>
    <img class="img-thumbnail" src="/storage/{{ $nome_imagem }}" width="2000px" />
<br><br>



@endsection
