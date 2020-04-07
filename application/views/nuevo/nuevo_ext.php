<div class="accordion accordion-hover" id="accordion">
    <div class="card">
        <div class="card-header">
            <a href="#" class="card-title collapsed bg-primary text-white"  data-target="#pest1" aria-expanded="false">
                <i class="fas fa-file width-2"></i>Documento Externo
            </a>
        </div>
        <div id="pest1" class="collapse show" data-parent="#accordion">
            <div class="card-body bg-gray-dark">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-label" for="documento">N° de oficio / Documento</label>
                        <input type="text" class="form-control" id="documento" name="num_oficio" placeholder="Ingrese el número de oficio o documento">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="expediente">Expediente</label>
                        <input type="text" class="form-control" id="expediente" placeholder="Ingrese el número de expediente" name="expediente" maxlength="10">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control"maxlength="70" type="text" id="asunto" placeholder="Ingrese el asunto del documento" name="asunto" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="tipodoc">Tipo de documento</label>
                        <select id="tipodoc" class="form-control" name="tipodoc">
                            <option>Tipo de documento 1</option>
                            <option>Tipo de documento 2</option>
                            <option>Tipo de documento 3</option>
                            <option>Tipo de documento 4</option>
                            <option>Tipo de documento 5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label" for="fechaemision">Fecha de Documento</label>
                        <input class="form-control" id="fechaemision" type="date" name="fechaemision"value="<?php echo date("Y-m-d");?>">
                    </div>   
                    <div class="form-group col-md-3">
                        <label class="form-label" for="fechalimite">Fecha Límite</label>
                        <input class="form-control" id="fechalimite" type="date" name="fechalimite" value="2023-07-23">
                    </div>                   
                </div> 
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label" for="remitente">Remitente</label>
                        <input type="text" class="form-control" id="remitente" name="remitente">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="destinatario">Destinatario</label>
                        <select id="destinatario" class="form-control" name="destinatario">
                            <option>Persona 1</option>
                            <option>Persona 2</option>
                            <option>Persona 3</option>
                            <option>Persona 4</option>
                            <option>Persona 5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label" for="anexos">N° de Anexos</label>
                        <input type="number" class="form-control" id="anexos">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="form-group col-md-4">
                        <label class="form-label" for="concopia">CC</label>
                        <select class="multiple-select2 form-control" id="concopia" name="concopia" multiple="multiple" placeholder="Seleccionea destinatarios para copia">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label class="form-label" for="nota">Nota</label>
                        <textarea class="form-control" id="nota" placeholder="Escriba una nota" name="nota" rows="5" maxlength="60"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label">Archivo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="archivo">
                            <label class="custom-file-label" for="customFile">Elegir Archivo</label>
                        </div>
                    </div>
                </div>
                <div class="row m-t-10">
                        <div class="form-group col-md-3">
                            <label class="form-label" for="turnado" >Turnado a</label>
                            <select class="multiple-select2 form-control" id="turnado" name="turnado" multiple="multiple">
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="responsable">Responsable</label>
                            <select id="responsable" class="form-control" name="responsable">
                                <option>Persona 1</option>
                                <option>Persona 2</option>
                                <option>Persona 3</option>
                                <option>Persona 4</option>
                                <option>Persona 5</option>
                            </select>    
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="fecharecibido" >Fecha de recibido</label>
                            <input class="form-control" id="fecharecibido" type="date" name="fecharecibido">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label" for="horarecibido" >Hora de recibido</label>
                            <input class="form-control" id="horarecibido" type="time" name="horarecibido" value="<?php echo date("H:i");?>">
                        </div>
                    </div>    
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="offset-md-9 col-md-3 text-right">
        <button id="btn_guardar_ext" class="btn btn-primary"> Guardar</button>
        <button id="btn_enviar_ext" class="btn btn-success "type="submit"> Enviar</button>
    </div>
</div> 