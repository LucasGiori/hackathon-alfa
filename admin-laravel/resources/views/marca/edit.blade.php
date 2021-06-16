@extends('layouts.app')

@section('title', 'Editar Marca')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Editar Marca</h3>
    <div class="float-right">
      <a href="/marca" class="btn btn-primary">Nova Marca</a>
    </div>
    </div>
    <div class="card-body">
    
    <div class="clearfix"></div>
    <form action="/marca/{{$marca->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="marca" class="form-label @error('marca') is-invalid @enderror">Marca</label>
                    <input type="text" value="{{$marca->marca}}" class="form-control @error('marca') is-invalid @enderror" id="marca" name="marca">
                    @error('marca')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/marca" class="btn btn-danger">Cancelar</a>
    </form>
    </div>
  </div>
</div>
@endsection



