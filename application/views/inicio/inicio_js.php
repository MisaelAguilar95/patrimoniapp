<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<a href='inicio/ver'><div class='btx_ver btn btn-light btn-sm'  href='inicio/ver' ide='"+cell.getRow().getData().id+" id='ver' title='Ver'><i class='fa fa-eye'></i></a></div> \
                <div class='btn btn-primary btn-sm' id='editar' title='Editar'><i class='fa fa-pencil'></i></div> \
                <div class='btn btn-dark btn-sm' id='asignar' title='Asignar'><i class='fa fa-exchange'></i></div> \
                <div class='btn btn-secondary btn-sm' id='contestar' title='Contestar'><i class='fas fa-reply'></i></div> \
                <div class='btn btn-danger btn-sm text-white' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
    
    var table = new Tabulator('#oficios_tab', {
        layout:"fitDataFill",
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            {title:"#Documento", field:"num_doc", width:120,align:"center",headerFilter:"input" },
            {title:"Remitente", field:"remitente", width:190,align:"center",headerFilter:"input"},
            {title:"Destinatario", field:"email", width:190,align:"center",headerFilter:"input"},
            {title:"Asunto", field:"asunto", width:290,align:"center",headerFilter:"input"},
            {title:"Expira el", field:"fecha_limite",width:120,align:"center",headerFilter:"input"},
            {title:"Estatus", field:"estatus_id",width:120,align:"center",headerFilter:"input"},
            {title:"Acciones", formatter:icons, align:"center",width:250}
        ],
        
    });

    table.setData(<?=$datos?>);





    // $(document.body).on('click','#ver',()=>{
    //     $.malert({
    //         title: "Please confirm", 
    //         body: "Ver docuemnto seleccionado", 
    //         textTrue: "Aceptar", 
    //         textFalse: "Cancelar" 
    //     })
    // })

    // $('body').on('click','#editar',function(){
    //     let act = $(this).parent().parent().find('span[name=actividad]').text();
    //         let id = $(this).attr('ide');
    //         modal(act,id);
    // });

    // $('body').on('click','#eliminar',function(){
    //     alert('No se pudo eliminar','No se pudo eliminar la actividad','error','<=base_url()?>inicio/');
    //     })

    // $(document.body).on('click','#asignar',()=>{
        
    //     $.malert({
    //         title: "Please confirm", 
    //         body: "A quien desea asignar el documento ?", 
    //         textTrue: "Aceptar", 
    //         textFalse: "Cancelar",            
    //     })
    // })
  
    // //Llenar los tipos de campo con un foreach que proviene de table object
    // let campos = '';
    // for (let index = 0; index < table.options.columns.length-1; index++) {
    //     campos +='<option value="'+table.options.columns[index].field+'">'+table.options.columns[index].title+'</option>';
    // }
       
    // $("#filtro-campo").html(campos);
    
    // //Llnerar table con datos

    // $(document.body).on('click', '.btx_ver', function(){
    //     let id = $(this).attr('ide');
    //     console.log(id);
      
    // })
    // //Limpiar los filtros de consulta
    // $(document.body).on('click','#btn_limpiar_filtro',function(){
    //     $("#filtro-campo").prop("selectedIndex", 0);
    //     $("#filtro-tipo").prop("selectedIndex", 0);
    //     $("#filtro-valor").val("");
    //     table.clearFilter();
    // });


    // //Funcion para actualizar datos de table
    // function updateFilter(){
    //     table.setFilter($("#filtro-campo").val(), $("#filtro-tipo").val(), $("#filtro-valor").val());
    // }

    // //Actualizacion de filtro a cada cambio
    // $("#filtro-campo, #filtro-tipo").change(updateFilter);
    // $("#filtro-valor").keyup(updateFilter);

    // //Click sobre los botones de filtro rapido
    // $(".btn_filtros_rapidos").click(function(){
    //     let val = $(this).attr('rel');
    //     table.setFilter('estatus', 'like', val);
    // })

    // //trigger para descargar pdf
    // $("#download-pdf").click(function(){
    //     table.download("pdf", "data.pdf", {
    //         orientation:"landscape", //set page orientation to portrait
    //         title:"Reporte", //add title to report
    //     });
    // });

});

</script>

