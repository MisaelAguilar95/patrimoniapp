<script>
    $(document).ready(function(){
        
        let valores = <?=$oficio?>[0];
        console.log(valores);
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
            //$(this).attr('readonly',true)
        })
        if(valores.pdf != ''){
            $('iframe[name=oficio_pdf]').attr('src','<?=base_url()?>frontend/pdf/'+valores.pdf+'.pdf')
            
        }
        if(valores.carga_anexo != null){
            $('iframe[name=anexo_pdf]').attr('src','<?=base_url()?>frontend/anexos/'+valores.carga_anexo+'.pdf')
            document.getElementById('mostrarOcultar').style.display="block";
           }
        if(valores.carga_anexo2 != null){
         $('iframe[name=anexo_pdf2]').attr('src','<?=base_url()?>frontend/anexos/'+valores.carga_anexo2+'.pdf')
         document.getElementById('mostrarOcultar2').style.display="block";
        }
        if(valores.carga_anexo3 != null){
         $('iframe[name=anexo_pdf3]').attr('src','<?=base_url()?>frontend/anexos/'+valores.carga_anexo3+'.pdf')
         document.getElementById('mostrarOcultar3').style.display="block";
        }
        if(valores.carga_anexo4 != null){
         $('iframe[name=anexo_pdf4]').attr('src','<?=base_url()?>frontend/anexos/'+valores.carga_anexo4+'.pdf')
         document.getElementById('mostrarOcultar4').style.display="block";
        }

        $('body').on('click','.btx_regresar',function(){
            location.href = '<?=base_url()?>inicio'
        })
    })
</script>