<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    function index()
    {
        $noticias = Noticia::All();
        // dd($noticias);

        return view('NoticiaList')->with(['noticias' => $noticias]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        //dd($categorias);
        return view('NoticiaForm')->with(['categorias' => $categorias]);
    }

    function store(Request $request)
    {
        $request->validate(
            Noticia::rules(),
            Noticia::messages()
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
        Noticia::create($dados);

        return \redirect('noticia')->with('success', 'Cadastrado com sucesso!');
    }

    function edit($id)
    {
        //select * from Noticia where id = $id;
        $Noticia = Noticia::findOrFail($id);
        //dd($Noticia);
        $categorias = Categoria::orderBy('nome')->get();

        return view('NoticiaForm')->with([
            'Noticia' => $Noticia,
            'categorias' => $categorias,
        ]);
    }

    function show($id)
    {
        //select * from Noticia where id = $id;
        $Noticia = Noticia::findOrFail($id);
        //dd($Noticia);
        $categorias = Categoria::orderBy('nome')->get();

        return view('NoticiaForm')->with([
            'Noticia' => $Noticia,
            'categorias' => $categorias,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            Noticia::rules(),
            Noticia::messages()
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
        Noticia::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect('Noticia')->with('success', 'Atualizado com sucesso!');
    }

    function destroy($id)
    {
        $Noticia = Noticia::findOrFail($id);

        //verifica se existe o arquivo vinculado ao registro e depois remove
        if (Storage::disk('public')->exists($Noticia->imagem)) {
            Storage::disk('public')->delete($Noticia->imagem);
        }
        $Noticia->delete();

        return \redirect('Noticia')->with('success', 'Removido com sucesso!');
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $noticias = Noticia::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $noticias = Noticia::all();
        }

        //dd($noticias);
        return view('NoticiaList')->with(['Noticias' => $noticias]);
    }
}


