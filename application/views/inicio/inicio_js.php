
<script>
$(document).ready(function() {
    $('body').addClass('nav-function-fixed pace-done nav-function-minify');

    //crear tabla
    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-light btn-sm'  href='inicio/ver' ide='"+cell.getRow().getData().id+"' id='ver' title='Ver'><i class='fa fa-eye'></i></div> \
        <div class='btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
            <div class='btx_turnar btn btn-dark btn-sm' ide='"+cell.getRow().getData().id+"' id='turnar' title='Turnar'><i class='fas fa-exchange'></i></div>\
                <div class='btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"' id='enviar' title='Enviar'><i class='fas fa-share'></i></div> ";
               // <div class='btx_eliminar btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
    
    var table = new Tabulator('#oficios_tab', {
        layout:"fitDataFill",
        pagination:"local",
        paginationSize:20,
        paginationSizeSelector:[5,10,15,20,25,30,40,50],
        columnMinWidth:80,
        columns:[
            {title:"#Oficio", field:"num_doc", width:80,align:"center",headerFilter:"input"},
            {title:"Remitente", field:"remitente", width:190,align:"center",headerFilter:"input"},
            {title:"Destinatario", field:"destinatario", width:190,align:"center",headerFilter:"input"},
            {title:"Area destino ", field:"area", width:130,align:"center",headerFilter:"input"},
            {title:"Asunto", field:"asunto", width:170,align:"center",headerFilter:"input"},
            {title:"Fecha limite", field:"fecha_limite",width:120,align:"center",headerFilter:"input"},
            {title:"Estatus", field:"estatus",width:120,align:"center",headerFilter:"input"},
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
       console.log('elimina',id);
       location.href = '<?=base_url()?>inicio/elimina/'+id;
         })

         $('body').on('click','.btx_turnar',function(){
        let id = $(this).attr('ide');
        let title=$(this).attr('ide');
       console.log('turnar',id);
       $.malert({
            title: "Turnar Documento", 
            body: "", 
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
    
    $('body').on('click','.btx_ver',function(){
        let ide = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/ver/'+ide;
    })

    

});

</script>

