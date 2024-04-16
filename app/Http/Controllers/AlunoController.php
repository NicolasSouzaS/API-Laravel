<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{


    public $aluno;


    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $aluno = Aluno::all();

        return $aluno;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'Presente - Store';
        // dd($request->all());
        // $aluno = Aluno::create($request->all());

        // return $aluno;


         // Para não pegar imagem será apenas isso

         $request->validate($this->aluno->Regras(), $this->aluno->Feedback());

         $imagem = $request->file('fotoAluno');

         $imagem_url = $imagem->store('imagem','public');

         $aluno = $this->aluno->create([
            'nomeAluno' => $request->nomeAluno,
            'fotoAluno' => $imagem_url
         ]);

         return response()->json($aluno, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        return $aluno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // // return 'Update';
        // print_r($request->all()); //Dados novos
        // echo '<hr>';
        // print_r($aluno->getAttributes()); // Dados Antigos

        // $aluno->update($request->all());
        // return $aluno;
        $aluno = $this->aluno->find($id);

        // dd($request->nomeAluno);
        // dd($request->file('fotoAluno'));

         if($aluno === null){
             return response()->json(['erro' => 'Impossível realizar a atualização. O aluno não existe!'], 404);
         }

         if($request->method() === 'PATCH') {
             // return ['teste' => 'PATCH'];

             $dadosDinamico = [];

             foreach ($aluno->Regras() as $input => $regra) {
                 if(array_key_exists($input, $request->all())) {
                     $dadosDinamico[$input] = $regra;
                 }
             }

             // dd($dadosDinamico);

             $request->validate($dadosDinamico, $this->aluno->Feedback());
         }
         else{
             $request->validate($this->aluno->Regras(), $this->aluno->Feedback());
         }

         if($request->file('fotoAluno')){
            Storage::disk('public')->delete($aluno->fotoAluno);
         }



        $imagem = $request->file('fotoAluno');

        $imagem_url = $imagem->store('imagem','public');

        $aluno->update([
           'nomeAluno' => $request->nomeAluno,
           'fotoAluno' => $imagem_url
        ]);



        return response()->json($aluno, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
       Storage::disk('public')->delete($aluno->fotoAluno);
       $aluno->delete();

       return ['msg' => 'O registro foi removido com sucésso'];
    }
}
