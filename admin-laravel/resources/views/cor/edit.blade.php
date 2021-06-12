@extends('layouts.app')

@section('title', 'Editar Cor')
@section('content')
    <form action="/cor/{{$cor->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="cor" class="form-label @error('cor') is-invalid @enderror">Matéria</label>
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
@endsection



