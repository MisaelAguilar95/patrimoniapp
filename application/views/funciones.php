<script>
  function alert(titulo,texto,icono,salida=null){
      Swal.fire({
      icon: icono,
      title: titulo,
      text: texto
      })
      .then(() => {
          if(salida == null)
              window.history.back();
          else
              location.href = salida
      })
  }
  
//funcion para cerrar un salert => tipo success, error, warning, info, question
  function sclose(titulo,tipo,tiempo=3000,fn=null){
      Swal.fire({
        title: titulo,
        icon: tipo,
        timer: tiempo,
        onClose: () => {
          if(!!fn)
            fn();
        }
      })
  }
  function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
  }
  function myFunction() {
    var x = document.getElementById("ocultar");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
  function modal(id,name,ocupante,tipo_contrato,fecha_i,fecha_f,uso_espacio,superficie_espacio,ocupante2){
      Swal.fire({
        title: '<strong>Agregar Uso a Un Tercero</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control" readonly name="name"value="'+name+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="beneficiario">Ocupante:</label>' +
          '<input class="form-control" id="ocupante_modificado" name="ocupante" value = "'+ocupante+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="instrumento">Tipo de Contrato:</label>' +
          '<select class="form-control" name="tipo_contrato" id="contrato_modificado" >'+
          '<option >'+tipo_contrato+'</option><option value="arrendatario">Arrendatario</option><option value="comodato">Comodato</option>'+
          '<option value="concesion">Concesión</option><option value="convenio">Convenio</option>'+
          '<option value="otro">Otro</option></select></div></div>'+
          '<div class="row m-t-10"><div class="col-md-6">' +
          '<label class="form-label" for="fecha_ini">Fecha inicio:</label>' +
          '<input class="form-control" type="date" id="fechai_modificada" name="fecha_i"value="'+fecha_i+'"></div>'+
          '<div class="col-md-6">'+
          '<label class="form-label" for="fecha_fin">Fecha fin:</label>' +
          '<input class="form-control" type="date" id="fechaf_modificada" name="fecha_f"value="'+fecha_f+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="uso">Uso :</label>' +
          '<input class="form-control" id="uso_modificado" name="uso_espacio" value="'+uso_espacio+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="superficie">Superficie otorgada:</label>' +
          '<input class="form-control" onkeypress="return validaNumericos(event)" id="superficie_modificada" name="superficie_espacio" value="'+superficie_espacio+'"></div></div><hr>'+
          '<button class="btn btn-sm btn-success"onclick="myFunction()">Agregar Ocupante</button>'+
          '<div class="row m-t-10"><div id="ocultar" style ="display:none"class="col-md-12">' +
          '<label class="form-label" for="ocupante2">Agregar ocupante:</label>' +
          '<input class="form-control"  id="ocupante2_modificado" name="ocupante2" value="'+ocupante2+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button><button ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>' +
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }

  function modal_html(titulo,html){
    Swal.fire({
        title: titulo,
        icon: '',
        html:html,
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        focusConfirm: false,
      })
  }
</script>