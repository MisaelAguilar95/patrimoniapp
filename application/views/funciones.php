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
  function modal(act,id){
      Swal.fire({
        title: '<strong>Edición de Actividad</strong>',
        icon: '',
        html:
          '<br><div class="row text-left"><div class="col-md-12"><label>Actividad:</label>' +
          '<textarea rows="8" id="actividad_modificada" name="descripcion_actividad" class="form-control">'+act+'</textarea>' +
          '</div></div> '+
          '<div class="row text-right"><div class="col-md-12">' +
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