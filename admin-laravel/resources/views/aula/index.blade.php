@extends('layouts.app')

@section('title', 'Aulas')
@section('content')
@include('flash-message')

  <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Matéria</th>
                <th>Dia</th>
                <th>Horario</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$materia->descricao}}</td>
                <td>{{$materia->dia}}</td>
                <td>{{$materia->horario}}</td>
                <td><img class="img-thumbnail" width="100px" src="{{(Storage::url($materia->foto))}}" alt=""></td>
                <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a class="btn btn-success btn-sm" href="aulas/{{$materia->id}}/editar">
                        Editar
                      </a>
                      <form action="aulas/{{$materia->id}}" method="POST" style="margin-left: 2px;">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm" type="submit">Remover</button>
                      </form>

                  </div>
                </td>
            </tr>
            @endforeach
        </tbody>
  </table>
  {{$materias ?? ''->links()}}
  <a href="aulas/nova" class="btn btn-primary">Nova</a>

  @endsection
