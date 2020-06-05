
<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var table = new Tabulator('#bitacora', {
        layout:"fitColumns",
        //dataTree:true,
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        groupBy:"id_seguimiento",
        //groupToggleElement:"header",
        columns:[
            {title:"#Oficio", field:"num_doc", width:150,align:"center",headerFilter:"input"},
            {title:"ID", field:"id_seguimiento", width:100,align:"center",headerFilter:"input"},
            {title:"Remitente", field:"remitente", width:180,align:"center",headerFilter:"input"},
            {title:"Estatus Remitente", field:"estatus", width:160,align:"center",headerFilter:"input"},
            {title:"Destinatario", field:"destinatario", width:180,align:"center",headerFilter:"input"},
            //{title:"Estatus Destinatario", field:"estatus_d", width:160,align:"center",headerFilter:"input"},
            {title:"Notas", field:"notas",align:"center",headerFilter:"input"},
            {title:"Fecha", field:"fecha",width:90,align:"center",headerFilter:"input"}
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

    $('body').on('click','.btx_ftodos',function(){
        table.setFilter("estatus", "!=", "");
    })
    
//BOTONES PARA DESCARGAS//
    document.getElementById("download-xlsx").addEventListener("click", function(){
        table.download("xlsx", "sasdoc.xlsx", {sheetName:"My Data"});
    });

    //trigger download of data.pdf file
    document.getElementById("download-pdf").addEventListener("click", function(){
        table.download("pdf", "sasdoc.pdf", {
            orientation:"landscape", //set page orientation to portrait
            title:"Reporte de Ejemplo", //add title to report
        });
    });


});


</script>

