@extends('layouts.app')

@section('title', 'Salvar Marca')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Cadastrar uma Marca</h3>
    </div>
    <div class="card-body">
    
    <div class="clearfix"></div>
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
                <div id="marcaHelp" class="form-text">Informe um texto descrevendo a marca. Ex: Chery</div>
                @error('marca')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/marca" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
  </div>
</div>
@endsection



