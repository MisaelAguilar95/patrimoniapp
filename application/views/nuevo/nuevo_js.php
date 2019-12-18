<script>

    $(".multiple-select2").select2({ placeholder: "Seleccionea una o varias personas" });

    let num_oficio = $("#documento").val();
    let expediente = $("#expediente").val();
    let asunto = $("#asunto").val();
    let tipodoc = $("select#tipodoc option:checked").val();
    let fechaemision = $("#fechaemision").val();
    let fechalimite = $("#fechalimite").val();
    let remitente = $("#remitente").val();
    let destinatario = $("select#destinatario option:checked").val();
    let concopia = $("select#concopia option:checked").val();
    let anexos = $("#anexos").val();
    let nota = $("#nota").val();
    let archivo = $("#archivo").val();

    let formData = '';

    //Funcion para el envio de los datos
    $('body').on('click','#btn_guardar_nuevo',function(){
        // $.ajax({
        //     url : "<?=base_url()?>inicio/recibir",
        //     type: "POST",
        //     data : formData,
        //     success: function(data, textStatus, jqXHR){
                
        //     },
        //     error: function (jqXHR, textStatus, errorThrown){
        
        //     }
        // });
    })
    

</script>