
<?php echo form_open_multipart('Inicio/save');?>
<div class="accordion accordion-hover" id="accordion">
    <div class="card">
        <div class="card-header">
            <a href="#" class="card-title collapsed bg-primary text-white"  data-target="#pest1" aria-expanded="false">
                <i class="fas fa-file width-2"></i>Nuevo Documento
            </a>
        </div>
        <div id="pest1" class="collapse show" data-parent="#accordion">
            <div class="card-body bg-gray-dark">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h3 class="form-label" for="tipodoc">Selecciona el tipo de documento</h3>
                            <select id="tipodoc" class="form-control" name="tipodoc">
                                <?=$tipos_documento?>
                            </select>
                        </div>
                    </div>
                </div>
                <br><div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-label" for="expediente">Expediente</label>
                        <input type="text" class="form-control" placeholder="Ingrese el número de expediente" name="num_exp" maxlength="10">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control"maxlength="70" type="text" placeholder="Ingrese el asunto del documento" name="asunto" required>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechaemision">Fecha de Recepción</label>
                    <input class="form-control" type="date" name="fecha_emision"value="<?php echo date("Y-m-d");?>">
                </div>   
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechalimite">Fecha Límite</label>
                    <input class="form-control" type="date" name="fecha_limite"value="<?php echo date("Y-m-d");?>">
                </div> 
                    <div class="form-group col-md-3">
                        <label class="form-label" for="email">E-mail</label>
                        <input class="form-control"  name="email">
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label" for="remitente">Remitente</label>
                        <input  class="form-control" name="remitente">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="destinatario">Destinatario</label>
                        <input class='form-control'name="destinatario" >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Área/Unidad Responsable</label>
                        <input name='acronimo' typw='text' class="form-control" >
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input  name ='num_anexos'type="number" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="concopia">CC</label>
                        <select class="multiple-select2 form-control" name="concopia" multiple="multiple" placeholder="Seleccionea destinatarios para copia">
                            <?=$tipos_documento;?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label" for="nota">Nota</label>
                        <textarea class="form-control" placeholder="Escriba una nota" name="nota" rows="5" maxlength="60"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><label class="form-label" for="selec_pdf">Seleccionar PDF</label>
                        <div class="custom-file">
                            
                            <input type="file" name="cargar_pdf" id="cargar_pdf"  class="custom-file-input">
                            <label class="custom-file-label" for="customFile">Cargar PDF</label>
                        </div>
                        <div class="offset-md-9 col-md-3 text-right">
                            <br><button id="btn_enviar" class=" btn btn-success"> Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>