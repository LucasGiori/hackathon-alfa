@extends('layout.template')

@section('title', 'Salvar Marca')
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
    <div class="container">
  <div class="card">
    <div class="card-header">
    <h3 class="float-left">Cadastrar um Veículo</h3>
    </div>
    <div class="card-body">

    <div class="clearfix"></div>
        <form enctype="multipart/form-data" action="/veiculo" method="POST">
            @csrf
            <div class="row">
                <div class="col-5">
                    <label for="modelo" class="form-label @error('modelo') is-invalid @enderror">Modelo</label>
                    <input type="text" class="form-control @error('modelo') is-invalid @enderror" id="modelo" name="modelo" value="{{ old('modelo') }}">
                    <div id="veiculoHelp" class="form-text">Informe o modelo do Veiculo. Ex: <strong>Arizzo 6</strong></div>
                    @error('modelo')
                    <div class="invalid-feedback">
                        {{ $messages }}
                    </div>
                    @enderror
                </div>
                <div class="col-2">
                    <label for="anofabricacao" class="form-label @error('anofabricacao') is-invalid @enderror">Ano Fabri.</label>
                    <input type="number" min="1" class="form-control @error('anofabricacao') is-invalid @enderror" id="anofabricacao" name="anofabricacao" value="{{ old('anofabricacao') }}">
                    <div id="veiculoHelp" class="form-text">Ex: <strong>2020</strong></div>
                    @error('anofabricacao')
                    <div class="invalid-feedback">
                        {{ $messages }}
                    </div>
                    @enderror
                </div>
                <div class="col-2">
                    <label for="anomodelo" class="form-label @error('anomodelo') is-invalid @enderror">Ano Modelo</label>
                    <input type="number" min="1" class="form-control @error('anomodelo') is-invalid @enderror" id="anomodelo" name="anomodelo" value="{{ old('anomodelo') }}">
                    <div id="anoModeloHelp" class="form-text">Ex: <strong>2021</strong></div>
                    @error('modelo')
                    <div class="invalid-feedback">
                        {{ $messages }}
                    </div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="valor" class="form-label @error('valor') is-invalid @enderror">Valor</label>
                    <input type="text" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor" onkeyup="formatReal(this.value)" value="{{ old('valor') }}">
                    <div id="veiculoHelp" class="form-text">Informe o valor. Ex: <strong>R$ 100.000,00</strong></div>
                    @error('valor')
                    <div class="invalid-feedback">
                        {{ $messages }}
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
                            <option value="{{$tipo}}" {{($tipo == old('tipo') ? "selected" : ""  )}}  >{{$tipo}}</option>
                        @endforeach

                        @error('tipo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="col-3">
                    <label for="marca" class="form-label @error('marca') is-invalid @enderror">Marca</label>
                    <select name="marca_id" class="form-control @error('marca') is-invalid @enderror" id="marca">
                        <option value="">Selecione</option>
                        @foreach($marcas as $marca)
                            <option value="{{$marca->id}}" {{($marca->id == old('marca') ? "selected" : ""  )}}  >{{$marca->marca}}</option>
                        @endforeach

                        @error('marca')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                </div>
                <div class="col-3">
                    <label for="cor" class="form-label @error('cor') is-invalid @enderror">Cor</label>
                    <select name="cor_id" class="form-control @error('cor') is-invalid @enderror" id="cor">
                        <option value="">Selecione</option>
                        @foreach($cores as $cor)
                            <option value="{{$cor->id}}" {{($cor->id == old('cor') ? "selected" : ""  )}}  >{{$cor->cor}}</option>
                        @endforeach

                        @error('cor')
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
                    <textarea class="form-control @error('opcionais') is-invalid @enderror" id="opcionais" name="opcionais" >{{ old('opcionais') }}</textarea>
{{--                    <input type="text" class="form-control @error('opcionais') is-invalid @enderror" id="opcionais" name="opcionais" value="{{ old('opcionais') }}">--}}
                    <div id="opcionaisHelp" class="form-text">Ex: <strong>- Air Bag, Bancos em Couro</strong></div>
                    @error('opcionais')
                    <div class="invalid-feedback">
                        {{ $messages }}
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



