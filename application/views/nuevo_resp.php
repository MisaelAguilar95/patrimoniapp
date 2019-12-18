<div class="accordion accordion-hover" id="accordion">
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0);" class="card-title collapsed bg-primary text-white" data-toggle="collapse" data-target="#pest1" aria-expanded="false">
                    <i class="fas fa-file width-2"></i>Nuevo Documento
                    <span class="ml-auto">
                        <span class="collapsed-reveal">
                            <i class="fal fa-chevron-up fs-xl"></i>
                        </span>
                        <span class="collapsed-hidden">
                            <i class="fal fa-chevron-down fs-xl"></i>
                        </span>
                    </span>
                </a>
            </div>
            <div id="pest1" class="collapse " data-parent="#accordion">
                <div class="card-body bg-gray-dark">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="documento">N° de oficio / Documento</label>
                            <input type="text" disabled class="form-control" id="documento" name="num_oficio">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="expediente">Expediente</label>
                            <input type="text" class="form-control" id="expediente" placeholder="Ingrese el número de expediente" name="expediente" maxlength="10">
                        </div>
                        <div class="form-group col-md-6">
                                        <label for="asunto">Asunto</label>
                                        <input type="text" class="form-control" id="asunto" placeholder="Ingrese el asunto del documento" name="asunto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                                        <label for="tipodoc">Tipo de documento</label>
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
                                        <input class="form-control" id="fechaemision" type="date" name="fechaemision" value="2023-07-23">
                        </div>   
                        <div class="form-group col-md-3">
                                        <label class="form-label" for="fechaseguimiento">Fecha Límite</label>
                                        <input class="form-control" id="fechaseguimiento" type="date" name="fechalimite" value="2023-07-23">
                        </div>                   
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-4">
                                        <label for="remitente">Remitente</label>
                                        <input type="text" class="form-control" id="remitente" disabled name="remitente">
                                        <label class="m-t-10" for="destinatario">Destinatario</label>
                                        <select id="destinatario" class="form-control" name="destinatario">
                                            <option>Persona 1</option>
                                            <option>Persona 2</option>
                                            <option>Persona 3</option>
                                            <option>Persona 4</option>
                                            <option>Persona 5</option>
                                        </select>
                        </div>
                        <div class="form-group col-md-4">
                                        <label class="form-label" for="concopia">CC</label>
                                        <select class="multiple-select2 form-control" id="concopia" name="concopia" multiple="multiple">
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
                        <div class="form-group col-md-4">
                                        <label class="form-label" for="anexos">N° de Anexos y Descripción</label>
                                        <textarea class="form-control" id="anexos" placeholder="Describa los anexos si existen" name="anexos" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="form-group col-md-8">
                            <label class="form-label" for="nota">Nota</label>
                            <textarea class="form-control" id="nota" placeholder="Escriba una nota" name="nota" rows="5"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label class="form-label">Archivo</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="archivo">
                                <label class="custom-file-label" for="customFile">Elegir Archivo</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card">
            <div class="card-header">
                <a href="javascript:void(0);" class="card-title collapsed bg-primary text-white" data-toggle="collapse" data-target="#pest2" aria-expanded="false">
                    <i class="fal fa-edit width-2 "></i>Editor de Documento
                    <span class="ml-auto">
                        <span class="collapsed-reveal">
                            <i class="fal fa-chevron-up fs-xl"></i>
                        </span>
                        <span class="collapsed-hidden">
                            <i class="fal fa-chevron-down fs-xl"></i>
                        </span>
                    </span>
                </a>
            </div>
            <div id="pest2" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    <br>
                    <div class="row">
                    <div class="col-md-12">
                    <textarea class="" name="editor1" id="editor1"></textarea>
                    </div>
                    </div>
                    <br><br>
                </div>
            </div>
        </div> -->
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0);" class="card-title collapsed bg-primary text-white" data-toggle="collapse" data-target="#pest3" aria-expanded="false">
                    <i class="fas fa-file-import width-2 "></i>
                     Recepción de Documento
                    <span class="ml-auto">
                        <span class="collapsed-reveal">
                            <i class="fal fa-chevron-up fs-xl"></i>
                        </span>
                        <span class="collapsed-hidden">
                            <i class="fal fa-chevron-down fs-xl"></i>
                        </span>
                    </span>
                </a>
            </div>
            <div id="pest3" class="collapse" data-parent="#accordion">
                <div class="card-body bg-gray-dark">
                   <div class="row">
                   <div class="form-group col-md-3">
                    <label class="form-label" for="fecharecepcion">Fecha de Recepción</label>
                    <input class="form-control" id="fecharecepcion" type="date" name="fecharecepcion" value="2023-07-23">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="horarecepcion">Hora de recepción</label>
                    <input class="form-control" id="horarecepcion" type="time" name="horarecepcion" value="2023-07-23">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechaturnado">Fecha de Turnado</label>
                    <input class="form-control" id="fechaturnado" type="date" name="fechaturnado" value="2023-07-23">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label" for="fechaseguimiento">Fecha Seguimiento</label>
                    <input class="form-control" id="fechaseguimiento" type="date" name="fechaseguimiento" value="2023-07-23">
                </div>
                <div class="form-group col-md-6">
                    <label for="seguimiento">Seguimiento a cargo de</label>
                    <input type="text" class="form-control" id="seguimiento" placeholder="A cargo de" name="seguimiento">
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label" for="turnado">Turnado a</label>
                    <textarea class="form-control" id="turnado" placeholder="Turnado a:" name="turnado" rows="5"></textarea>
                </div>
                   </div>
            </div>
        </div>
        </div>
    <br>
        <div class="row">
            <div class="offset-md-9 col-md-3 text-right">
            <button class="btn btn-primary"> Guardar</button>
                    <button class="btn btn-success"> Enviar</button>
            </div>
        </div>