
<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-light btn-sm'  href='inicio/ver' ide='"+cell.getRow().getData().id_real_estate+"' id='ver' title='Ver'><i class='fa fa-eye'></i></div>\
                <div class='btn btn-sm btn-success editar_actividad' superficie_espacio= '"+cell.getRow().getData().superficie_espacio+"' \
                 uso_espacio= '"+cell.getRow().getData().uso_espacio+"' fecha_f= '"+cell.getRow().getData().fecha_f+"' fecha_i= '"+cell.getRow().getData().fecha_i+"' \
                 tipo_contrato= '"+cell.getRow().getData().tipo_contrato+"' nombre= '"+cell.getRow().getData().name+"'ocupante= '"+cell.getRow().getData().ocupante+"' \
                 fecha_i2='"+cell.getRow().getData().fecha_i2+"'fecha_f2='"+cell.getRow().getData().fecha_f2+"'tipo_contrato2='"+cell.getRow().getData().tipo_contrato2+"'\
                 superficie_espacio2= '"+cell.getRow().getData().superficie_espacio2+"'uso_espacio2= '"+cell.getRow().getData().uso_espacio2+"'ocupante2='"+cell.getRow().getData().ocupante2+"'ide='"+cell.getRow().getData().id_real_estate+"' id='agregar' title='Agregar uso a un Tercero' ><i class='fas fa-plus'></i></div>";
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
            {title:"Acciones", formatter:icons, align:"center",width:120},
            {title:"Nombre", field:"name", width:240,align:"center",headerFilter:"input"},
            {title:"Contrato inicio", field:"inicio_contrato", width:150,align:"center",headerFilter:"input"},
            {title:"Contrato fin", field:"fin_contrato", width:150,align:"center",headerFilter:"input"},
            {title:"Tipo de Contrato", field:"tipo_contrato",width:"100",align:"center", headerFilter:"input"},
            {title:"Ocupante", field:"ocupante",width:"100",align:"center", headerFilter:"input"},
            //{title:"fecha_i", field:"fecha_i",width:"50",align:"center", headerFilter:"input"},
            //{title:"fecha_f", field:"fecha_f",width:"50",align:"center", headerFilter:"input"},
            {title:"Uso", field:"uso_espacio",width:"100",align:"center", headerFilter:"input"},
            {title:"Superficie Otorgada", field:"superficie_espacio",width:"100",align:"center", headerFilter:"input"},
           /*  {title:"tipo_contrato", field:"tipo_contrato",width:"50",align:"center", headerFilter:"input"},
            {title:"ocupante", field:"ocupante",width:"50",align:"center", headerFilter:"input"},
            {title:"fecha_i", field:"fecha_i",width:"50",align:"center", headerFilter:"input"},
            {title:"fecha_f", field:"fecha_f",width:"50",align:"center", headerFilter:"input"},
            {title:"uso_espacio", field:"uso_espacio",width:"50",align:"center", headerFilter:"input"},
            {title:"superficie_espacio", field:"superficie_espacio",width:"50",align:"center", headerFilter:"input"},
            {title:"federal_registration_code", field:"federal_registration_code",width:"50",align:"center", headerFilter:"input"},
            {title:"shared_property_name", field:"shared_property_name",width:"50",align:"center", headerFilter:"input"},
            {title:"limitations", field:"limitations",width:"50",align:"center", headerFilter:"input"},
            {title:"conafor", field:"conafor",width:"50",align:"center", headerFilter:"input"},
            {title:"new_real_estate_conafor_transaction", field:"new_real_estate_conafor_transaction",width:"50",align:"center", headerFilter:"input"},
            {title:"lease_payment", field:"lease_payment",width:"50",align:"center", headerFilter:"input"},
            {title:"owner_name", field:"owner_name",width:"50",align:"center", headerFilter:"input"},
            {title:"registered_date", field:"registered_date",width:"50",align:"center", headerFilter:"input"},
            {title:"active", field:"active",width:"50",align:"center", headerFilter:"input"},
            {title:"physical_condition", field:"physical_condition",width:"50",align:"center", headerFilter:"input"},
            {title:"description", field:"description",width:"50",align:"center", headerFilter:"input"},
            {title:"id_financial", field:"id_financial",width:"50",align:"center", headerFilter:"input"},
            {title:"construction_catastral_value", field:"construction_catastral_value",width:"50",align:"center", headerFilter:"input"},
            {title:"construction_parametric_value", field:"construction_parametric_value",width:"50",align:"center", headerFilter:"input"},
            {title:"construction_commercial_value", field:"construction_commercial_value",width:"50",align:"center", headerFilter:"input"},
            {title:"land_catastral_value", field:"land_catastral_value",width:"50",align:"center", headerFilter:"input"},
            {title:"land_parametric_value", field:"land_parametric_value",width:"50",align:"center", headerFilter:"input"},
            {title:"land_commercial_value", field:"land_commercial_value",width:"50",align:"center", headerFilter:"input"},
            {title:"total_catastral_value", field:"total_catastral_value",width:"50",align:"center", headerFilter:"input"},
            {title:"total_parametric_value", field:"total_parametric_value",width:"50",align:"center", headerFilter:"input"},
            {title:"total_commercial_value", field:"total_commercial_value",width:"50",align:"center", headerFilter:"input"},
            {title:"depreciation_percentage_yearly", field:"depreciation_percentage_yearly",width:"50",align:"center", headerFilter:"input"},
            {title:"useful_life_years", field:"useful_life_years",width:"50",align:"center", headerFilter:"input"},
            {title:"last_catastral_update_date", field:"last_catastral_update_date",width:"50",align:"center", headerFilter:"input"},
            {title:"last_parametric_update_date", field:"last_parametric_update_date",width:"50",align:"center", headerFilter:"input"},
            {title:"last_commercial_update_date", field:"last_commercial_update_date",width:"50",align:"center", headerFilter:"input"},
            {title:"id_measure", field:"id_measure",width:"50",align:"center", headerFilter:"input"},
            {title:"latitude", field:"latitude",width:"50",align:"center", headerFilter:"input"},
            {title:"longitude", field:"longitude",width:"50",align:"center", headerFilter:"input"},
            {title:"land_area", field:"land_area",width:"50",align:"center", headerFilter:"input"},
            {title:"built_area", field:"built_area",width:"50",align:"center", headerFilter:"input"},
            {title:"space_occupied_percentage", field:"space_occupied_percentage",width:"50",align:"center", headerFilter:"input"},
            {title:"gps_notes", field:"gps_notes",width:"50",align:"center", headerFilter:"input"},
            {title:"administrative_units_detail", field:"administrative_units_detail",width:"50",align:"center", headerFilter:"input"},
            {title:"id_address", field:"id_address",width:"50",align:"center", headerFilter:"input"}, */
            {title:"Domicilio", field:"full_address",align:"center",width:290, headerFilter:"input"}
                    
        ],
        
    });

    table.setData(<?=$datos?>);
    //table.setFilter("estatus", "=", "Recibido");
    ///BOTONES DE FILTROS///
    table.setFilter("fin_contrato", ">=", "2020-00-00 00:00:00-05");
    $('body').on('click','.btx_filtro',function(){
        table.setFilter("ocupate", "!=", "null");
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
    //Boton editar
    $('body').on('click','.editar_actividad',function(){
            let id = $(this).attr('ide');
            let nombre = $(this).attr('nombre');
            let ocupante = $(this).attr('ocupante');
            let tipo_contrato = $(this).attr('tipo_contrato');
            let fecha_i = $(this).attr('fecha_i');
            let fecha_f = $(this).attr('fecha_f');
            let uso_espacio = $(this).attr('uso_espacio');
            let superficie_espacio = $(this).attr('superficie_espacio');
            let ocupante2 = $(this).attr('ocupante2');
            let tipo_contrato2 = $(this).attr('tipo_contrato2');
            let fecha_i2 = $(this).attr('fecha_i2');
            let fecha_f2 = $(this).attr('fecha_f2');
            let uso_espacio2 = $(this).attr('uso_espacio2');
            let superficie_espacio2 = $(this).attr('superficie_espacio2');
            
            modal(id,nombre,ocupante,tipo_contrato,fecha_i,fecha_f,uso_espacio,superficie_espacio,ocupante2,tipo_contrato2,fecha_i2,fecha_f2,uso_espacio2,superficie_espacio2);
        })
        $('body').on('click','.btx-cancel',function(){
            swal.close();
        })

        $('body').on('click','.btx-modificar',function(e){
            e.preventDefault();
            $(this).attr('disabled',true)
            let id = $(this).attr('ide');
            let ocupante = $("#ocupante_modificado").val();
            let tipo_contrato = $("#contrato_modificado").val();
            let fecha_i = $("#fechai_modificada").val();
            let fecha_f = $("#fechaf_modificada").val();
            let uso_espacio = $("#uso_modificado").val();
            let superficie_espacio = $("#superficie_modificada").val();
            let ocupante2 = $("#ocupante2_modificado").val();
            let tipo_contrato2 = $("#contrato_modificado2").val();
            let fecha_i2 = $("#fechai_modificada2").val();
            let fecha_f2 = $("#fechaf_modificada2").val();
            let uso_espacio2 = $("#uso_modificado2").val();
            let superficie_espacio2 = $("#superficie_modificada2").val();
            $.ajax({
                type: "POST",
                url: '<?=base_url()?>inicio/actualizar',
                data: {'id':id,'ocupante':ocupante, 'tipo_contrato':tipo_contrato,'fecha_i':fecha_i,
                        'fecha_f':fecha_f,'uso_espacio':uso_espacio,'superficie_espacio':superficie_espacio, 
                        'ocupante2':ocupante2, 'tipo_contrato2':tipo_contrato2, 'fecha_i2':fecha_i2, 'fecha_f2':fecha_f2,
                        'uso_espacio2':uso_espacio2,'superficie_espacio2':superficie_espacio2,},
                success: function (data) {
                    console.log(data);
                    if(JSON.parse(data).msg){
                        alert('','La actividad ha sido modificada','success','<?=base_url()?>inicio/');
                    }
                    else{
                        alert('','La actividad no pudo modificarse, debe llenar todos los campos','error','<?=base_url()?>inicio/');
                    }
                }
            });
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

