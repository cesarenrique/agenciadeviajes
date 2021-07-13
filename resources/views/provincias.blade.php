@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Paises</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        <?php  foreach ( $provincias as $provincia) {
                          ?>
                        <li>
                          <span>
                              <label>{{$provincia->nombre}}</label>
                          </span>
                          <span>
                              <a href="{{ route('provincias.localidads.index', $provincia->identificador)}}"> <i class="fas fa-2x fa-map-marker"></i></a>
                          </span>
                          <span>
                              <a href="{{ route('provincias.hotels.index', $provincia->identificador)}}"> <i class="fas fa-2x fa-hotel"></i></a>
                          </span>
                        </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
