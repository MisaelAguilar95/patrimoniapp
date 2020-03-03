<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed');

    $("#showtoast").click(()=>{
        alertm('Mensaje nuevo','','danger');
    })


    $(document.body).on('click','.ver',()=>{
        salert('mensaje','titulo','success')
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

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btn btn-light btn-sm' ide='' title='Ver'><i class='fa fa-eye'></i></div> \
                <div class='btn btn-primary btn-sm' ide='' title='Editar'><i class='fa fa-pencil'></i></div> \
                <div class='btn btn-dark btn-sm' ide='' title='Asignar'><i class='fa fa-exchange'></i></div> \
                <div class='btn btn-secondary btn-sm' ide='' title='Contestar'><i class='fas fa-reply'></i></div> \
                <div class='btn btn-success btn-sm' ide='' title='Atender'><i class='fal fa-check'></i></div>";
    };
    
    var table = new Tabulator('#oficios_tab', {
        layout:"fitDataFill",
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            {title:"# Oficio", field:"num_oficio", width:150,align:"center"},
            {title:"Expediente", field:"num_exp", width:150,align:"center"},
            {title:"Asunto", field:"asunto",width:250},
            {title:"Tipo", field:"tipo",width:100},
            {title:"Remitente", field:"remitente",width:200},
            {title:"Fecha Emisión", field:"fecha_emision",width:170,align:"center"},
            {title:"Dias Restantes", field:"dias_restantes",width:150,align:"center"},
            {title:"Estatus", field:"estatus",width:130,align:"center"},
            {title:"Acciones", width:300,formatter:icons,align:"center"}
        ]
        //autoColumns:true
    });

    //Llenar los tipos de campo con un foreach que proviene de table object
    let campos = '';
    for (let index = 0; index < table.options.columns.length-1; index++) {
        campos +='<option value="'+table.options.columns[index].field+'">'+table.options.columns[index].title+'</option>';
    }
       
    $("#filtro-campo").html(campos);
    
    //Llnerar table con datos
    table.setData('<?=$datos?>');

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
    
});


</script>