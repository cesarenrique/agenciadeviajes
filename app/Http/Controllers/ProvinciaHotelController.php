<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GeneralController;
class ProvinciaHotelController extends GeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provincia_id)
    {
      $response1=$this->consumeAPI('GET','api/provincias/'.$provincia_id);
      $provincia=$response1->data;
      $links=$provincia->links;
      $hotelesURL=$links[1]->href;
      $response2=$this->consumeAPIURL($hotelesURL);
      $hoteles=$response2->data;

      return view("hoteles")->with('hoteles',$hoteles);
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
