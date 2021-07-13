<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
class AlojamientoHabitacionFechaController extends GeneralController
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request,$alojamiento_id,$habitacion_id)
     {
       if($request->has('fecha_desde') && $request->has('fecha_hasta')){
         $response1=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/descriptivo');
         $alojamiento=$response1->data;

         $response2=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/hotels');
         $hotel=$response2->data;

         $response3=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id.'/habitacions/'.$habitacion_id);
         $habitacion=$response3->data;

         $queryArray=['fecha_desde'=>$request->fecha_desde,'fecha_hasta'=>$request->fecha_hasta];

         $response4=$this->consumeAPIQuery('GET','api/habitacions/'.$habitacion->identificador.'/fechas/libre',$queryArray);
         $libres=$response4->data;

         $response5=$this->consumeAPIQuery('GET','api/habitacions/'.$habitacion->identificador.'/fechas/ocupado',$queryArray);
         $ocupadas=$response5->data;

         $cantidadLibre=count($libres);
         $cantidadOcupado=count($ocupadas);
         return view('alojamientoHabitacionFecha')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
         ->with('habitacion',$habitacion)->with('ocupadas',$ocupadas)
         ->with('cantidadOcupado',$cantidadOcupado)
         ->with('cantidadLibre',$cantidadLibre)
         ->with('fecha_desde',$request->fecha_desde)
         ->with('fecha_hasta',$request->fecha_hasta);
       }
       return view('errorConsumeHoteles');
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
