
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
    
    var table = new Tabulator('#reporte_baja', {
        layout:"fitDataFill",
        //dataTree:true,
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            //{title:"Acciones", formatter:icons, align:"center",width:120},
            {title:"Procedencia", field:"source", width:240,align:"center",headerFilter:"input"},
            {title:"No.Factura", field:"folio", width:240,align:"center",headerFilter:"input"},
            {title:"Fecha de factura", field:"registered_date", width:240,align:"center",headerFilter:"input"},
            {title:"Proveedor", field:"supplier", width:240,align:"center",headerFilter:"input"},
            {title:"Estatus", field:"status", width:240,align:"center",headerFilter:"input"},
            {title:"Clave del resguardante", field:"username", width:240,align:"center",headerFilter:"input"},
            {title:"Nombre Resguardante", field:"full_name", width:240,align:"center",headerFilter:"input"},
            {title:"Ubicación", field:"management_code", width:240,align:"center",headerFilter:"input"},
            {title:"No. Inventario", field:"inventory_code", width:240,align:"center",headerFilter:"input"},
            {title:"Descripción CUCOP", field:"cucop_description", width:240,align:"center",headerFilter:"input"},
            {title:"Marca", field:"brand", width:240,align:"center",headerFilter:"input"},
            {title:"Modelo", field:"model", width:240,align:"center",headerFilter:"input"},
            {title:"Serie", field:"serial", width:240,align:"center",headerFilter:"input"},
            {title:"Valor de Adquisición $", field:"unit_cost_total", width:240,align:"center",headerFilter:"input"},
            {title:"Partida", field:"cucop_departure", width:240,align:"center",headerFilter:"input"}
                    
        ],
        
    });

    table.setData(<?=$datos?>);
    //table.setFilter("estatus", "=", "Recibido");
    ///BOTONES DE FILTROS///

    $('body').on('click','.btx_filtro',function(){
        table.setFilter("fin_contrato", ">=", "2020-00-00 00:00:00-05");
    })

    

    //DESCARGAR XLSX
    document.getElementById("download-xlsx").addEventListener("click", function(){
        table.download("xlsx", "bajas.xlsx", {sheetName:"Reporte de bajas"});
        });
    //DESCARGAR PDF
    document.getElementById("download-pdf").addEventListener("click", function(){
        table.download("pdf", "bajas.pdf", {
        orientation:"landscape", //set page orientation to portrait
        title:"Reporte de bajas", //add title to report
        
        });
    

});
       
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


    
</script>

