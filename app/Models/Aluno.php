<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = ['nomeAluno','fotoAluno'];

    public function Regras(){
        return[
            'nomeAluno' => 'required|unique:alunos,nomeAluno,'.$this->id.'|min:3',
            // 'fotoAluno' => 'required'
            'fotoAluno' => 'required|file|mimes:png,jpg'
        ];
    }

    public function Feedback(){
        return[
            'required' => 'O campo :attribute é obrigatório',
            'fotoAluno.mimes' => 'O arquivo deve ser uma imagem PNG ou JPG',
            'nomeAluno.unique' => 'O nome do aluno já existe',
            'nomeAluno.min' => 'O nome do aluno deve ter mais de 3 caracteres'
            ];
        }

}
