<script>
/* var tableDataNested = [
    {id:"1", id_doc:"1243", nom_doc:"Oficio", id_usuario:"342", nom_usuario:"Misael",id_evento:"776",nom_evento:"Actualizar", fecha_evt:"12-09-2019"}, 

        
]; */

//define table

var table = new Tabulator("#tablas", {
    layout:"fitDataFill",
    data:<?=file_get_contents(base_url().'ejemplo.json');?>,
    autoColumns: true,
   /*  columns:[
        
    {title:"Id Bitacora", field:"id_bitacora", width:50, responsive:0}, //never hide this column
    {title:"Id Usuario", field:"id_usuario", width:120},
    {title:"Usuario", field:"usuario", width:150},
    {title:"Id Documento", field:"id_documento", width:120},
    {title:"# Documento", field:"numero_documento", width:150},
    {title:"Id Usuario mod", field:"id_usuario_modificado", width:120},
    {title:"Usuario Modificado", field:"usuario_modificado", width:150},
    {title:"Evento", field:"evento", width:130},
    {title:"Fecha Evento", field:"fecha_evento", width:130},


    ],*/
}); 

</script>