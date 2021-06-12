@extends('layouts.app')

@section('title', 'Salvar Marca')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form enctype="multipart/form-data" action="/marca" method="POST">
            @csrf
            <div class="mb-3">
                <label for="marca" class="form-label @error('marca') is-invalid @enderror">marca</label>
                <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca" value="{{ old('marca') }}">
                <div id="marcaHelp" class="form-text">Informe um texto descrevendo a marca. Ex: Amarelo</div>
                @error('marca')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/marca" class="btn btn-danger">Cancelar</a>
        </form>
@endsection



