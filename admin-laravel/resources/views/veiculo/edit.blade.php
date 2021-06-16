@extends('layout.template')

@section('title', 'Editar Veiculo')
@section('content')

<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Editar Veículo</h3>
    <div class="float-right">
      <a href="veiculo/nova" class="btn btn-primary">Novo Veículo</a>
    </div>
    </div>
    <div class="card-body">

    <div class="clearfix"></div>
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

    <form action="/aulas/{{$veiculo->id}}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="descricao" class="form-label @error('descricao') is-invalid @enderror">Matéria</label>
            <input type="text" value="{{$aula->descricao}}" class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao">
            @error('descricao')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <br>

            <label for="dia" class="form-label @error('dia') is-invalid @enderror">Dia</label>
            <select name="dia" class="form-control @error('dia') is-invalid @enderror" id="dia">
                @foreach($dias as $dia)
                    <option value="{{$dia->id}}" {{ ($dia->id == $aula->id_dia) ? "selected" : ""}}>{{$dia->descricao}}</option>
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
                    <option value="{{$horario->id}}" {{ ($horario->id == $aula->id_hora) ? "selected" : ""}}>{{$horario->hora}}</option>
                @endforeach

                @error('horario')
                <div class="invalid-feedback">
                    {{ $message }}

                </div>
                @enderror
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/aulas" class="btn btn-danger">Cancelar</a>
    </form>
    </div>
  </div>
</div>
@endsection



