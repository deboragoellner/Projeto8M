<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalAcolhimento;
use Illuminate\Support\Facades\Storage;

class LocalAcolhimentoController extends Controller
{
    function index()
    {
        $locaisacolhimento = LocalAcolhimento::All();
        // dd($locaisacolhimento);

        return view('LocalAcolhimentoList')->with(['locaisacolhimento' => $locaisacolhimento]);
    }

    function create()
    {
        return view('LocalAcolhimentoForm');
    }

    function store(Request $request)
    {
        $request->validate(
            LocalAcolhimento::rules(),
            LocalAcolhimento::messages()
        );

        //adiciono os dados do formulário ao vetor
        $dados = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'endereco' => $request->endereco,
        ];

        //dd( $request->nome);
        //passa o vetor com os dados do formulário como parametro para ser salvo
        LocalAcolhimento::create($dados);

        return \redirect('localacolhimento')->with('success', 'Cadastrado com sucesso!');
    }

    function edit($id)
    {
        //select * from LocalAcolhimento where id = $id;
        $localacolhimento = LocalAcolhimento::findOrFail($id);
        //dd($localacolhimento);

        return view('LocalAcolhimentoForm')->with([
            'localacolhimento' => $localacolhimento,
        ]);
    }

    function show($id)
    {
        //select * from LocalAcolhimento where id = $id;
        $localacolhimento = LocalAcolhimento::findOrFail($id);
        //dd($localacolhimento);;

        return view('LocalAcolhimentoForm')->with([
            'localacolhimento' => $localacolhimento,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            LocalAcolhimento::rules(),
            LocalAcolhimento::messages()
        );

        //adiciono os dados do formulário ao vetor
        $dados =  [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'endereco' => $request->endereco,
        ];

        //metodo para atualizar passando o vetor com os dados do form e o id
        LocalAcolhimento::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect('localacolhimento')->with('success', 'Atualizado com sucesso!');
    }

    function destroy($id)
    {
        $localacolhimento = LocalAcolhimento::findOrFail($id);

        $localacolhimento->delete();

        return \redirect('localacolhimento')->with('success', 'Removido com sucesso!');
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
       $locaisacolhimento = LocalAcolhimento::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $locaisacolhimento = LocalAcolhimento::all();
        }

        //dd($locaisacolhimento);
        return view('localacolhimentoList')->with(['locaisacolhimento' => $locaisacolhimento]);
    }
}


