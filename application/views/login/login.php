<!DOCTYPE html>
<html lang="es">
    <head>
    	<meta charset="utf-8" />
    	<title>SAS - DOC</title>
    	<link rel="icon" type="image/png" href="<?=base_url()?>frontend/images/favicon.png">
    	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    	<meta content="Jose Manuel, Misael Aguilar,Mauricio Ramirez" name="author" />
    	<meta content="Control de oficios y atentas notas" name="description" />
    	<!-- ================== BEGIN BASE CSS STYLE ================== -->
    	<link rel="stylesheet" href="<?=base_url()?>frontend/css/jquery-ui.min.css">
    	<link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/vendors.bundle.css">
    	<link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/app.bundle.css">
    	<!-- Optional: page related CSS-->
        <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/fa-brands.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner bg-brand-gradient">
                <div class="page-content-wrapper bg-transparent m-0">
                    <div class="flex-1" style="background: url(<?=base_url()?>frontend/images/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                            <br><br><br><br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                                                <img style="width:50px" src="<?=base_url()?>frontend/images/favicon.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                                <span class="page-logo-text mr-1"><h1>SAS-DOC</h1></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col hidden-sm-down">
                                                <h3 class="fs-xxl fw-500 mt-4 text-white">
                                                    Sistema de Administración y Seguimiento de Documentos
                                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                                        Nuevo sistema mejorado para la administración documental de la Comisión Nacional Forestal.
                                                    </small>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 mt-40">
                                    <div class="card p-4 mt-40 rounded-plus bg-faded">
                                        <form id="js-login" novalidate="">
                                            <div class="form-group " id="bloqueUsuario">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="username" name="usuario" autocomplete="off" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">@conafor.gob.mx</span>
                                                </div>
                                                </div>
                                                <div class="invalid-feedback">Escribe tu usuario.</div>
                                            </div>
                                            <div class="form-group" id="bloquePass" style="display:none;">
                                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Contraseña" value="" required>
                                                <div class="invalid-feedback">Escribe tu contraseña.</div>
                                                <div class="help-block">* Utiliza tu contraseña de CONAFOR</div>
                                            </div>
                                            <div class="row no-gutters">
                                                <div class="col-lg-12 pl-lg-1 my-2">
                                                    <button id="siguiente" type="button" class="btn btn-block btn-success btn-lg"><i class="ts-20 mr-10 fal fa-arrow-alt-right"></i> Siguiente</button>
                                                    
                                                    <button style="display:none;" id="js-login-btn" type="button" class="btn btn-block btn-success btn-lg"><i class="ts-20 mr-10 fal fa-sign-in"></i> Iniciar sesión</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url()?>frontend/js/vendors.bundle.js"></script>
        <script src="<?=base_url()?>frontend/js/app.bundle.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>

            $("#siguiente").attr('disabled',true);

            function togle (elementos){
                jQuery.each(elementos, function( i, val ) {
                    $( "#" + val ).toggle();
                });
            }

            $('#username').on('input',function(){
                if($('#username').val() != '' && $('#username').val() != null &&  $('#username').val().length > 4){
                    $("#siguiente").removeAttr('disabled');
                }
                else{
                    $("#siguiente").attr('disabled',true);
                }
            });

            $("#siguiente").click(function(){
                togle([ "bloqueUsuario", "siguiente", "bloquePass", "regresar", "js-login-btn" ])
            });

            $("#regresar").click(function(){
                togle(['bloquePass','regresar','js-login-btn','bloqueUsuario','siguiente']);
            });


            $("#js-login-btn").click(function(event){
                // Fetch form to apply custom Bootstrap validation
                var form = $("#js-login")
                if (form[0].checkValidity() === true){
                    event.preventDefault()
                    event.stopPropagation()

                    let data = form.serialize();
                    axios({
                        method: 'post',
                        url: 'http://187.218.230.37/API_REST/api/autorizacion',
                        data: data
                    })
                    .then(function (response) {
                        if(response.data.status == 200){
                        $.ajax({
                            method: 'post',
                            url: '<?=base_url()?>login/asigna_token',
                            data: {'data':response.data.data},
                        })
                        .then(function(){
                            window.location.href = '<?=base_url()?>inicio'
                        })
                        }
                        else{
                        sclose('Sin conexion aparente con el servidor','error')
                        }
                    })
                    .catch(function (error) {
                        sclose('Credenciales Incorrectas','error')
                    });
                }
                else{
                    form.addClass('was-validated');
                }
            });
        </script>
    </body>
</html>
