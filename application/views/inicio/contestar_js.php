<!-- <script>
    $(document).ready(function(){
        
        let valores = <?=($oficio)?>;
        //console.log(valores.pdf);
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        if(valores.pdf != ''){
            $('iframe[name=oficio_pdf]').attr('src','<?=base_url()?>frontend/pdf/'+valores.pdf)
        }
    })
</script> -->