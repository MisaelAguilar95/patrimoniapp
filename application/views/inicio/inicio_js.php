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
    //genera iconos de acciones
    var printIcon = function(cell){
        return  '<span class="acciones"><i class="ver btn btn-sm btn-secondary fal fa-home"></i><i class="editar btn btn-sm text-white btn-warning fal fa-edit"></i><i class="eliminar btn btn-sm text-white btn-danger fal fa-trash-alt"></i><i class="regresar btn btn-sm text-white btn-success fal fa-home"></i></span>';
    };
    
    var table = new Tabulator('#tablas', {
        layout:"fitDataFill",
        //autoColumns:true,
        //columns:<=$titulos?>
    });

    //table.setData('<=$datos;?>');

    let tam_acc = $(".acciones").width()+25;
    $('.tabulator-col-title:contains("Acciones")').parent().parent().attr('style',"width:"+tam_acc+"px");
    $('.acciones').parent().attr('style',"width:"+tam_acc+"px");
    
});


</script>