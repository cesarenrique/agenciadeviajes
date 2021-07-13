@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$hotel->nombre}}</div>

                <div class="card-body">
                  <div>
                    <span>
                      <label>Localidad:</label>
                    </span>
                    <span>
                      <a href="{{route('localidads.hotels.index',$hotel->LocalidadIdentificador)}}">{{$localidad->nombre}}</a>
                    </span>
                  </div>
                  <div>
                    <span>
                      <label>Alojamiento:</label>
                    </span>
                    <span>
                      <a href="{{route('hotels.alojamientos.index',$hotel->LocalidadIdentificador)}}">Comprobar Tabla Alojamiento</a>
                    </span>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
