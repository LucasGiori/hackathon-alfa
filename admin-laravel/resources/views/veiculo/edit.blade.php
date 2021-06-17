@extends('layout.template')

@section('title', 'Editar Veículo')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Editar Veículo</h3>
    <div class="float-right">
      <a href="/veiculo/nova" class="btn btn-primary">Novo Veículo</a>
    </div>
    </div>
    <div class="card-body">

    <div class="clearfix"></div>
    <form action="/veiculo/{{$veiculo->id}}" method="POST">
                @method('put')
                @csrf
              <div class="row">
                <div class="col-5">
                    <label for="modelo" class="form-label @error('modelo') is-invalid @enderror">Modelo</label>
                    <input type="text" value="{{$veiculo->modelo}}" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" >
                    <div id="modeloHelp" class="form-text">Informe o modelo do Veiculo. Ex: <strong>Arizzo 6</strong></div>
                    @error('modelo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-2">
                    <label for="anofabricacao" class="form-label @error('anofabricacao') is-invalid @enderror">Ano Fabri.</label>
                    <input type="number" min="1" value="{{$veiculo->anofabricacao}}" class="form-control @error('anofabricacao') is-invalid @enderror" id="anofabricacao" name="anofabricacao">
                    <div id="veiculoHelp" class="form-text">Ex: <strong>2020</strong></div>
                    @error('anofabricacao')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-2">
                    <label for="anomodelo" class="form-label @error('anomodelo') is-invalid @enderror">Ano Modelo</label>
                    <input type="number" min="1" value="{{$veiculo->anomodelo}}" class="form-control @error('anomodelo') is-invalid @enderror" id="anomodelo" name="anomodelo">
                    <div id="anoModeloHelp" class="form-text">Ex: <strong>2021</strong></div>
                    @error('anomodelo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="valor" class="form-label @error('valor') is-invalid @enderror">Valor</label>
                    <input type="text"  class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" value="{{number_format($veiculo->valor,2,",",".")}}" onkeyup="formatReal(this.value)">
                    <div id="veiculoHelp" class="form-text">Informe o valor. Ex: <strong>R$ 100.000,00</strong></div>
                    @error('valor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="tipo" class="form-label @error('tipo') is-invalid @enderror">Tipo</label>
                    <select name="tipo" class="form-control @error('tipo') is-invalid @enderror" id="tipo">
                        <option value="">Selecione</option>
                        @foreach(["NOVO","SEMINOVO"] as $tipo)
                            <option value="{{$tipo}}" {{$tipo == $veiculo->tipo ? "selected" : ""  }}>{{$tipo}}</option>
                        @endforeach

                        @error('tipo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="col-3">
                    <label for="marca_id" class="form-label @error('marca') is-invalid @enderror">Marca</label>
                    <select name="marca_id" class="form-control @error('marca') is-invalid @enderror" id="marca_id">
                        <option value="">Selecione</option>
                        @foreach($marcas as $marca)
                        <option value="{{$marca->id}}" {{($marca->id == $veiculo->marca_id) ? "selected" : ""  }}  >{{$marca->marca}}</option>
                        @endforeach

                        @error('marca')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="col-3">
                    <label for="cor_id" class="form-label @error('cor_id') is-invalid @enderror">Cor</label>
                    <select name="cor_id" class="form-control @error('cor_id') is-invalid @enderror" id="cor_id">
                        <option value="">Selecione</option>
                        @foreach($cores as $cor)
                        <option value="{{$cor->id}}" {{($cor->id == $veiculo->cor_id) ? "selected" : ""  }}  >{{$cor->cor}}</option>
                        @endforeach

                        @error('cor_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="col-3">
                    <div class="col">
                        <label for="fotoDestaque" class="form-label">Foto</label>
                        <input class="form-control" type="file" id="fotoDestaque" name="fotoDestaque"required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="opcionais" class="form-label @error('opcionais') is-invalid @enderror">Opcionais</label>
                    <textarea  class="form-control @error('opcionais') is-invalid @enderror" id="opcionais" name="opcionais">{{ $veiculo->opcionais}}</textarea>
                    <div id="opcionaisHelp" class="form-text">Ex: <strong>- Air Bag, Bancos em Couro</strong></div>
                    @error('opcionais')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="/veiculo" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
    </form>
    </div>
  </div>
</div>
<script>
            function formatReal(valor) {
                valor = valor + '';
                valor = parseInt(valor.replace(/[\D]+/g,''));
                valor = valor + '';
                valor = valor.replace(/([0-9]{2})$/g, ",$1");

                if (valor.length > 6) {
                    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                }

                document.getElementById('valor').value = valor;
            }
        </script>
@endsection



