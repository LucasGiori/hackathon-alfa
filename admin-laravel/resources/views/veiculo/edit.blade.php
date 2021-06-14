@extends('layouts.app')

@section('title', 'Editar Marca')
@section('content')
    <form action="/marca/{{$marca->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="marca" class="form-label @error('marca') is-invalid @enderror">Matéria</label>
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
@endsection



