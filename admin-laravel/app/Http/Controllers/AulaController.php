<?php

namespace App\Http\Controllers;

use App\Http\Requests\AulaStoreRequest;
use App\Http\Requests\AulaUpdateRequest;
use App\Models\Aula;
use App\Models\Dia;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AulaController extends Controller
{

    public function __construct(){
        if (!Session::has('aulas')) {
            Session::put('aulas', []);
        }
    }


    public function index()
    {
        return view(
            'aula.index',
            [
                'materias' => Aula::addSelect(
                    [
                        'dia'=>Dia::select('descricao')->whereColumn('id', 'aula.id_dia'),
                        'horario'=>Horario::select('hora')->whereColumn('id', 'aula.id_hora')
                    ]
                )->paginate(3),
            ]

        );
    }

    public function create() {
        return view(
            'aula.create',
            [
                'dias' => Dia::all()

            ],
            [
                'horarios' => Horario::all()
            ]

        );
    }

    public function store(AulaStoreRequest $request)
    {
        //dd(request()->foto);

        try {
            $validated = $request->validated();
            $aula = new Aula();
            $aula->descricao = $request->descricao;
            $aula->id_dia = $request->dia;
            $aula->id_hora = $request->horario;
            $aula->idusuario = Auth::user()->id;
            $aula->foto = $request->foto->store('public');
            $aula->save();
            return redirect('aulas')->with('success', 'Aula inserida com sucesso!');
        } catch (\Throwable $th) {
            return redirect('aulas')->with('error', 'Algo deu de errado!');

        }
    }

    protected function getDias() {
        return [
            'Segunda-feira',
            'Terça-feira',
            'Quarta-feira',
            'Quinta-feira',
            'Sexta-feira',
        ];
    }

    protected function getHorarios() {
        return [
            '19:00',
            '21:00'
        ];
    }

    public function edit($id)
    {
        $aula = Aula::findOrFail($id);

        return view(
            'aula.edit',
            [
                'dias' => Dia::all(),
                'horarios' => Horario::all(),
                'aula' => $aula
            ]
        );
    }

    private function findAula($id)
    {
        $index = $this->indexOfAula($id);
        if($this->indexOfAula($id) === -1) {
            return null;
        }

        return Session::get('aulas') [$index];
    }

    private function indexOfAula($id)
    {
        return array_reduce(Session::get('aulas'), function($atual, $item) use ($id){
            return ($item->id == $id) ? array_search($item, Session::get('aulas')) : $atual;
        }, -1);
    }

    public function update ($id, AulaUpdateRequest $request) {

        $validated = $request->validated();
        $aula = Aula::find($id);
        $aula->descricao = $request->descricao;
        $aula->id_dia = $request->dia;
        $aula->id_hora = $request->horario;
        $aula->save();
        return redirect('aulas')->with('success', sprintf('Aula inserida com sucesso!'), $aula->descricao);
    }

    private function updateAula($aula)
    {
        $aulas = Session::get('aulas');
        $index = $this->indexOfAula($aula->id);
        $aulas[$index] = $aula;
        Session::put('aulas', $aulas);
    }

    public function destroy($id)
    {
        $aula = Aula::find($id);
        $aula->delete();

        return redirect('aulas');
    }
}
