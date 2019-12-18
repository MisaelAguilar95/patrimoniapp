<script>
    $(".multiple-select2").select2({ placeholder: "Seleccionea una o varias personas" });

    $('#enviar').click(function(){
        let formData = {num_oficio:$("#documento").val(),
                        expediente:$("#expediente").val(),
                        asunto:$("#asunto").val(),
                        tipodoc:$("select#tipodoc option:checked").val(),
                        fechaemision:$("#fechaemision").val(),
                        fechalimite:$("#fechalimite").val(),
                        remitente:$("#remitente").val(),
                        destinatario:$("select#destinatario option:checked").val(),
                        concopia:$("#concopia").val(),
                        anexos:$("#anexos").val(),
                        nota:$("#nota").val(),
                        archivo:$("#archivo").val(),
                        turnado:$("#turnado").val(),
                        seguimiento:$("#responsable").val(),
                        fecharecepcion:$("#fecharecibido").val(),
                        horarecepcion:$("#horarecibido").val()};
        var url = "<?=base_url()?>inicio/recibir_ext";                                      
        $.ajax({                        
           type: "POST",                 
           url: url,                    
           data: formData,
           success: function(data)            
           {
             $('#resp').html(data);           
           }
         });
      });


</script>