<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalAcolhimento extends Model
{
    use HasFactory;
    protected $table = "locais_acolhimento";

    protected $fillable = [
        'nome', 'telefone', 'latitude', 'longitude', 'endereco'
    ];

    public static function rules(){
        return  [
            'nome' => 'required | max: 120',
            'telefone' => 'required | max: 20',
            'latitude' => 'required | max: 20',
            'longitude' => 'required | max: 20',
            'endereco' => 'required | max: 300',
        ];
    }

    public static function messages(){
        return [
            'nome.required' => 'O nome é obrigatório',
            'nome.max' => 'Só é permitido 120 caracteres',
            'telefone.required' => 'O telefone é obrigatório',
            'telefone.max' => 'Só é permitido 20 caracteres',
            'latitude.required' => 'A latitude é obrigatória',
            'latitude.max' => 'Só é permitido 20 caracteres',
            'longitude.required' => 'A longitude é obrigatória',
            'longitude.max' => 'Só é permitido 20 caracteres',
            'endereco.required' => 'O endereco é obrigatório',
            'endereco.max' => 'Só é permitido 300 caracteres',
        ];
    }

}
