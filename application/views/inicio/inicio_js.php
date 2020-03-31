<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed');

    $("#showtoast").click(()=>{
        alertm('Mensaje nuevo','','danger');
    })

    $(document.body).on('click','#editar',function(){
        $.malert({
            title: "Please confirm", 
            body: "Editar documento seleccionado ?", 
            textTrue: "Aceptar", 
            textFalse: "Cancelar",
            
            
        })
    });

    $(document.body).on('click','#ver',()=>{
        $.malert({
            title: "Please confirm", 
            body: "Ver docuemnto seleccionado", 
            textTrue: "Aceptar", 
            textFalse: "Cancelar",
            
            
        })
    })

    $('body').on('click','#eliminar',function(){
        alert('No se pudo eliminar','No se pudo eliminar la actividad','error','<?=base_url()?>inicio/');
        })

    $(document.body).on('click','#asignar',()=>{
        
        $.malert({
            title: "Please confirm", 
            body: "A quien desea asignar el documento ?", 
            textTrue: "Aceptar", 
            textFalse: "Cancelar",
            
            
        })
    })

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btn btn-light btn-sm' id='ver' title='Ver'><i class='fa fa-eye'></i></div> \
                <div class='btn btn-primary btn-sm' id='editar' title='Editar'><i class='fa fa-pencil'></i></div> \
                <div class='btn btn-dark btn-sm' id='asignar' title='Asignar'><i class='fa fa-exchange'></i></div> \
                <div class='btn btn-secondary btn-sm' id='contestar' title='Contestar'><i class='fas fa-reply'></i></div> \
                <div class='btn btn-danger btn-sm' id='eliminar' title='Eliminar'><i class='fa fa-trash'></i></div>";
    };
    
    var table = new Tabulator('#oficios_tab', {
        layout:"fitDataFill",
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        data:<?=file_get_contents(base_url().'documentos.json');?>,
        columns:[
            {title:"ID", field:"id", width:30,align:"center"},
            {title:"#Documento", field:"num_doc", width:50,align:"center"},
            {title:"Recepcion", field:"fecha_recibido", width:50,align:"center"},
            {title:"Emision", field:"fecha_emision", width:50,align:"center"},
            {title:"Asunto", field:"asunto", width:50,align:"center"},
            {title:"Remitente", field:"remitente_id",width:100},
            {title:"Expediente", field:"num_exp", width:50,align:"center"},
            {title:"Tipo", field:"tipo_doc_id",width:50},
            {title:"Expira", field:"fecha_limite",width:50,align:"center"},
            {title:"Estatus", field:"estatus_id",width:30,align:"center"},
            {title:"Acciones", width:300,formatter:icons,align:"center"}
        ],
        
    });

    //Llenar los tipos de campo con un foreach que proviene de table object
    let campos = '';
    for (let index = 0; index < table.options.columns.length-1; index++) {
        campos +='<option value="'+table.options.columns[index].field+'">'+table.options.columns[index].title+'</option>';
    }
       
    $("#filtro-campo").html(campos);
    
    /* //Llnerar table con datos
    table.setData('<?=$datos?>');
 */
    //Limpiar los filtros de consulta
    $(document.body).on('click','#btn_limpiar_filtro',function(){
        $("#filtro-campo").prop("selectedIndex", 0);
        $("#filtro-tipo").prop("selectedIndex", 0);
        $("#filtro-valor").val("");
        table.clearFilter();
    });

    //Funcion para actualizar datos de table
    function updateFilter(){
        table.setFilter($("#filtro-campo").val(), $("#filtro-tipo").val(), $("#filtro-valor").val());
    }

    //Actualizacion de filtro a cada cambio
    $("#filtro-campo, #filtro-tipo").change(updateFilter);
    $("#filtro-valor").keyup(updateFilter);

    //Click sobre los botones de filtro rapido
    $(".btn_filtros_rapidos").click(function(){
        let val = $(this).attr('rel');
        table.setFilter('estatus', 'like', val);
    })

    //trigger para descargar pdf
    $("#download-pdf").click(function(){
        table.download("pdf", "data.pdf", {
            orientation:"landscape", //set page orientation to portrait
            title:"Reporte", //add title to report
        });
    });

});


</script>