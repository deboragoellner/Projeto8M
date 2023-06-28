@extends('base.app')

@section('conteudo')
    @php
        if (!empty($localacolhimento->id)) {
            echo 'teste1';
            $route = route('locaisacolhimento.update', $localacolhimento->id);
        } else {
            echo 'teste2';
            $route = route('locaisacolhimento.store');
        }
    @endphp
@section('tituloPagina', 'Formulário Local Acolhimento')
<h1>Formulário de Local Acolhimento</h1>

<div class="col">
    <div class="row">

        <form action='{{ $route }}' method="POST" enctype="multipart/form-data">
            @csrf
            @if (!empty($localacolhimento->id))
                @method('PUT')
            @endif

            <input type="hidden" name="id"
                value="@if (!empty(old('id'))) {{ old('id') }} @elseif(!empty($localacolhimento->id)) {{ $localacolhimento->id }} @else {{ '' }} @endif" /><br>
            <div class="col-3">
                <label class="form-label">Nome</label><br>
                <input type="text" class="form-control" name="nome"
                    value="@if (!empty(old('nome'))) {{ old('nome') }} @elseif(!empty($localacolhimento->nome)) {{ $localacolhimento->nome }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Latitude</label><br>
                <input type="text" class="form-control" name="latitude"
                    value="@if (!empty(old('latitude'))) {{ old('latitude') }} @elseif(!empty($localacolhimento->latitude)) {{ $localacolhimento->latitude }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Longitude</label><br>
                <input type="text" class="form-control" name="longitude"
                    value="@if (!empty(old('longitude'))) {{ old('longitude') }} @elseif(!empty($localacolhimento->longitude)) {{ $localacolhimento->longitude }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone"
                    value="@if (!empty(old('telefone'))) {{ old('telefone') }} @elseif(!empty($localacolhimento->telefone)) {{ $localacolhimento->telefone }} @else {{ '' }} @endif" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Endereço</label><br>
                <input type="text" class="form-control" name="endereco"
                    value="@if (!empty(old('endereco'))) {{ old('endereco') }} @elseif(!empty($localacolhimento->endereco)) {{ $localacolhimento->endereco }} @else {{ '' }} @endif" /><br>


                <button class="btn btn-success" type="submit">
                    <i class="fa-solid fa-save"></i> Salvar
                </button>
                <a href='{{ route('locaisacolhimento.index') }}' class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left"></i>
                    Voltar</a> <br><br>
        </form>
    </div>
    @if (!empty(old('longitude')) || !empty($locaisacolhimento->longitude))
        {{ old('longitude') }}
        <div class="row">
            <div class="col-6">
                <label class="form-label">Mapa</label><br>
                <x-maps-leaflet leafletVersion='1.9.4' :centerPoint="['lat' => $locaisacolhimento->latitude, 'long' => $locaisacolhimento->longitude]" :zoomLevel="6" :markers="[['lat' => $locaisacolhimento->latitude, 'long' => $locaisacolhimento->longitude]]">
                </x-maps-leaflet>

            </div>
        </div>
    @endif
</div>
</div>
@endsection
