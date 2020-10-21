
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
                <div class="col-md-3">
                        <label class="form-label" for="documento">Numero de Documento: *</label>
                        <input type="text" class="form-control" placeholder="Ingrese el número de Documento" name="num_doc" maxlength="20">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="tipodoc">Selecciona el tipo de documento: *</label>
                            <select id="tipo_doc_id" class="form-control" name="tipo_doc_id" required>
                                <?=$tipos_documento?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input  name ='num_anexos'type="number" placeholder="0" min="0" max="4" pattern="^[0-9]"class="form-control">
                    </div>
                    <div class="col-md-4">
                        <div id="mostrarOcultar1" style="display:none">
                            <label class="form-label" for="documento">Anexo N.1</label>
                            <input id="carga_anexo" name="carga_anexo" type="file">
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4"id="mostrarOcultar2" style="display:none">
                        <label class="form-label" for="documento">Anexo N.2</label>
                        <input id="carga_anexo2" name="carga_anexo2" type="file">
                    </div> 
                    <div class="col-md-4"id="mostrarOcultar3" style="display:none">
                        <label class="form-label" for="documento">Anexo N.3</label>
                        <input id="carga_anexo3" name="carga_anexo3" type="file">
                    </div>
                    <div class="col-md-4"id="mostrarOcultar4" style="display:none">
                        <label class="form-label" for="documento">Anexo N.4</label>
                        <input id="carga_anexo4" name="carga_anexo4" type="file">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <label class="form-label" for="asunto">Asunto: *</label>
                        <input type="text" class="form-control"maxlength="70" type="text" placeholder="Ingrese el asunto del documento" name="asunto" required>
                    </div>
                </div>
                <div class="row m-t-10">
                <div class="form-group col-md-4">
                    <label class="form-label" for="fechaemision">Fecha de Emisión </label>
                    <input class="form-control" type="date" name="fecha_emision"value="<?php echo date("Y-m-d");?>">
                </div>   
                <div class="form-group col-md-4">
                    <label class="form-label" for="fechalimite">Fecha Límite</label>
                    <input class="form-control" type="date" name="fecha_limite"value="<?php echo date("Y-m-d");?>">
                </div> 
                   <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label" for="area">Gerencia destino: *</labe>
                            <select id="area" class="form-control" name="area" required>
                                <?=$gerencia_destino?>
                            </select>
                        </div>

                    </div>                
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="destinatario">Ingresar Correo del Destinatario: *</label>
                        <input class='form-control' id="destinatario" placeholder="Ingrese el correo del destinatario" name="destinatario" type="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Área/Unidad Responsable:</label>
                        <input name='acronimo' placeholder="Ingrese Área/Unidad Responsable" type='text' class="form-control" >
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label class="form-label" for="indicacion">Selecciona la indicacion: *</label>
                            <select id="indicacion" class="form-control" name="indicacion" required>
                                <?=$tipo_indicacion?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Turnar a un Tercero:</label>
                        <input name='tercero' placeholder="Tercero" type='email' class="form-control" >
                    </div>
                </div>
                <div class="row m-t-10">
                   <div class="col-md-12">
                        <label class="form-label" for="nota">Notas :</label>
                        <br><input class ="text-right" type="text"  style="border-width:0; background-color:#dad9db;" name=email size=3 readonly> <label for="caracteres">/600</label>
                        <textarea class="form-control m-t-10" placeholder="Escriba una nota" name="nota" rows="5" maxlength="500"onKeyDown="cuenta()" onKeyUp="cuenta()"></textarea>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12 text-center">
                        <div class="custom-file">
                       <!--  <label class="custom-file-label" for="customFile">Cargar PDF</label> -->
                            <input type="file" name="cargar_pdf" id="cargar_pdf" >
                            
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