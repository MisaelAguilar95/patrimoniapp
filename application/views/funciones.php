<script>
function modal(act,id){
      Swal.fire({
      title: '<strong>VER DOCUMENTO</strong>',
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
</script>