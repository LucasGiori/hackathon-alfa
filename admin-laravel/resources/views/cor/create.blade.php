@extends('layouts.app')

@section('title', 'Salvar Cor')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Cadastrar uma Cor</h3>
    
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
        <form enctype="multipart/form-data" action="/cor" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cor" class="form-label @error('cor') is-invalid @enderror">Cor</label>
                <input type="text" class="form-control @error('cor') is-invalid @enderror" id="cor" name="cor" value="{{ old('cor') }}">
                <div id="corHelp" class="form-text">Informe um texto descrevendo a cor. Ex: Amarelo</div>
                @error('cor')
                <div class="invalid-feedback">
                    {{ $messages }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="/cor" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
  </div>
</div>
@endsection



