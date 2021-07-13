@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Crear Access Token</div>

              <div class="card-body">
                <form method="POST" action="{{ route('HotelesCredenciales.prepare') }}">
                    @csrf


                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label text-md-right">My URL</label>

                        <div class="col-md-6">
                            <input id="url" type="text" class="form-control" name="url" required>


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="token" class="col-md-4 col-form-label text-md-right">Token</label>

                        <div class="col-md-6">
                            <input id="token" type="text" class="form-control" name="token" required>
                        </div>
                    </div>


                    <input id="tipo" type="hidden" class="form-control" name="tipo" value="hoteles">


                    <div class="form-group row">
                        <label for="cliente" class="col-md-4 col-form-label text-md-right">Cliente</label>

                        <div class="col-md-6">
                            <input id="cliente" type="number" class="form-control" name="cliente" required>


                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Enviar
                            </button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
