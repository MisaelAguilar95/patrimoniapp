
<div  id="reporte" style="font-size:12px !important"></div>

<script>
var table = new Tabulator('#reporte', {
        layout:"fitDataFill",
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            {title:"id", field:"id", width:140,align:"center",headerFilter:"input"},
            {title:"CURP", field:"curp", width:180,align:"center",headerFilter:"input"},
            {title:"Nombres", field:"nombres", width:180,align:"center",headerFilter:"input"},
            {title:"Apellido P", field:"Apellido_paterno", width:230,align:"center",headerFilter:"input"},
            
            {title:"Apellido M", field:"apellido_materno", width:130,align:"center",headerFilter:"input"},
            {title:"RFC", field:"rfc",width:100,align:"center",headerFilter:"input"},
            {title:"Estado", field:"estado",width:100,align:"center",headerFilter:"input"},
            {title:"Email", field:"correo_electronico" ,width:100,align:"center",width:200}
        ],
        
    });
table.setData(<?=$datos?>);
</script>