<script>
/* var tableDataNested = [
    {id:"1", id_doc:"1243", nom_doc:"Oficio", id_usuario:"342", nom_usuario:"Misael",id_evento:"776",nom_evento:"Actualizar", fecha_evt:"12-09-2019"}, 

        
]; */

//define table

var table = new Tabulator("#tablas", {
    layout:"fitDataFill",
    data:<?=file_get_contents(base_url().'ejemplo.json');?>,

    columns:[
        
    {title:"Id", field:"id", width:50, responsive:0}, //never hide this column
    {title:"Id doc", field:"id_doc", width:120},
    {title:"Documento", field:"nom_doc", width:150},
    {title:"Id Usuario", field:"id_usuario", width:120},
    {title:"Usuario", field:"nom_usuario", width:150},
    {title:"Id Evento", field:"id_evento", width:120},
    {title:"Evento", field:"nom_evento", width:150},
    {title:"Fecha Evt", field:"fecha_evt", width:130},


    ],
});

</script>