<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoStoreRequest;
use App\Http\Requests\VeiculoUpdateRequest;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Illuminate\Events\queueable;

class VeiculoController extends Controller
{
    public function index()
    {
        return view(
            'veiculo.index',
            [
                'veiculos' => Veiculo::all()
            ]
        );
    }

    public function create() {
        return view(
        'veiculo.create',
            [
                'cores' => Cor::all()

            ],
            [
                'marcas' => Marca::all()
            ]
        );
    }

    public function edit($id)
    {
        $veiculo = Veiculo::findOrFail($id);

        return view('veiculo.edit', ['veiculo' => $veiculo]);
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);
        $veiculo->delete();

        return redirect('veiculo');
    }

    public function update ($id, VeiculoUpdateRequest $request)
    {
        try {
            $validated = $request->validated();
            $veiculo = Veiculo::find($id);
            $this->populatingModel($veiculo, $request)->save();

            return redirect('veiculo')->with('success', 'Veiculo atualizada com sucesso');
        }catch (\Throwable $th) {
            return redirect('veiculo')->with('error', 'Algo deu de errado!');
        }
    }

    public function store(VeiculoStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $veiculo = new Veiculo();
            $this->populatingModel($veiculo,$request)->save();

            return redirect('veiculo')->with('success', 'Veiculo cadastrada com sucesso!');
        } catch (\Throwable $th) {
            return redirect('veiculo')->with('error', sprintf('Algo deu de errado! Error: %s', $th->getMessage()));
        }
    }

    public function populatingModel(Veiculo $veiculo, Request $request): Veiculo
    {
        $valor = str_replace('.',"",$request->valor);

        $veiculo->modelo = $request->modelo;
        $veiculo->anomodelo = $request->anomodelo;
        $veiculo->anofabricacao = $request->anofabricacao;
        $veiculo->valor = str_replace(',',".",$valor);;
        $veiculo->tipo = $request->tipo;
        $veiculo->opcionais = $request->opcionais;
        $veiculo->marca_id = $request->marca_id;
        $veiculo->cor_id = $request->cor_id;
        $veiculo->usuario_id = Auth::user()->id;
        $veiculo->fotoDestaque = $request->fotoDestaque->store('public');

        return $veiculo;
    }
}
