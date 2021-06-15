@extends('layouts.app')

@section('title', 'Marcas')
@section('content')
@include('flash-message')
<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Listagem de Marca</h3>
    <div class="float-right">
    <a href="marca/nova" class="btn btn-primary">Nova Marca</a>
    </div>
    </div>
    <div class="card-body">
    <div class="clearfix"></div>
  <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th></th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <td>{{$marca->id}}</td>
                <td>{{$marca->marca}}</td>
                <td>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                      <a class="btn btn-success btn-sm" href="marca/{{$marca->id}}/editar">
                        Editar
                      </a>
                      <form action="marca/{{$marca->id}}" method="POST" style="margin-left: 2px;">
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
  

  @endsection
