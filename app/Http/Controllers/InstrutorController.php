<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstrutorController extends Controller
{

    public $instrutor;

    public function __construct(Instrutor $instrutor){
        $this->instrutor = $instrutor;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instrutor = Instrutor::all();

        return $instrutor;
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
        // return 'Presente';

        $request->validate($this->instrutor->Regras(), $this->instrutor->Feedback());

        $imagem = $request->file('fotoInstrutor');

         $imagem_url = $imagem->store('imagem','public');

         $instrutor = $this->instrutor->create([
            'nomeInstrutor' => $request->nomeInstrutor,
            'fotoInstrutor' => $imagem_url
         ]);

         return response()->json($instrutor, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrutor  $instrutor
     * @return \Illuminate\Http\Response
     */
    public function show(Instrutor $instrutor)
    {
        return $instrutor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instrutor  $instrutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrutor $instrutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instrutor  $instrutor
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
        $instrutor = $this->instrutor->find($id);

        // dd($request->nomeAluno);
        // dd($request->file('fotoAluno'));

         if($instrutor === null){
             return response()->json(['erro' => 'Impossível realizar a atualização. O instrutor não existe!'], 404);
         }

         if($request->method() === 'PATCH') {
             // return ['teste' => 'PATCH'];

             $dadosDinamico = [];

             foreach ($instrutor->Regras() as $input => $regra) {
                 if(array_key_exists($input, $request->all())) {
                     $dadosDinamico[$input] = $regra;
                 }
             }

             // dd($dadosDinamico);

             $request->validate($dadosDinamico, $this->instrutor->Feedback());
         }
         else{
             $request->validate($this->instrutor->Regras(), $this->instrutor->Feedback());
         }

         if($request->file('fotoInstrutor')){
            Storage::disk('public')->delete($instrutor->fotoInstrutor);
         }



        $imagem = $request->file('fotoInstrutor');

        $imagem_url = $imagem->store('imagem','public');

        $instrutor->update([
           'nomeInstrutor' => $request->nomeInstrutor,
           'fotoInstrutor' => $imagem_url
        ]);



        return response()->json($instrutor, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrutor  $instrutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrutor $instrutor)
    {
       Storage::disk('public')->delete($instrutor->fotoInstrutor);
       $instrutor->delete();

       return ['msg' => 'O registro foi removido com sucésso'];
    }
}
