@extends('base.app')

@section('conteudo')
    @php
        if (!empty($locaisacolhimento->id)) {
            $route = route('locaisacolhimento.update', $locaisacolhimento->id);
        } else {
            $route = route('locaisacolhimento.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Local Acolhimento')
<h1>Formulário de Local Acolhimento</h1>

<div class="col">
    <div class="row">
        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($locaisacolhimento->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($locaisacolhimento->id)) {{ $locaisacolhimento->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($locaisacolhimento->nome)) {{ $locaisacolhimento->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Latitude</label><br>
                <input type="text" class="form-control" name="latitude"
                    value="@if (!empty(old('latitude'))) {{ old('latitude') }} @elseif(!empty($locaisacolhimento->latitude)) {{ $locaisacolhimento->latitude }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Longitude</label><br>
                <input type="text" class="form-control" name="longitude"
                    value="@if (!empty(old('longitude'))) {{ old('longitude') }} @elseif(!empty($locaisacolhimento->longitude)) {{ $locaisacolhimento->longitude }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone"
                    value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($locaisacolhimento->telefone)) {{ $locaisacolhimento->telefone }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Endereço</label><br>
                <input type="text" class="form-control" name="endereco"
                    value="@if (!empty(old('endereco'))) {{ old('endereco') }} @elseif(!empty($locaisacolhimento->endereco)) {{ $locaisacolhimento->endereco }} @else {{ '' }} @endif" /><br>


            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href='{{ route('locaisacolhimento.index') }}' class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>
                Voltar</a> <br><br>
        </form>
    </div>
</div>
</div>
@endsection
