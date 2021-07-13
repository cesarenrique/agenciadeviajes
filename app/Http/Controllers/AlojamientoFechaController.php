<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
class AlojamientoFechaController extends GeneralController
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
    public function create($alojamiento_id)
    {
      $response1=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/descriptivo');
      $alojamiento=$response1->data;

      $response2=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/hotels');
      $hotel=$response2->data;

      $response3=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id);
      $alojamiento2=$response3->data;

      $response4=$this->consumeAPI('GET','api/temporadas/'.$alojamiento2->TemporadaIdentificador);
      $temporada=$response4->data;

      return view('alojamientoFecha')->with('hotel',$hotel)
      ->with('alojamiento',$alojamiento)
      ->with('temporada',$temporada);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
