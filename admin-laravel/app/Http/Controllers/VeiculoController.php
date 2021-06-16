<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculoStoreRequest;
use App\Http\Requests\VeiculoUpdateRequest;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
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
                'veiculos' => Veiculo::addSelect(
                    [
                        'cor'=> Cor::select('cor')->whereColumn('id', 'veiculo.cor_id'),
                        'marca'=> Marca::select('marca')->whereColumn('id', 'veiculo.marca_id')
                    ]
                )->paginate(3),
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

            return redirect('veiculo')->with('success', 'Veiculo cadastrado com sucesso!');
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

    public function getById(int $id)
    {
        $veiculo = Veiculo::findOrFail($id);

        return response()->json($this->getVeiculo($veiculo));
    }

    public function findAll()
    {
        $veiculo = Veiculo::all();

        return response()->json($this->getVeiculo($veiculo));
    }

    public function findUsed()
    {
        $veiculo = Veiculo::where('tipo','SEMINOVO')->get();

        return response()->json($this->getVeiculo($veiculo));
    }

    public function findNew()
    {
        $veiculo = Veiculo::where('tipo','NOVO')->get();

        return response()->json($this->getVeiculo($veiculo));
    }

    private function generateLinkPublicImage(string $linkInternal)
    {
        $filename = str_replace('public/','',$linkInternal);

        return asset(sprintf('storage/%s',$filename));
    }

    private function getVeiculo($data)
    {
        if($data instanceof Collection) {
            return $data->map(function ($veiculo) {

                $data = $veiculo->toArray();
                $data["fotoDestaque"] = $this->generateLinkPublicImage($veiculo["fotoDestaque"]);
                $data["cor"] = Cor::find($veiculo->cor_id)->toArray();
                $data["marca"] = Marca::find($veiculo->marca_id)->toArray();

                return $data;
            });
        }

        $veiculo = $data->toArray();
        $veiculo["fotoDestaque"] = $this->generateLinkPublicImage($veiculo["fotoDestaque"]);
        $veiculo["cor"] = Cor::find($data->cor_id)->toArray();
        $veiculo["marca"] = Marca::find($data->marca_id)->toArray();

        return $veiculo;
    }
}
