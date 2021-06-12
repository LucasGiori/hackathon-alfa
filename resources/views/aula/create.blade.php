@extends('layouts.app')

@section('title', 'Nova Aula')
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

    <form enctype="multipart/form-data" action="/aulas" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="materia" class="form-label @error('descricao') is-invalid @enderror">Matéria</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" value="{{ old('descricao') }}">
                    @error('descricao')
                        <div class="invalid-feedback">
                            {{ $messages }}
                        </div>
                    @enderror
                    <br>
                    <label for="dia" class="form-label @error('dia') is-invalid @enderror">Dia</label>
                    <select name="dia" class="form-control @error('dia') is-invalid @enderror" id="dia">
                    <option value="">Selecione</option>
                    @foreach($dias as $dia)
                        <option value="{{$dia->id}}" {{($dia->id == old('dia') ? "selected" : "" )}}>{{$dia->descricao}}</option>
                    @endforeach

                    @error('dia')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </select>

                    <br>

                    <label for="horario" class="form-label @error('horario') is-invalid @enderror">Horario</label>
                    <select name="horario" class="form-control @error('horario') is-invalid @enderror" id="horario">
                    <option value="">Selecione</option>
                    @foreach($horarios as $horario)
                        <option value="{{$horario->id}}" {{($horario->id == old('horario') ? "selected" : ""  )}}  >{{$horario->hora}}</option>
                    @endforeach

                    @error('horario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </select>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/aulas" class="btn btn-danger">Cancelar</a>
    </form>
@endsection
    
            
                
