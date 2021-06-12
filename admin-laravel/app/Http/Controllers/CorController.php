<?php

namespace App\Http\Controllers;

use App\Http\Requests\CorStoreRequest;
use App\Http\Requests\CorUpdateRequest;
use App\Models\Cor;

class CorController extends Controller
{
    public function index()
    {
        return view(
            'cor.index',
            [
                'cores' => Cor::all()
            ]
        );
    }

    public function create() {
        return view('cor.create');
    }

    public function edit($id)
    {
        $cor = Cor::findOrFail($id);

        return view('cor.edit', ['cor' => $cor]);
    }

    public function destroy($id)
    {
        $cor = Cor::findOrFail($id);
        $cor->delete();

        return redirect('cor');
    }

    public function update ($id, CorUpdateRequest $request)
    {
        try {
            $validated = $request->validated();
            $cor = Cor::find($id);
            $cor->cor = $request->cor;

            $cor->save();
            return redirect('cor')->with('success', 'Cor atualizada com sucesso');
        }catch (\Throwable $th) {
            return redirect('cor')->with('error', 'Algo deu de errado!');
        }
    }

    public function store(CorStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $cor = new Cor();
            $cor->cor = $request->cor;

            $cor->save();
            return redirect('cor')->with('success', 'Cor cadastrada com sucesso!');
        } catch (\Throwable $th) {
            return redirect('cor')->with('error', 'Algo deu de errado!');
        }
    }
}
