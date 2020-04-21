<?php echo form_open_multipart('Inicio/actualizar');?>
<div class="accordion accordion-hover" id="accordion">
    <div class="card">
        <div class="card-header">
            <a href="#" class="card-title collapsed bg-primary text-white"  data-target="#pest1" aria-expanded="false"><br>
                <i class="fas fa-file width-2"></i>Editar Documento
            </a>
        </div>
        <div id="pest1" class="collapse show" data-parent="#accordion">
            <div class="card-body bg-gray-dark">
                <div class="row">
                    <div class="col-md-12">
                        <br><div class="form-group">
                            <h3 class="form-label" for="tipodoc">Selecciona el tipo de documento</h3>
                            <input type="text" class="form-control"  name="tipo_doc_id" maxlength="10">
                        </div>
                    </div>
                </div>
                
                <br><div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="expediente">Numero de Documento</label>
                        <input type="text" class="form-control"   name="num_doc" maxlength="10">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control"maxlength="70" type="text"   name="asunto" required>
                    </div> 
                   </div>
                <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechaemision">Fecha de Recepción</label>
                    <input class="form-control" type="date"  name="fecha_emision"value="<?php echo date("Y-m-d");?> " >
                </div>   
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechalimite">Fecha Límite</label>
                    <input class="form-control" type="date" name="fecha_limite"value="<?php echo date("Y-m-d");?>" >
                </div> 
                    <div class="form-group col-md-3">
                        <label class="form-label" for="area">Gerencia destino</label>
                        <input class="form-control"  name="area" >
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label" for="remitente">Remitente</label>
                        <input  class="form-control" name="remitente" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="destinatario">Destinatario</label>
                        <input class='form-control'name="destinatario" >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Área/Unidad Responsable</label>
                        <input name='acronimo' type='text' class="form-control" >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input  name ='num_anexos'type="number" class="form-control" >
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-4">
                        <label class="form-label" for="concopia">CC</label>
                        <select class="multiple-select2 form-control" name="concopia" multiple="multiple" placeholder="Seleccionea destinatarios para copia"readonly>
                            <?=$con_copia;?>
                        </select>
                    </div> -->
                    <div class="col-md-8">
                        <label class="form-label" for="nota">Nota</label>
                        <textarea class="form-control" placeholder="Escriba una nota" name="nota" rows="5" maxlength="60"></textarea>
                    </div>
                </div>
                <br><div class="row">
                    <div class="col-md-12">
                    <iframe name="oficio_pdf" src="#" width="100%" height="300"></iframe>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="offset-md-9 col-md-3 text-right">
                            <br><button id="btn_enviar" class=" btn btn-success"> Enviar</button>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>