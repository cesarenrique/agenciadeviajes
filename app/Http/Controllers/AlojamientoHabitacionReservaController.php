<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
use App\Credenciales;

class AlojamientoHabitacionReservaController extends GeneralController
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

        $credenciales=Credenciales::where('tipo','hoteles')->firstOrFail();
        $cantidadLibre=count($libres);
        $cantidadOcupado=count($ocupadas);
        return view('alojamientoHabitacionReserva')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
        ->with('habitacion',$habitacion)->with('ocupadas',$ocupadas)
        ->with('cantidadOcupado',$cantidadOcupado)
        ->with('cantidadLibre',$cantidadLibre)
        ->with('fecha_desde',$request->fecha_desde)
        ->with('fecha_hasta',$request->fecha_hasta)
        ->with('credenciales',$credenciales);
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lookforCliente(Request $request,$alojamiento_id,$habitacion_id)
    {
      if($request->has('fecha_desde') && $request->has('fecha_hasta') && $request->has('NIF')){
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

        $queryArray2=['NIF'=>$request->NIF];
        $response6=$this->consumeAPIQuery('GET','api/clientes/nif',$queryArray2);
        $clientes=$response6->data;

        if(count($clientes)==0){
            return view('alojamientoHabitacionReservaClienteNuevo')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
            ->with('habitacion',$habitacion)->with('ocupadas',$ocupadas)
            ->with('cantidadOcupado',$cantidadOcupado)
            ->with('cantidadLibre',$cantidadLibre)
            ->with('fecha_desde',$request->fecha_desde)
            ->with('fecha_hasta',$request->fecha_hasta);
        }else{
            $client=null;
            foreach($clientes as $cliente){
              $client=$cliente;
            }
            $response7=$this->consumeAPI('GET','api/clientes/'.$client->identificador.'/tarjetas');
            $tarjetas=$response7->data;
            if(count($tarjetas)==0){
              return view('alojamientoHabitacionReservaClienteTarjeta')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
              ->with('habitacion',$habitacion)->with('ocupadas',$ocupadas)
              ->with('cantidadOcupado',$cantidadOcupado)
              ->with('cantidadLibre',$cantidadLibre)
              ->with('fecha_desde',$request->fecha_desde)
              ->with('fecha_hasta',$request->fecha_hasta)
              ->with('cliente',$client);
            }else{
              $tarjet=null;
              foreach($tarjetas as $tarjeta){
                $tarjet=$tarjeta;
              }
              return view('alojamientoHabitacionReservaClienteViejo')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
              ->with('habitacion',$habitacion)->with('ocupadas',$ocupadas)
              ->with('cantidadOcupado',$cantidadOcupado)
              ->with('cantidadLibre',$cantidadLibre)
              ->with('fecha_desde',$request->fecha_desde)
              ->with('fecha_hasta',$request->fecha_hasta)
              ->with('cliente',$client)
              ->with('tarjeta',$tarjet);
            }
        }
      }
      return view('errorConsumeHoteles');
    }



  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function nuevo(Request $request,$alojamiento_id,$habitacion_id)
  {
    if($request->has('fecha_desde') && $request->has('fecha_hasta') && $request->has('NIF')){
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

      if($cantidadOcupado==0){
        $queryArray2=['NIF'=>$request->NIF,'nombre'=>$request->nombre,'email'=>$request->email,'telefono'=>$request->telefono];
        $response6=$this->consumeAPIQuery('POST','api/clientes',$queryArray2);
        $cliente=$response6->data;

        $queryArray3=['numero'=>$request->tarjeta,'Cliente_id'=>$cliente->identificador];
        $response7=$this->consumeAPIQuery('POST','api/tarjetas',$queryArray3);
        $tarjeta=$response7->data;


        $response8=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id);
        $alojamiento2=$response8->data;

        $queryArray4=[
          'fecha_desde'=>$request->fecha_desde,
          'fecha_hasta'=>$request->fecha_hasta,
          'tarjeta'=>$request->tarjeta,
          'Cliente_id'=>$cliente->identificador,
          'Pension_id'=>$alojamiento2->PensionIdentificador,
          'Habitacion_id'=>$habitacion->identificador
        ];
        $response9=$this->consumeAPIQuery('POST','api/reservas/fechas',$queryArray4);
        $reservas=$response9->data;
        $cantidad=count($reservas);
        $totalPagar=$cantidad*$alojamiento->precio;

        return view('ReservasResultado')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
        ->with('habitacion',$habitacion)
        ->with('fecha_desde',$request->fecha_desde)
        ->with('fecha_hasta',$request->fecha_hasta)
        ->with('cliente',$cliente)
        ->with('tarjeta',$tarjeta)
        ->with('totalPagar',$totalPagar);
      }
    }
    return view('errorConsumeHoteles');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function reservar(Request $request,$alojamiento_id,$habitacion_id)
  {
    if($request->has('fecha_desde') && $request->has('fecha_hasta') && $request->has('NIF')){
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

      if($cantidadOcupado==0){

        $response6=$this->consumeAPI('GET','api/clientes/'.$request->Cliente_id);
        $cliente=$response6->data;


        $response7=$this->consumeAPI('GET','api/clientes/'.$cliente->identificador.'/tarjetas/'.$request->Tarjeta_id);
        $tarjeta=$response7->data;


        $response8=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id);
        $alojamiento2=$response8->data;

        $queryArray4=[
          'fecha_desde'=>$request->fecha_desde,
          'fecha_hasta'=>$request->fecha_hasta,
          'tarjeta'=>$request->tarjeta,
          'Cliente_id'=>$cliente->identificador,
          'Pension_id'=>$alojamiento2->PensionIdentificador,
          'Habitacion_id'=>$habitacion->identificador
        ];
        $response9=$this->consumeAPIQuery('POST','api/reservas/fechas',$queryArray4);
        $reservas=$response9->data;
        $cantidad=count($reservas);
        $totalPagar=$cantidad*$alojamiento->precio;

        return view('ReservasResultado')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
        ->with('habitacion',$habitacion)
        ->with('fecha_desde',$request->fecha_desde)
        ->with('fecha_hasta',$request->fecha_hasta)
        ->with('cliente',$cliente)
        ->with('tarjeta',$tarjeta)
        ->with('totalPagar',$totalPagar);
      }
    }
    return view('errorConsumeHoteles');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function tarjeta(Request $request,$alojamiento_id,$habitacion_id)
  {
    if($request->has('fecha_desde') && $request->has('fecha_hasta') && $request->has('NIF')){
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

      if($cantidadOcupado==0){
        $response6=$this->consumeAPI('GET','api/clientes/'.$request->Cliente_id);
        $cliente=$response6->data;

        $queryArray3=['numero'=>$request->tarjeta,'Cliente_id'=>$cliente->identificador];
        $response7=$this->consumeAPIQuery('POST','api/tarjetas',$queryArray3);
        $tarjeta=$response7->data;


        $response8=$this->consumeAPI('GET','api/alojamientos/'.$alojamiento_id);
        $alojamiento2=$response8->data;

        $queryArray4=[
          'fecha_desde'=>$request->fecha_desde,
          'fecha_hasta'=>$request->fecha_hasta,
          'tarjeta'=>$request->tarjeta,
          'Cliente_id'=>$cliente->identificador,
          'Pension_id'=>$alojamiento2->PensionIdentificador,
          'Habitacion_id'=>$habitacion->identificador
        ];
        $response9=$this->consumeAPIQuery('POST','api/reservas/fechas',$queryArray4);
        $reservas=$response9->data;
        $cantidad=count($reservas);
        $totalPagar=$cantidad*$alojamiento->precio;

        return view('ReservasResultado')->with('hotel',$hotel)->with('alojamiento',$alojamiento)
        ->with('habitacion',$habitacion)
        ->with('fecha_desde',$request->fecha_desde)
        ->with('fecha_hasta',$request->fecha_hasta)
        ->with('cliente',$cliente)
        ->with('tarjeta',$tarjeta)
        ->with('totalPagar',$totalPagar);
      }
    }
    return view('errorConsumeHoteles');
  }



}
