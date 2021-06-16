@extends('layouts.app')

@section('title', 'Cores')
@section('content')
@include('flash-message')

<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Listagem de Cores</h3>
    <div class="float-right">
      <a href="cor/nova" class="btn btn-primary">Nova Cor</a>
    </div>
    </div>
    <div class="card-body">
    
    <div class="clearfix"></div>

    <table class="table table-striped  table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cores as $cor)
            <tr>
                <td>{{$cor->id}}</td>
                <td>{{$cor->cor}}</td>
                <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a class="btn btn-success btn-sm" href="cor/{{$cor->id}}/editar">
                        Editar
                      </a>
                      <form action="cor/{{$cor->id}}" method="POST" style="margin-left: 2px;">
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
       </div>
      </div>
    </div>

  @endsection
