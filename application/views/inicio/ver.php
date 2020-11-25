<?php echo form_open_multipart('Inicio/save');?>
<div class="accordion accordion-hover" id="accordion">
    <div class="card">
        <div class="card-header">
            <a href="#" class="card-title collapsed bg-primary text-white"  data-target="#pest1" aria-expanded="false"><br>
                <i class="fas fa-map-marker-alt width-2"></i>Inmuebles
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
                <div class="row m-t-20">
                    <div class="col-md-4">
                        <h2><i class="fas fa-address-card width-2"></i>Generales</h2>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Nombre</label>
                        <input type="text" class="form-control"  readonly name="name" maxlength="100">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="direccion">Direccion</label>
                        <textarea name="full_address" class="form-control" readonly></textarea>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label for="nom_prop">Nombre del propietario</label>
                        <input type="text" class="form-control" name ="owner_name" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nom_prop">Compartido con</label>
                        <input type="text" class="form-control" name ="shared_property_name" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="RegFed">Registro de Inmueble en Uso de la Federación</label>
                        <input type="text" class="form-control" name ="federal_registration_code" readonly>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label" for="">Limitante de uso</label>
                        <input  class="form-control" name="limitations" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Estado legal</label>
                        <input name='description' type='text' class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" >Estado físico del inmueble</label>
                        <input class='form-control'name="physical_condition" readonly >
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-3">
                        <label class="form-label">Latitud</label>
                        <input type="text" class="form-control" readonly name="latitude">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Longitud</label>
                        <input type="text" class="form-control" readonly name="longitude">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Superficie de terreno (mts²)</label>
                        <input type="text" class="form-control" readonly name="land_area">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Superficie construida (mts²)</label>
                        <input type="text" class="form-control" readonly name="built_area">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label">Espacio real ocupado %</label>
                        <input type="text" class="form-control" readonly name="space_occupied_percentage">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Notas de GPS</label>
                        <input type="text" class="form-control" readonly name="gps_notes">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Acciones para su regularización</label>
                        <input type="text" class="form-control" readonly name="description">
                    </div>
                </div>
                <div class="row m-t-10">
                <div class="col-md-4">
                </div>
                    <div class="col-md-2">
                        <label class="form-label" for="fechaini">Fecha Inicio de Contrato</label>
                        <input class="form-control text-center" type="text"  name="inicio_contrato"value="<?php echo date("Y-m-d");?> " readonly>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label" for="fechafin">Fecha Fin de Contrato</label>
                        <input class="form-control text-center" type="text" name="fin_contrato"value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                </div>
                <br><hr>
                <div class="row m-t-20">
                    <div class="col-md-4">
                        <h2><i class="fas fa-chart-bar width-2"></i>Financiero</h2>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label">Valor de contrucción catastral</label>
                        <input type="numeric" class="form-control" readonly name="construction_catastral_value">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor de construcción paramétrico</label>
                        <input type="text" class="form-control" readonly name="construction_parametric_value">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor de construcción comercial</label>
                        <input type="text" class="form-control" readonly name="construction_commercial_value">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label">Valor de terreno catastral</label>
                        <input type="numeric" class="form-control" readonly name="land_catastral_value">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor de terreno paramétrico</label>
                        <input type="text" class="form-control" readonly name="land_parametric_value">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor de terreno comercial</label>
                        <input type="text" class="form-control" readonly name="land_commercial_value">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label">Valor de total catastral</label>
                        <input type="numeric" class="form-control" readonly name="total_catastral_value">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor de total paramétrico</label>
                        <input type="text" class="form-control" readonly name="total_parametric_value">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor de total comercial</label>
                        <input type="text" class="form-control" readonly name="total_commercial_value">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label" for="fechafin">Fecha de último avaluo catastral</label>
                        <input class="form-control" type="text" name="last_catastral_update_date"value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="fechafin">Fecha de último avaluo parametrico</label>
                        <input class="form-control" type="text" name="last_parametric_update_date"value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="fechafin">Fecha de último avaluo comercial</label>
                        <input class="form-control" type="text" name="last_commercial_update_date"value="<?php echo date("Y-m-d");?>" readonly>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-4">
                        <label class="form-label">Años de vida util</label>
                        <input type="numeric" class="form-control" readonly name="useful_life_years">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Porcentaje de depreciacion anual %</label>
                        <input type="text" class="form-control" readonly name="depreciation_percentage_yearly">
                    </div>
                </div>
                <br><hr>
                <div class="row m-t-20">
                    <div class="col-md-4">
                        <h2><i class="fas fa-user width-2"></i>Uso de Terceros</h2>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6">
                        <label class="form-label">Tipo de contrato</label>
                        <input type="text" class="form-control" readonly name="tipo_contrato">
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label">Fecha de inicio</label>
                        <input type="text" class="form-control" readonly name="fecha_i">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Fecha de fin</label>
                        <input type="text" class="form-control" readonly name="fecha_f">
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-6">
                        <label class="form-label">Nombre de ocupante</label>
                        <input type="text" class="form-control" readonly name="ocupante">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Uso</label>
                        <input type="text" class="form-control" readonly name="uso_espacio">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Superficie otorgada (mts²)</label>
                        <input type="text" class="form-control" readonly name="superficie_espacio">
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