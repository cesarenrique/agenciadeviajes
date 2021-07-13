<script type="application/javascript">
    $( document ).ready(function() {
      var url = '{{$credenciales->url}}'+'api/clientes/nif?';

      let nif= document.getElementById("NIF");


      let buscar= document.getElementById("buscar");
      buscar.addEventListener('click', e =>{
        e.preventDefault();
        let params = {
          "NIF": nif.value
        };

        let query = Object.keys(params)
                     .map(k => encodeURIComponent(k) + '=' + encodeURIComponent(params[k]))
                     .join('&');
        let url2=url+ query;
        fetch(url2,{
          method: 'GET',
          headers: {
            'Authorization': 'Bearer {{$credenciales->accessToken}}',
          },
        }).then(response =>{
          return response.json();
        }).then(data=>{

          $('#colocar').innerHTML=

          <h3>Datos del Cliente</h3>

          <form method="POST" >
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group row">
                <label for="NIF2" class="col-md-4 col-form-label text-md-right">NIF</label>

                <div class="col-md-6">
                   <input id="NIF2" type="text"  class="form-control" name="NIF2" value="'+ data.nif+'" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                    <input id="nombre" type="text"  class="form-control" name="nombre" required/>
                </div>
            </div>


            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                    <input id="email" type="text"  class="form-control" name="email" required/>


                </div>
            </div>
            <div class="form-group row">
                <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                <div class="col-md-6">
                    <input id="telefono" type="text"  class="form-control" name="telefono" required/>


                </div>
            </div>
            <div class="form-group row">
                <label for="tarjeta" class="col-md-4 col-form-label text-md-right">Tarjeta</label>

                <div class="col-md-6">
                    <input id="tarjeta" type="text"  class="form-control" name="tarjeta" required/>


                </div>
            </div>
            <div id="crear" class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Crear
                    </button>
                </div>
            </div>
          </form>


        })
      });

    });

</script>
