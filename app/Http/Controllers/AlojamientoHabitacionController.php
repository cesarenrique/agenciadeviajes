<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
class AlojamientoHabitacionController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($alojamiento_id)
    {
      $response1=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/descriptivo');
      $alojamiento=$response1->data;

      $response2=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/hotels');
      $hotel=$response2->data;

      $response3=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/habitacions');
      $habitaciones=$response3->data;

      return view('alojamientoHabitaciones')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
      ->with('habitaciones',$habitaciones);
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
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alojamiento_id,$habitacion_id)
    {
      $response1=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/descriptivo');
      $alojamiento=$response1->data;

      $response2=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/hotels');
      $hotel=$response2->data;

      $response3=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/habitacions/'.$habitacion_id);
      $habitacion=$response3->data;

      return view('alojamientoHabitacion')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
      ->with('habitacion',$habitacion);
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
