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
            $('iframe[name=oficio_pdf]').attr('src','<?=base_url()?>frontend/pdf/'+valores.pdf)
            
        }
        if(valores.carga_anexo != ''){
            $('iframe[name=anexo_pdf]').attr('src','<?=base_url()?>frontend/pdf/'+valores.carga_anexo)
        }

        $('body').on('click','.btx_regresar',function(){
            location.href = '<?=base_url()?>inicio'
        })
    })
</script>