<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $table = "noticias";

    protected $fillable = [
        'titulo', 'imagem', 'telefone', 'conteudo','informacoes'
    ];

    public static function rules(){
        return  [
            'titulo' => 'required | max: 120',
            'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            'conteudo' => 'required | max: 300',
            'informacoes' => 'required | max: 300',
        ];
    }

    public static function messages(){
        return [
            'titulo.required' => 'O nome é obrigatório',
            'titulo.max' => 'Só é permitido 120 caracteres',
            'conteudo.required' => 'O conteudo é obrigatório',
            'conteudo.max' => 'Só é permitido 300 caracteres',
            'informacoes.required' => 'As informações são obrigatórias',
            'informacoes.max' => 'Só é permitido 300 caracteres',
        ];
    }

}
