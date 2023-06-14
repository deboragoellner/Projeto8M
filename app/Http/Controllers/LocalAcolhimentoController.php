<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalAcolhimento;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class LocalAcolhimentoController extends Controller
{
    function index()
    {
        $localacolhimentos = LocalAcolhimento::All();
        // dd($localacolhimentos);

        return view('LocalAcolhimentoList')->with(['localacolhimentos' => $localacolhimentos]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        //dd($categorias);
        return view('LocalAcolhimentoForm')->with(['categorias' => $categorias]);
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
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
        ];

        $imagem = $request->file('imagem');
        $nome_arquivo = '';
        //verifica se o campo imagem foi passado uma imagem
        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

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
        $categorias = Categoria::orderBy('nome')->get();

        return view('LocalAcolhimentoForm')->with([
            'localacolhimento' => $localacolhimento,
            'categorias' => $categorias,
        ]);
    }

    function show($id)
    {
        //select * from LocalAcolhimento where id = $id;
        $localacolhimento = LocalAcolhimento::findOrFail($id);
        //dd($localacolhimento);
        $categorias = Categoria::orderBy('nome')->get();

        return view('LocalAcolhimentoForm')->with([
            'localacolhimento' => $localacolhimento,
            'categorias' => $categorias,
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
            'email' => $request->email,
            'categoria_id' => $request->categoria_id,
        ];

        $imagem = $request->file('imagem');
        //verifica se o campo imagem foi passado uma imagem
        if ($imagem) {
            $nome_arquivo = date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            //salva a imagem em uma pasta
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            //adiciona ao vetor o diretorio do arquivo e o nome
            $dados['imagem'] = $diretorio . $nome_arquivo;
        }

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

        //verifica se existe o arquivo vinculado ao registro e depois remove
        if (Storage::disk('public')->exists($localacolhimento->imagem)) {
            Storage::disk('public')->delete($localacolhimento->imagem);
        }
        $localacolhimento->delete();

        return \redirect('localacolhimento')->with('success', 'Removido com sucesso!');
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
       $localacolhimentos = LocalAcolhimento::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $localacolhimentos = LocalAcolhimento::all();
        }

        //dd($localacolhimentos);
        return view('localacolhimentoList')->with(['localacolhimentos' => $localacolhimentos]);
    }
}


