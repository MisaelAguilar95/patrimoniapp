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
                <div class="row">
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
                        <input class="form-control" type="date" name="fechaemision"value="<?php echo date("Y-m-d");?>">
                    </div>   
                    <div class="form-group col-md-3">
                        <label class="form-label" for="fechalimite">Fecha Límite</label>
                        <input class="form-control" type="date" name="fechalimite">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="email">E-mail</label>
                        <input class="form-control"  name="email">
                    </div>                    
                </div> 
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label" for="remitente">Remitente</label>
                        <input type="text" class="form-control" name="remitente">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="destinatario">Destinatario</label>
                        <select class="multiple-select2 bg-dark form-control" name="destinatario" placeholder="Seleccionea destinatarios para copia">
                            <?=$tipos_documento;?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label">Área/Unidad Responsable</label>
                        <input type="number" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input type="number" class="form-control">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="concopia">CC</label>
                        <select class="multiple-select2 form-control" name="concopia" multiple="multiple" placeholder="Seleccionea destinatarios para copia">
                            <?=$tipos_documento;?>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label class="form-label" for="nota">Nota</label>
                        <textarea class="form-control" placeholder="Escriba una nota" name="nota" rows="5" maxlength="60"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="application/pdf">
                            <label class="custom-file-label" for="customFile">Elegir Archivo PF</label>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="offset-md-9 col-md-3 text-right">
        <button id="btn_guardar_nuevo" class="btn btn-primary"> Guardar</button>
        <button id="btn_enviar_nuevo" class="btn btn-success "type="submit"> Enviar</button>
    </div>
</div>



<?php echo form_open_multipart('Empleados/save');?>
<div class="row">
    <div class="col-md-4" style="border-right:1px solid #BBBBBB;vertical-align:middle; padding-right:30px">
        <div class="row m-t-20">
            <div class="col-md-12">
                <label class="form-label m-t-20">Foto:</label>
                <img src="<?=base_url()?>frontend/images/user.png" id="imgSalida" width="330" height="210" class="img img-fluid" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="custom-file">
                    <input type="file" name="foto_empleado" id="foto_empleado"  class="custom-file-input">
                    <label class="custom-file-label" for="customFile">Elegir Archivo</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8" style="padding-left:30px">
        <div class="row m-t-20">
            <h5>Datos Personales</h5>
        </div>
        <div class="row m-t-20">
            <div class="col-md-6">
                <label for="">Nombre:</label>
                <input type="text"  name="nombre" class="form-control mayus" autocomplete="off" placeholder="Max 150 caracteres" maxlength="200">
            </div>
            <div class="col-md-4">
                <label for="">CURP:</label>
                <input type="text" class="form-control mayus"  name="curp" autocomplete="off" placeholder="Max 18 caracteres" maxlength="18">
            </div>
            <div class="col-md-2">
                <label for="">Edad:</label>
                <input type="text" class="form-control"  name="edad" maxlength="2" placeholder="Max 2">
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-md-3">
                <label for="">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento"  class="form-control">
            </div>
            <div class="col-md-4">
                <label for="">Escolaridad:</label>   
                <input type="text" name="escolaridad"  class="form-control" maxlength="50" placeholder="Max 50 caracteres">
            </div>
            <div class="col-md-5">
                <label for="">Especialidad:</label>   
                <input type="text" name="especialidad"  class="form-control" maxlength="100" placeholder="Max 100 caracteres">
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-md-12">
                <label for="">Domicilio:</label>
                <input type="text" name="domicilio"  class="form-control" autocomplete="off" placeholder="Max 250 caracteres" maxlength="250">
            </div>
