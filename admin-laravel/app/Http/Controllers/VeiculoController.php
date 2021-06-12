<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoStoreRequest;
use App\Http\Requests\VeiculoUpdateRequest;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('veiculo.create');
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
            $veiculo->veiculo = $request->veiculo;

            $veiculo->save();
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
            $veiculo->modelo = $request->modeelo;
            $veiculo->anomodelo = $request->anomodelo;
            $veiculo->anofabricacao = $request->anofabricacao;
            $veiculo->valor = $request->valor;
            $veiculo->tipo = $request->tipo;
            $veiculo->opcionais = $request->opcionais;
            $veiculo->marca_id = $request->marca;
            $veiculo->cor_id = $request->cor;
            $veiculo->usuario_id = Auth::user()->id;
            $veiculo->fotoDestaque = $request->foto->store('public');

            $veiculo->save();
            return redirect('veiculo')->with('success', 'Veiculo cadastrada com sucesso!');
        } catch (\Throwable $th) {
            return redirect('veiculo')->with('error', 'Algo deu de errado!');
        }
    }
}
