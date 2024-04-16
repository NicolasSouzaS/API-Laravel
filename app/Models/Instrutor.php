<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrutor extends Model
{
    use HasFactory;

    protected $fillable = ['nomeInstrutor','fotoInstrutor'];

    public function Regras(){
        return[
            'nomeInstrutor' => 'required|unique:instrutores,nomeInstrutor,'.$this->id.'|min:3',
            // 'fotoAluno' => 'required'
            'fotoInstrutor' => 'required|file|mimes:png,jpg'
        ];
    }

    public function Feedback(){
        return[
            'required' => 'O campo :attribute é obrigatório',
            'fotoInstrutor.mimes' => 'O arquivo deve ser uma imagem PNG ou JPG',
            'nomeInstrutor.unique' => 'O nome do aluno já existe',
            'nomeInstrutor.min' => 'O nome do aluno deve ter mais de 3 caracteres'
            ];
        }

}
