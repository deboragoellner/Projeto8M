<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
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
        return view('NoticiaForm');
    }

    function store(Request $request)
    {
        $request->validate(
            Noticia::rules(),
            Noticia::messages()
        );

        //adiciono os dados do formulário ao vetor
        $dados = [
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'informacoes' => $request->informacoes,
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
        //dd($noticia);

        return view('NoticiaForm')->with([
            'noticia' => $noticia,
        ]);
    }

    function show($id)
    {
        //select * from Noticia where id = $id;
        $noticia = Noticia::findOrFail($id);
        //dd($noticia);

        return view('NoticiaForm')->with([
            'noticia' => $noticia,
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
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'informacoes' => $request->informacoes,
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
        $noticia = Noticia::findOrFail($id);

        $noticia->delete();

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
        return view('NoticiaList')->with(['noticias' => $noticias]);
    }
}


