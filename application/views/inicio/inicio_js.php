
<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-light btn-sm'  href='inicio/ver' ide='"+cell.getRow().getData().id_real_estate+"' id='ver' title='Ver'><i class='fa fa-eye'></i></div> \
                <div class='btx_agregar btn btn-success btn-sm' ide='"+cell.getRow().getData().id_real_estate+"' id='agregar' title='Agregar Beneficiario'><i class='fas fa-plus'></i></div>";
                //<div class='btx_turnar btn btn-dark btn-sm' ide='"+cell.getRow().getData().id+"' id='turnar' title='Turnar'><i class='fas fa-exchange'></i></div>
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
            {title:"Acciones", formatter:icons, align:"center",width:100},
            {title:"Nombre", field:"name", width:290,align:"center",headerFilter:"input"},
            {title:"Contrato inicio", field:"inicio_contrato", width:180,align:"center",headerFilter:"input"},
            {title:"Contrato fin", field:"fin_contrato", width:180,align:"center",headerFilter:"input"}
            
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
    /* $('body').on('click','.btx_turnar',function(){
        let id_real_estate = $(this).attr('ide');
        let title=$(this).attr('ide');
       
       let html = '<?=trim(form_open_multipart('Inicio/turnar'))?>' +
         '<input style="display:none" name="id_seguimiento" value="'+id_real_estate+'"><div class="text-left"><div class="row m-t-10"><div class="col-md-12"><label class="form-label" for="destinatario">Destinatario</label>' +
        '<input class="form-control"  name="destinatario"></div></div><div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="nota">Notas :</label><textarea class="form-control" placeholder="Escriba una nota" name="notas" rows="3" maxlength="200"></textarea>' +
        '</div></div><div class="row m-t-10"><div class="col-md-12 text-right"><button type="submit" id="btn_turnar" type="button" class="btn btn-success"> Enviar</button>' +
        '<button type="button" class="btn btn-danger btx_regresar m-l-10">Cancelar</button></div></div></div></form>';
       modal_html('Turnar Documento',html);      
    }) */

    //DESCARGAR XLSX
    document.getElementById("download-xlsx").addEventListener("click", function(){
        table.download("xlsx", "inmuebles.xlsx", {sheetName:"Reporte de inmuebles"});
        });
    //DESCARGAR PDF
    document.getElementById("download-pdf").addEventListener("click", function(){
        table.download("pdf", "inmuebles.pdf", {
        orientation:"landscape", //set page orientation to portrait
        title:"Reporte de inmuebles", //add title to report
        
        });
    

});
    $('body').on('click','.btx_agregar',function(){
        let id_real_estate = $(this).attr('ide');
        let title=$(this).attr('ide');
        console.log(id_real_estate);
       
       let html = '<?=trim(form_open_multipart('Inicio/agregar'))?>' +
        '<input style="display:none" name="id_real_estate" value="'+id_real_estate+'"><div class="text-left">' +
        '<div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="instrumento">Instrumento bajo el cual se otorga la posesión a un tercero:</label>' +
        '<input class="form-control" name="instrumento"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="beneficiario">Beneficiario del espacio:</label>' +
        '<input class="form-control" name="beneficiario"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-6">' +
        '<label class="form-label" for="fecha_ini">Fecha inicio:</label>' +
        '<input class="form-control" type="date" name="fecha_inicio"value="<?php echo date("Y-m-d");?>"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-6">' +
        '<label class="form-label" for="fecha_fin">Fecha fin:</label>' +
        '<input class="form-control" type="date" name="fecha_fin"value="<?php echo date("Y-m-d");?>"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="uso">Uso del espacio:</label>' +
        '<input class="form-control" name="uso_espacio"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-12">' +
        '<label class="form-label" for="superficie">Superficie del espacio:</label>' +
        '<input class="form-control" name="superficie_espacio"></div></div>'+
        '<div class="row m-t-10"><div class="col-md-12 text-right"><button type="submit" id="btn_agregar" type="button" class="btn btn-success"> Aceptar</button>' +
        '<button type="button" class="btn btn-danger btx_regresar m-l-10">Cancelar</button></div></div></div></form>';
       modal_html('Agregar información',html);      
    })

    //botonazo de modal para regresar
    $('body').on('click','.btx_regresar',function(){
        swal.close();
    })
    
    $('body').on('click','.btx_ver',function(){
        let ide = $(this).attr('ide');
        console.log(ide);
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

