<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    function index()
    {
        $usuarios = Usuario::All();
        // dd($usuarios);

        return view('UsuarioList')->with(['usuarios' => $usuarios]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        //dd($categorias);
        return view('UsuarioForm')->with(['categorias' => $categorias]);
    }

    function store(Request $request)
    {
        $request->validate(
            Usuario::rules(),
            Usuario::messages()
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
        Usuario::create($dados);

        return \redirect('usuario')->with('success', 'Cadastrado com sucesso!');
    }

    function edit($id)
    {
        //select * from usuario where id = $id;
        $usuario = Usuario::findOrFail($id);
        //dd($usuario);
        $categorias = Categoria::orderBy('nome')->get();

        return view('UsuarioForm')->with([
            'usuario' => $usuario,
            'categorias' => $categorias,
        ]);
    }

    function show($id)
    {
        //select * from usuario where id = $id;
        $usuario = Usuario::findOrFail($id);
        //dd($usuario);
        $categorias = Categoria::orderBy('nome')->get();

        return view('UsuarioForm')->with([
            'usuario' => $usuario,
            'categorias' => $categorias,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            Usuario::rules(),
            Usuario::messages()
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
        Usuario::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return \redirect('usuario')->with('success', 'Atualizado com sucesso!');
    }

    function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);

        //verifica se existe o arquivo vinculado ao registro e depois remove
        if (!empty($usuario->imagem) && Storage::disk('public')->exists($usuario->imagem)) {
            Storage::disk('public')->delete($usuario->imagem);
        }
        $usuario->delete();

        return \redirect('usuario')->with('success', 'Removido com sucesso!');
    }

    function search(Request $request)
    {
        $campo = $request->campo;

        if ($campo) {
            $usuarios = Usuario::where(
                $campo,
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $usuarios = Usuario::all();
        }

        //dd($usuarios);
        return view('UsuarioList')->with(['usuarios' => $usuarios]);
    }
}
