<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use App\Http\Requests\StoreInstrutorRequest;
use App\Http\Requests\UpdateInstrutorRequest;

class InstrutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreInstrutorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstrutorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrutor  $instrutor
     * @return \Illuminate\Http\Response
     */
    public function show(Instrutor $instrutor)
    {
        //
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
     * @param  \App\Http\Requests\UpdateInstrutorRequest  $request
     * @param  \App\Models\Instrutor  $instrutor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstrutorRequest $request, Instrutor $instrutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrutor  $instrutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrutor $instrutor)
    {
        //
    }
}
