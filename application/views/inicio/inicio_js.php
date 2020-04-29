
<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-light btn-sm'  href='inicio/ver' ide='"+cell.getRow().getData().id+"' id='ver' title='Ver'><i class='fa fa-eye'></i></div> \
                <div class='btx_atendido btn btn-success btn-sm' ide='"+cell.getRow().getData().id+"' id='atendido' title='Atendido'><i class='fas fa-check'></i></div>\
                <div class='btx_turnar btn btn-dark btn-sm' ide='"+cell.getRow().getData().id+"' id='turnar' title='Turnar'><i class='fas fa-exchange'></i></div>";
                //<div class='btx_contestar btn btn-secondary btn-sm' href='inicio/contestar' ide='"+cell.getRow().getData().id+"' id='contestar' title='Contestar'><i class='fas fa-share'></i></div> 
                //<div class=' btx_editar btn btn-secondary btn-sm' href='inicio/editar' ide='"+cell.getRow().getData().id+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> 
                // <div class='btx_eliminar btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
    
    var table = new Tabulator('#oficios_tab', {
        layout:"fitDataFill",
        //dataTree:true,
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            {title:"#Oficio", field:"num_doc", width:140,align:"center",headerFilter:"input"},
            {title:"Remitente", field:"remitente", width:180,align:"center",headerFilter:"input"},
            {title:"Destinatario", field:"destinatario", width:180,align:"center",headerFilter:"input"},
            {title:"Asunto", field:"asunto", width:230,align:"center",headerFilter:"input"},
            
            {title:"Fecha Emision", field:"fecha_emision", width:130,align:"center",headerFilter:"input"},
            {title:"Fecha limite", field:"fecha_limite",width:100,align:"center",headerFilter:"input"},
            {title:"Estatus", field:"estatus",width:100,align:"center",headerFilter:"input"},
            {title:"Acciones", formatter:icons, align:"center",width:200}
        ],
        
    });

    table.setData(<?=$datos?>);
    //table.setFilter("estatus", "=", "Recibido");
    ///BOTONES DE FILTROS///
    $('body').on('click','.btx_frecibido',function(){
        table.setFilter("estatus", "=", "Recibido");
    })

    $('body').on('click','.btx_fenviado',function(){
        table.setFilter("estatus", "=", "Enviado");
    })

    $('body').on('click','.btx_fturnado',function(){
        table.setFilter("estatus", "=", "Turnado");
    })

    $('body').on('click','.btx_fatendido',function(){
        table.setFilter("estatus", "=", "Atendido");
    })

    
    ///BOTONES DE LA TABLA////
    //mostrar modal de turnado
    $('body').on('click','.btx_turnar',function(){
        let id = $(this).attr('ide');
        let title=$(this).attr('ide');
       
       let html = '<?=trim(form_open_multipart('Inicio/turnar'))?>' +
         '<input style="display:none" name="id_seguimiento" value="'+id+'"><div class="text-left"><div class="row m-t-10"><div class="col-md-12"><label class="form-label" for="destinatario">Destinatario</label>' +
        '<input class="form-control" type="email" name="destinatario"></div></div><div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="nota">Notas :</label><textarea class="form-control" placeholder="Escriba una nota" name="notas" rows="3" maxlength="200"></textarea>' +
        '</div></div><div class="row m-t-10"><div class="col-md-12 text-right"><button type="submit" id="btn_turnar" type="button" class="btn btn-success"> Enviar</button>' +
        '<button type="button" class="btn btn-danger btx_regresar m-l-10">Cancelar</button></div></div></div></form>';
       modal_html('Turnar Documento',html);      
    })

    $('body').on('click','.btx_atendido',function(){
        let id = $(this).attr('ide');
        let title=$(this).attr('ide');
       
       let html = '<?=trim(form_open_multipart('Inicio/atendido'))?>' +
         '<input style="display:none" name="id_seguimiento" value="'+id+'"><div class="text-left">' +
        '<div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="destinatario">Informar de atendido a :</label>' +
        '<input class="form-control" placeholder = "Ingrese el correo .."type="email" name="destinatario"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="nota">Notas :</label><textarea class="form-control" placeholder="Escriba una nota" name="notas" rows="3" maxlength="200"></textarea>' +
        '</div></div><div class="row m-t-10"><div class="col-md-12 text-right"><button type="submit" id="btn_atendido" type="button" class="btn btn-success"> Aceptar</button>' +
        '<button type="button" class="btn btn-danger btx_regresar m-l-10">Cancelar</button></div></div></div></form>';
       modal_html('Marcar como atendido ?',html);      
    })

    //botonazo de modal para regresar
    $('body').on('click','.btx_regresar',function(){
        swal.close();
    })
    
    $('body').on('click','.btx_ver',function(){
        let ide = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/ver/'+ide;
    })

});

// $('body').on('click','#btn_turnar',function(){
    //     let id_t = $('input[name=id_t]').val();
    //     let destinatario_t = $('input[name=destinatario_t]').val();
    //     let obs_t = $('textarea[name=nota_t]').val();

    // })
/* $("form").submit(function(e){
        e.preventDefault();    
        var formData = new FormData(this);
        let url = '<?=base_url()?>inicio/save';
        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            cache: false,
            success: function (data) {
                if(JSON.parse(data).ban){
                    alert('',JSON.parse(data).msg,'success');
                }
                else{
                    alert('',JSON.parse(data).msg,'error');
                }
            }
        });
    })
    $(document.body).on('click','.eliminar',()=>{
        
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
    */

</script>

