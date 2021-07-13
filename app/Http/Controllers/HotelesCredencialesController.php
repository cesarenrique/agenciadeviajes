<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Credenciales;

class HotelesCredencialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cuantos=Credenciales::where('tipo','hoteles')->get()->count();
      if($cuantos==0){
        return view('sinCredencialesHoteles');
      }
      $credenciales=Credenciales::where('tipo','hoteles')->first();
      return view('HotelesCredenciales')->with('credenciales',$credenciales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('formularioTokenHoteles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->has('token') && $request->has('url') && $request->has('cliente') && $request->has('accessToken')){

          $campos=$request->all();
          $campos['tipo']="hoteles";
          DB::statement("delete from credenciales where tipo like '%hoteles%'");
          $credenciales=Credenciales::Create($campos);
          return view('HotelesCredenciales')->with('credenciales',$credenciales);
      }
      return view('errorCredenciales');
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
    public function prepare(Request $request)
    {
      if($request->has('token') && $request->has('url') && $request->has('cliente')){

          return view('HotelesCredencialesHecho')->with('token',$request->token)
          ->with('url',$request->url)->with('cliente',$request->cliente);
      }
      return view('errorCredenciales');
    }
}
