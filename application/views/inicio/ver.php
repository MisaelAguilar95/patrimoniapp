<?php echo form_open_multipart('Inicio/save');?>
<div class="accordion accordion-hover" id="accordion">
    <div class="card">
        <div class="card-header">
            <a href="#" class="card-title collapsed bg-primary text-white"  data-target="#pest1" aria-expanded="false"><br>
                <i class="fas fa-file width-2"></i> Documento
            </a>
        </div>
        <div id="pest1" class="collapse show" data-parent="#accordion">
            <div class="card-body bg-gray-dark">
                <!-- <div class="row">
                    <div class="col-md-2 offset-md-10">
                        <label class="form-label" for="fechaemision">Estatus:</label>
                        <input class="form-control text-center"  name="estatus"value="<?php echo date("Y-m-d");?> " readonly>
                    </div>
                </div> -->
                <div class="row m-t-10">
                    <div class="col-md-2 offset-md-10">
                        <label class="form-label" for="fechaemision">Fecha de Recepción</label>
                        <input class="form-control text-center" type="text"  name="fecha_emision"value="<?php echo date("Y-m-d");?> " readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 offset-md-10 m-t-10">
                        <label class="form-label" for="fechalimite">Fecha Límite</label>
                        <input class="form-control text-center" type="text" name="fecha_limite"value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="expediente">Numero de Documento</label>
                        <input type="text" class="form-control"  readonly name="num_doc" maxlength="10">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="tipodoc">Tipo de documento</label>
                        <input type="text" class="form-control" readonly name="tipo_doc" maxlength="10">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input  name ='num_anexos'type="number" class="form-control" readonly>
                    </div>
                </div>
                <div class="row m-t-10">
                <div class="col-md-12">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control"maxlength="70" type="text" placeholder="Ingrese el asunto del documento" name="asunto" required>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-3">
                        <label class="form-label" for="remitente">Remitente</label>
                        <input  class="form-control" name="remitente" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Área/Unidad Responsable</label>
                        <input name='acronimo' type='text' class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="destinatario">Destinatario</label>
                        <input class='form-control'name="destinatario" readonly >
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="area">Gerencia destino</label>
                        <input class="form-control"  name="area" readonly>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="tipodoc">Indicación :</label>
                        <input type="text" class="form-control" readonly name="indicacion" maxlength="10">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label class="form-label">Tercero:</label>
                        <input name='tercer' placeholder="Tercero" readonly type='email' class="form-control" >
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <label for=""><b>Notas:</b></label>
                        <textarea name="nota" class="form-control" rows="10"></textarea>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <label for=""><b>Documento Adjunto</b>:</label>
                        <iframe name="oficio_pdf" src="#" width="100%" height="300"></iframe>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div id ="mostrarOcultar"class="col-md-12" style="display:none">
                        <label for=""><b>Anexo 1</b>:</label>
                        <iframe name="anexo_pdf" src="#" width="100%" height="300"></iframe>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div id ="mostrarOcultar2"class="col-md-12" style="display:none">
                        <label for=""><b>Anexo 2</b>:</label>
                        <iframe name="anexo_pdf2" src="#" width="100%" height="300"></iframe>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div id ="mostrarOcultar3"class="col-md-12" style="display:none">
                        <label for=""><b>Anexo 3</b>:</label>
                        <iframe name="anexo_pdf3" src="#" width="100%" height="300"></iframe>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div id ="mostrarOcultar4"class="col-md-12" style="display:none">
                        <label for=""><b>Anexo 4</b>:</label>
                        <iframe name="anexo_pdf4" src="#" width="100%" height="300"></iframe>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-danger btx_regresar"><i class="fa fa-reply"></i> Regresar</button>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</div>