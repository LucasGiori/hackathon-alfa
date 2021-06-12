<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaStoreRequest;
use App\Http\Requests\MarcaUpdateRequest;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        return view(
            'marca.index',
            [
                'marcas' => Marca::all()
            ]
        );
    }

    public function create() {
        return view('marca.create');
    }

    public function edit($id)
    {
        $marca = Marca::findOrFail($id);

        return view('marca.edit', ['marca' => $marca]);
    }

    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();

        return redirect('marca');
    }

    public function update ($id, MarcaUpdateRequest $request)
    {
        try {
            $validated = $request->validated();
            $marca = Marca::find($id);
            $marca->marca = $request->marca;

            $marca->save();
            return redirect('marca')->with('success', 'Marca atualizada com sucesso');
        }catch (\Throwable $th) {
            return redirect('marca')->with('error', 'Algo deu de errado!');
        }
    }

    public function store(MarcaStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $marca = new Marca();
            $marca->marca = $request->marca;

            $marca->save();
            return redirect('marca')->with('success', 'Marca cadastrada com sucesso!');
        } catch (\Throwable $th) {
            return redirect('marca')->with('error', 'Algo deu de errado!');
        }
    }
}
