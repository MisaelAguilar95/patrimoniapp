<?php echo form_open_multipart('Inicio/save');?>
<div class="accordion accordion-hover" id="accordion">
    <div class="card">
        <div class="card-header">
            <a href="#" class="card-title collapsed bg-primary text-white"  data-target="#pest1" aria-expanded="false"><br>
                <i class="fas fa-file width-2"></i>Nuevo Documento
            </a>
        </div>
        <div id="pest1" class="collapse show" data-parent="#accordion">
            <div class="card-body bg-gray-dark">
                <div class="row">
                    <div class="col-md-12">
                        <br><div class="form-group">
                            <h3 class="form-label" for="tipodoc">Selecciona el tipo de documento</h3>
                            <select id="tipodoc" class="form-control"  name="tipodoc">
                                <?=$tipos_documento?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <br><div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="expediente">Expediente</label>
                        <input type="text" class="form-control" placeholder="Ingrese el número de expediente" readonly name="num_exp" maxlength="10">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control"maxlength="70" type="text" placeholder="Ingrese el asunto del documento" readonly name="asunto" required>
                    </div> 
                   </div>
                <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechaemision">Fecha de Recepción</label>
                    <input class="form-control" type="date"  name="fecha_emision"value="<?php echo date("Y-m-d");?> " readonly>
                </div>   
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechalimite">Fecha Límite</label>
                    <input class="form-control" type="date" name="fecha_limite"value="<?php echo date("Y-m-d");?>" readonly>
                </div> 
                    <div class="form-group col-md-3">
                        <label class="form-label" for="email">E-mail</label>
                        <input class="form-control"  name="email" readonly>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label" for="remitente">Remitente</label>
                        <input  class="form-control" name="remitente_id" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="destinatario">Destinatario</label>
                        <input class='form-control'name="destinatario_id" readonly >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Área/Unidad Responsable</label>
                        <input name='acronimo' typw='text' class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input  name ='num_anexos'type="number" class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="concopia">CC</label>
                        <select class="multiple-select2 form-control" name="concopia" multiple="multiple" placeholder="Seleccionea destinatarios para copia"readonly>
                            <?=$tipos_documento;?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label" for="nota">Nota</label>
                        <textarea class="form-control" placeholder="Escriba una nota" name="nota" rows="5" maxlength="60"readonly></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><label class="form-label" for="selec_pdf">Seleccionar PDF</label>
                        <div class="custom-file">
                            
                            <input type="file" name="cargar_pdf" id="cargar_pdf"  class="custom-file-input"readonly>
                            <label class="custom-file-label" for="customFile">Cargar PDF</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <iframe src="<?=base_url()?>frontend\pdf\1507c5263be4a61794fe503d34a0fea3.pdf" width="100%" height="300"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let valores = <?=json_encode($usuario)?>;
    $('input').each(function(){
    $(this).val(valores[$(this).attr('name')])
    })
    $('select').each(function(){
        $(this).val(valores[$(this).attr('name')])
    })
    $('textarea').each(function(){
        $(this).val(valores[$(this).attr('name')])
    })
    if(valores['cargar_pdf'] != ''){
        $('object[name=cargar_pdf]').attr('data','<?=base_url()?>frontend/pdf/'+valores['cargar_pdf'])
    }
</script>