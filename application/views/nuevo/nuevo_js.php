 <script>
     function cuenta(){
       document.forms[0].email.value=document.forms[0].nota.value.length
    }
    $('input[ name ="num_anexos"]').on('change', function(){
        if ($(this).val() >=1) {
            document.getElementById('mostrarOcultar1').style.display="block";
        }else document.getElementById('mostrarOcultar1').style.display="none";
        if ($(this).val() >=2) {
        document.getElementById('mostrarOcultar2').style.display="block";
        }else document.getElementById('mostrarOcultar2').style.display="none";
       if ($(this).val() >=3) {
            document.getElementById('mostrarOcultar3').style.display="block";
        }else document.getElementById('mostrarOcultar3').style.display="none";
        if ($(this).val() >=4) {
            document.getElementById('mostrarOcultar4').style.display="block";
        }else document.getElementById('mostrarOcultar4').style.display="none";
    });


    $('body').on('click','btx_anexo',function(e){
        e.preventDefault();
        $('input[name=carga_anexo]').click();
    })
/* 
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
        console.log($('select[name=concopia]').val())
    })

    $('input[name=acronimo]').keyup(function(){
        $(this).val($(this).val().toUpperCase())
    })  */
    /*  $('body').on('click','#btn_enviar',function(){
        
        $.malert({
            title: "Please confirm", 
            body: "Desea eliminar el registro?", 
            textTrue: "Aceptar", 
            textFalse: "Cancelar",
            onSubmit: function (result) {
                if (result) {
                    salert('Cambio realizado','Actualizacion de Datos','success')
                } 
                else {
                    salert('Cancelacion realizada','Cancelación','danger')
                }
            },
            onDispose: function () {
                console.log("modal cerrado")
            }
        })
    })   

    $('input[type="file"]').on('change', function(){
//console.log($(this)[0].files[0].size);
if ($(this).val() !='') {
    if($(this)[0].files[0].size > 1048576){
        console.log("El documento excede el tamaño máximo");
        $('#modal-title').text('¡Precaución!');
        $('#modal-msg').html("Se solicita un archivo no mayor a 1MB. Por favor verifica.");
        $("#modal-gral").modal();           
        $(this).val('');
    }else{
        $("#modal-gral").hide();                    
    }   
}
});
 */
</script> 