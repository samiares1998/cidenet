@extends('layouts.index')

@section('content')

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

<div class="card-body">
    <div class="content">
        <a href="#" type="button" class="btn btn-primary " data-toggle="modal" data-target="#empleados">Agregar Empleados</a>
        
        
<div class="modal fade bd-example-modal-lg" id="empleados" tabindex="-1" role="dialog" aria-labelledby="empleados" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Empleados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'uno')">Datos 1</button>
  <button class="tablinks" onclick="openCity(event, 'dos')">Datos 2</button>

</div>
<div id="uno" class="tabcontent" style="display:block">
                
<div class="row">
        <div class="col-12 col-md-6">
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('add_empleado')}}">
      {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" maxlength="20" onkeypress="return check2(event)" placeholder="Primer Apellido" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido"  class="form-control" maxlength="20" onkeypress="return check(event)" placeholder="Segundo Apellido" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" maxlength="20" onkeypress="return check(event)" placeholder="Primer Nombre" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Otros Nombres</label>
                    <input type="text" name="otros" class="form-control" maxlength="50" onkeypress="return check(event)" placeholder="Otros Nombres" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" >
                  </div>
                  
               
                </div>
        </div>
        <div class="col-12 col-md-6">
        <div class="card-body">
        <div class="form-group">
                    <label for="exampleInputEmail1">Pais del Empleo</label>
                    <select class="form-control" name="pais" id="pais" required>
                    <option >Seleccione</option> 
                    <option value="Colombia">Colombia</option> 
                    <option value="EEUU">EEUU</option> 
                    
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Identificacion</label>
                    <select class="form-control" name="identificacion" required>
                    <option >Seleccione</option> 
                    <option value="CC">Cedula de Ciudadania</option> 
                    <option value="CE">Cedula de Extranjeria</option>
                    <option value="PS">Pasaporte</option>
                    <option value="PE">Permiso Especial</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Numero de Documento</label>
                    <input type="number" name="documento" class="form-control" maxlength="20" onkeypress="return check(event)" placeholder="Numero de Documento" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="text" name="correo" id="correo" class="form-control"   placeholder="Correo"  required readonly="readonly">
                  </div>
                  <div class="form-group">
                 <button class="btn btn-primary" style="width:100%;" id="generarBoton" onclick="generar()"> Generar Correo</button> </div>
        </div>
        </div>
    </div>
</div>

<div id="dos" class="tabcontent">
<div class="row">
        <div class="col-12 col-md-6">
        <div class="card-body">

        <div class="form-group">
                    <label for="exampleInputEmail1">Fecha de Ingreso</label>
                    <input type="date" name="ingreso" class="form-control"  required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Area</label>
                    <select class="form-control" name="area" required>
                    <option value="0">Seleccione</option> 
                    <option value="Administración">Administración</option> 
                    <option value="Financiera">Financiera</option>
                    <option value="Compras">Compras</option>
                    <option value="Infraestructura">Infraestructura</option>
                    <option value="Operación">Operación</option>
                    <option value="Talento">Talento </option>
                    <option value="Humano">Humano </option>
                    <option value="Servicios Varios">Servicios Varios </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <input type="text" name="estado" class="form-control"   value="Activo"  required readonly="readonly">
                  </div>
        </div>
     
                  
</div>
</div>



</div>


     
 
  
              
                
                <!-- /.card-body -->

             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
       
      </div>
    </div>
  </div>
</div>
</form>

<br>
<br>

<table id="myTable" class="table table-bordered table-hover table-responsive">
                  <thead>
                
                  <tr>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Primer Nombre</th>
                    <th>Otros Nombres</th>
                    <th>Pais de Empleo</th>
                    <th>Tipo Identificacion</th>
                    <th>Numero Identificacion</th>
                    <th>Correo</th>
                    <th>Ingreso</th>
                    <th>Area</th>
                    <th>Registro</th>

                    <th>eliminar</th>
                    <th>editar</th>
                   
                   
                  </tr>
                       
                  <tr>
                    <th><input type="text" id="myInput" class="form-control" onkeyup="primer_apellido()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput2" class="form-control" onkeyup="segundo_apellido()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput3" class="form-control" onkeyup="primer_nombre()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput4" class="form-control" onkeyup="otros()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput5" class="form-control" onkeyup="pais()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput6" class="form-control" onkeyup="identificacion()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput7" class="form-control" onkeyup="numero()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput8" class="form-control" onkeyup="correo()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="date" id="myInput9" class="form-control" id="mydate"  onchange="onInputChanged()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="text" id="myInput10" class="form-control" onkeyup="area()" placeholder="Buscar" style="witdh:100%"></th>
                    <th><input type="date" id="myInput11" class="form-control" id="mydate2" onchange="onInputChanged2()" placeholder="Buscar" style="witdh:100%"></th>
                   
                    <th>eliminar</th>
                    <th>editar</th>
                   
                   
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($empleados as $e) 
                  <tr>

                    <td>{{$e->primer_apellido}}</td>
                    <td>{{$e->segundo_apellido}}</td>
                    <td>{{$e->primer_nombre}}</td>
                    <td>{{$e->otros_mombres}}</td>
                    <td>{{$e->pais_empleo}}</td>
                    <td>{{$e->tipo_identificacion}}</td>
                    <td>{{$e->numero_identificacion}}</td>
                    <td>{{$e->correo_electronico}}</td>
                    <td>{{$e->fecha_ingreso}}</td>
                    <td>{{$e->area}}</td>
                    <td>{{$e->created_at}}</td>
                    <td><button class="btn btn-danger" onclick="eliminar({{$e->id}})">Eliminar</button></td>
                    <td><button class="btn btn-secondary" data-toggle="modal" data-target="#editar{{$e->id}}">Editar</button></td>
                   
                    
                    <div class="modal fade bd-example-modal-lg" id="editar{{$e->id}}" tabindex="-1" role="dialog" aria-labelledby="empleados" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Empleados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'unoEdit')">Datos 1</button>
  <button class="tablinks" onclick="openCity(event, 'dosEdit')">Datos 2</button>

