@extends('layouts.app')

@section('title', 'Marcas')
@section('content')
@include('flash-message')

  <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Modelo</th>
                <th scope="col">Ano Modelo</th>
                <th scope="col">Ano Fabricação</th>
                <th scope="col">Valor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opcionais</th>
                <th scope="col">Marca</th>
                <th scope="col">Cor</th>
                <th scope="col">Usuário</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($veiculos as $veiculo)
            <tr>
                <td>{{$veiculo->id}}</td>
                <td>{{$veiculo->anomodelo}}</td>
                <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a class="btn btn-success btn-sm" href="veiculo/{{$veiculo->id}}/editar">
                        Editar
                      </a>
                      <form action="veiculo/{{$veiculo->id}}" method="POST" style="margin-left: 2px;">
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
  <a href="veiculo/nova" class="btn btn-primary">Nova</a>

  @endsection
