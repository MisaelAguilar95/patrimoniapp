
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
    
    var table = new Tabulator('#reporte_consumibles', {
        layout:"fitDataFill",
        //dataTree:true,
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            //{title:"Acciones", formatter:icons, align:"center",width:120},
            {title:"Partida", field:"departure", width:100,align:"center",headerFilter:"input"},
            {title:"ID CUCOP", field:"cucop", width:100,align:"center",headerFilter:"input"},
            {title:"Descripcion CUCOP", field:"cucop_description", width:230,align:"center",headerFilter:"input"},
            {title:"Agrupador", field:"additional_description", width:340,align:"center",headerFilter:"input"},
            {title:"Cantidad", field:"cant", width:100,align:"center",headerFilter:"input"},
            
            //{title:"Proveedor", field:"supplier", width:240,align:"center",headerFilter:"input"},
            //{title:"Estatus", field:"status", width:240,align:"center",headerFilter:"input"},
                    
        ],
        
    });

    table.setData(<?=$datos?>);
    
    //table.setFilter("estatus", "=", "Recibido");
    ///BOTONES DE FILTROS///
    

    $('body').on('click','.btx_filtro_gerencias',function(){
        table.setFilter("unit_description","in", ["GERENCIA ESTATAL JALISCO","GERENCIA DE FINANCIAMIENTO", "GERENCIA ESTATAL BAJA CALIFORNIA SUR","GERENCIA ESTATAL CAMPECHE","GERENCIA ESTATAL CHIHUAHUA",
                        "GERENCIA ESTATAL CHIAPAS", "GERENCIA ESTATAL CIUDAD DE MEXICO", "GERENCIA ESTATAL COAHUILA","GERENCIA ESTATAL MICHOACAN",
                        "GERENCIA ESTATAL NUEVO LEON", "GERENCIA ESTATAL SONORA", "GERENCIA ESTATAL VERACRUZ", "GERENCIA ESTATAL BAJA CALIFORNIA", 
                        "GERENCIA ESTATAL OAXACA", "GERENCIA ESTATAL YUCATAN", "GERENCIA ESTATAL COLIMA", "GERENCIA ESTATAL SINALOA", "GERENCIA ESTATAL HIDALGO",
                        "GERENCIA ESTATAL GUERERRERO", "GERENCIA ESTATAL SAN LUIS POTOSI", "GERENCIA ESTATAL DURANGO", "GERENCIA ESTATAL ZACATECAS", "GERENCIA ESTATAL TABASCO",
                        "GERENCIA ESTATAL QUERETARO", "GERENCIA ESTATAL QUINTANA ROO", "GERENCIA ESTATAL PUEBLA","GERENCIA ESTATAL NAYARIT", "GERENCIA ESTATAL MEXICO",
                        "GERENCIA ESTATAL TLAXCALA", "GERENCIA ESTATAL TAMAULIPAS", "GERENCIA ESTATAL AGUASCALIENTES","GERENCIA ESTATAL MORELOS"]);
    })
    $('body').on('click','.btx_clear_filter',function(){
        table.clearFilter();
    })
   

    

    //DESCARGAR XLSX
    document.getElementById("download-xlsx").addEventListener("click", function(){
        table.download("xlsx", "Total_Consumibles.xlsx", {sheetName:"Reporte Agrupado"});
        });
    //DESCARGAR PDF
    document.getElementById("download-pdf").addEventListener("click", function(){
        table.download("pdf", "Total Consumibles.pdf", {
        orientation:"landscape", //set page orientation to portrait
        title:"Reporte Agrupado", //add title to report
        
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