</div>
<div id="unoEdit" class="tabcontent" style="display:block">
                
<div class="row">
        <div class="col-12 col-md-6">
        <div class="card-body">
        <form method="POST" enctype="multipart/form-data"action="{{ route('edit_empleado',[$e->id])}}">
      {{ csrf_field() }}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primer Apellido</label>
                    <input type="text" name="primer_apellido" id="primer_apellido_edit'.{{ $e->id }}" value="{{$e->primer_apellido}}"  class="form-control" maxlength="20" onkeypress="return check_change(event,'{{ $e->id }}')" placeholder="Primer Apellido" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido"  class="form-control" value="{{$e->segundo_apellido}}"  maxlength="20" onkeypress="return check(event)" placeholder="Segundo Apellido" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre_edit'.{{ $e->id }}" class="form-control" value="{{$e->primer_nombre}}"  maxlength="20" onkeypress="return check_change(event,'{{ $e->id }}')" placeholder="Primer Nombre" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Otros Nombres</label>
                    <input type="text" name="otros" value="{{$e->otros_nombres}}"  class="form-control" maxlength="50" onkeypress="return check(event)" placeholder="Otros Nombres" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" >
                  </div>
                  
               
                </div>
        </div>
        <div class="col-12 col-md-6">
        <div class="card-body">
        <div class="form-group">
                    <label for="exampleInputEmail1">Pais del Empleo</label>
                    <select class="form-control" name="pais" id="pais_edit'.{{ $e->id }}" required>
                    <option value="{{$e->pais_empleo}}">{{$e->pais_empleo}}</option> 
                    <option value="Colombia">Colombia</option> 
                    <option value="EEUU">EEUU</option> 
                    
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Identificacion</label>
                    <select class="form-control" name="identificacion" required>
                    <option value="{{$e->tipo_identificacion}}">{{$e->tipo_identificacion}}</option> 
                    <option value="CC">Cedula de Ciudadania</option> 
                    <option value="CE">Cedula de Extranjeria</option>
                    <option value="PS">Pasaporte</option>
                    <option value="PE">Permiso Especial</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Numero de Documento</label>
                    <input type="number" name="documento" value="{{$e->numero_identificacion}}"  class="form-control" maxlength="20" onkeypress="return check(event)" placeholder="Numero de Documento" style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="text" name="correo"  id="correo_edit{{ $e->id }}" class="form-control"  value="{{$e->correo_electronico}}"  placeholder="Correo"   readonly="readonly" required>
                  </div>
                  <div class="form-group">
                 <a class="btn btn-primary" style="width:100%;" id="generarBoton_edit" onclick="generar_edit('{{ $e->id }}')"> Generar Correo</a> </div>
        </div>
        </div>
    </div>
</div>

