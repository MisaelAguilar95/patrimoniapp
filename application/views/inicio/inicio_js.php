<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-light btn-sm'  href='inicio/ver' ide='"+cell.getRow().getData().id+"' id='ver' title='Ver'><i class='fa fa-eye'></i></div> \
                <div class='btn btn-dark btn-sm turnar'ide='"+cell.getRow().getData().id+"' id='turnar' title='Turnar'><i class='fa fa-exchange'></i></div> \
                <div class='btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"' id='enviar' title='Enviar'><i class='fas fa-share'></i></div> \
                <div class='btx_eliminar btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
    
    var table = new Tabulator('#oficios_tab', {
        layout:"fitDataFill",
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            {title:"#Oficio", field:"num_doc", width:120,align:"center",headerFilter:"input" },
            {title:"Remitente", field:"remitente", width:190,align:"center",headerFilter:"input"},
            {title:"Destinatario", field:"destinatario", width:190,align:"center",headerFilter:"input"},
            {title:"Area destino ", field:"area", width:190,align:"center",headerFilter:"input"},
            {title:"Asunto", field:"asunto", width:200,align:"center",headerFilter:"input"},
            {title:"Fecha limite", field:"fecha_limite",width:120,align:"center",headerFilter:"input"},
            {title:"Estatus", field:"estatus_id",width:120,align:"center",headerFilter:"input"},
            {title:"Acciones", formatter:icons, align:"center",width:250}
        ],
        
    });

    table.setData(<?=$datos?>);



    // $('body').on('click','#editar',function(){
    //     let act = $(this).parent().parent().find('span[name=actividad]').text();
    //         let id = $(this).attr('ide');
    //         modal(act,id);
    // });

     $('body').on('click','.btx_eliminar',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/elimina/'+ide;
         })

    $(document.body).on('click','#turnar',()=>{ 
        console.log('chido');
        let id = $(this).attr('ide');
        modal('',id);
    })
  
    // //Llenar los tipos de campo con un foreach que proviene de table object
    // let campos = '';
    // for (let index = 0; index < table.options.columns.length-1; index++) {
    //     campos +='<option value="'+table.options.columns[index].field+'">'+table.options.columns[index].title+'</option>';
    // }
       
    // $("#filtro-campo").html(campos);
    
    // //Llnerar table con datos
    $('body').on('click','.btx_ver',function(){
        let ide = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/ver/'+ide;
    })

    
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

