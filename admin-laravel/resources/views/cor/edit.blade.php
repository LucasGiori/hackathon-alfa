@extends('layouts.app')

@section('title', 'Editar Cor')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Editar Cores</h3>
    <div class="float-right">
      <a href="cor/nova" class="btn btn-primary">Nova Cor</a>
    </div>
    </div>
    <div class="card-body">
    
    <div class="clearfix"></div>

    <form action="/cor/{{$cor->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="cor" class="form-label @error('cor') is-invalid @enderror">Cor</label>
                    <input type="text" value="{{$cor->cor}}" class="form-control @error('cor') is-invalid @enderror" id="cor" name="cor">
                    @error('cor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>
                </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/cor" class="btn btn-danger">Cancelar</a>
    </form>
    </div>
  </div>
</div>
@endsection