<div id="dosEdit" class="tabcontent">
<div class="row">
        <div class="col-12 col-md-6">
        <div class="card-body">

        <div class="form-group">
                    <label for="exampleInputEmail1">Fecha de Ingreso</label>
                    <input type="date" name="ingreso" class="form-control" value="{{$e->fecha_ingreso}}"  required >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Area</label>
                    <select class="form-control" name="area" required>
                    <option value="{{$e->area}}">{{$e->area}}</option> 
                    <option value="Administración">Administración</option> 
                    <option value="Financiera">Financiera</option>
                    <option value="Compras">Compras</option>
                    <option value="Infraestructura">Infraestructura</option>
                    <option value="Operación">Operación</option>
                    <option value="Talento">Talento </option>
                    <option value="Humano">Humano </option>
                    <option value="Servicios Varios">Servicios Varios </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Estado</label>
                    <input type="text" name="estado" class="form-control"   value="Activo"  required readonly="readonly">
                  </div>
        </div>
     
                  
</div>
</div>



</div>


     
 
  
              
                
                <!-- /.card-body -->

             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
       
      </div>
    </div>
  </div>
</div>
</form>





                    </tr>
                  </tbody>
                  @empty

<div id="evento" class="alert alert-danger" role="alert">
  no se ha registrado ningun empleado <a href="#" class="alert-link"></a>. 
</div>
@endforelse   

<hr>
<div class="row">
             
    <div col-12 style="text-align: center; margin-left: auto;
    margin-right: auto;">
            {{ $empleados->render()}}
    </div>
                </table>








    </div>
</div>

<script>

var today = new Date().toISOString().split('T')[0];
var finArray = today.split('-');

var fin=finArray[0]+"-"+(finArray[1]-1)+"-"+finArray[2];

document.getElementsByName("ingreso")[0].setAttribute('max', today);
document.getElementsByName("ingreso")[0].setAttribute('min', fin);
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function check2(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }else if(tecla==32){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function check_change(e,id) {
    tecla = (document.all) ? e.keyCode : e.which;
    
 document.getElementById("correo_edit"+id).value="";

    $('#correo_edit'+id).val('');
    //Tecla de retroceso para borrar, siempre la permite
   // document.getElementById('generarBoton_edit').disabled='enable';
    if (tecla == 8) {
        return true;
    }else if(tecla==32){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function generar(){
    var nombre = document.getElementById("primer_nombre").value;
    var apellido = document.getElementById("primer_apellido").value;
    var pais = document.getElementById("pais").value;
    if(nombre!="" && apellido !="" && pais!=""){
        nombre = nombre.toLowerCase();
        apellido = apellido.toLowerCase() ;
        apellido = apellido.replace(/ /g, "");
     
      
        $.ajax({
                type: "GET",
                url: "/generar/"+nombre+"/"+apellido+"/"+pais,
                success: function (data) {
                  console.log(data);
                  if(data.status=="200"){
                    console.log(data);
                    document.getElementById("correo").value=data.respuestas;
                    document.getElementById('generarBoton').disabled='disabled';
                  }else{
                    Swal.fire({
                        icon: 'error interno',
                        title: 'Oops...',
                        text: '',

                        })
                    }
                    
                        }         
        });
    }else{
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Complete los campos de nombre, apellido y pais!',

})
    }

}

function generar_edit(id){
    var nombre = document.getElementById("primer_nombre_edit"+id).value;
    var apellido = document.getElementById("primer_apellido_edit"+id).value;
    var pais = document.getElementById("pais"+id).value;
    if(nombre!="" && apellido !="" && pais!=""){
        nombre = nombre.toLowerCase();
        apellido = apellido.toLowerCase() ;
        apellido = apellido.replace(/ /g, "");
     
      
        $.ajax({
                type: "GET",
                url: "/generar/"+nombre+"/"+apellido+"/"+pais,
                success: function (data) {
                  console.log(data);
                  if(data.status=="200"){
                    console.log(data);
                    document.getElementById("correo_edit").value=data.respuestas;
                    document.getElementById('generarBoton_edit').disabled='disabled';
                  }else{
                    Swal.fire({
                        icon: 'error interno',
                        title: 'Oops...',
                        text: '',

                        })
                    }
                    
                        }         
        });
    }else{
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Complete los campos de nombre, apellido y pais!',

})
    }

}

function eliminar(id){
  Swal.fire({
  title: '¿Estas seguro?',
  text: "¿Seguro quieres eliminar este empleado?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'si'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    ),
	borrar(id);
  }
})
};
function borrar(id) {
            $.ajax({
                type: "GET",
                url: "/delete/"+id,
                data: {id:id},
                success: function (data) {
                  console.log(data);
                  if(data.status=="200"){
                    console.log(data);
					location.reload();
                  }else{
                    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'No se puede eliminar',

})
                  }
				
                    }         
            });
          }


  


</script>
<script src="../js/filter.js"></script>
@endsection
