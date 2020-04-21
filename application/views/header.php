<?php
    function fecha_esp(){
        $hoy=getdate();
        switch($hoy['mon']){
            case 1: $mes="Enero";
            break;
            case 2: $mes="Febrero";
            break;
            case 3: $mes="Marzo";
            break;
            case 4: $mes="Abril";
            break;
            case 5: $mes="Mayo";
            break;
            case 6: $mes="Junio";
            break;
            case 7: $mes="Julio";
            break;
            case 8: $mes="Agosto";
            break;
            case 9: $mes="Septiembre";
            break;
            case 10: $mes="Octubre";
            break;
            case 11: $mes="Noviembre";
            break;
            case 12: $mes="Diciembre";
            break;
        }
        switch($hoy['wday']){
            case 0: $dia="Domingo";
            break;
            case 1: $dia="Lunes";
            break;
            case 2: $dia="Martes";
            break;
            case 3: $dia="Miércoles";
            break;
            case 4: $dia="Jueves";
            break;
            case 5: $dia="Viernes";
            break;
            case 6: $dia="Sábado";
            break;
        }
        
        $fecha= array('dia'=>$dia, 'numDia'=>$hoy['mday'], 'mes'=>$mes, 'anio'=>$hoy['year']);
        return "Hoy es ".$fecha['dia']." ".$fecha['numDia']." de ".$fecha['mes']." de ".$fecha['anio'];
    }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>SAS - DOC</title>
	<link rel="icon" type="image/png" href="<?=base_url()?>frontend/images/favicon.png">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="Jose Manuel, Misael Aguilar,Mauricio Ramirez" name="author" />
	<meta content="Control de oficios y atentas notas" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link rel="stylesheet" href="<?=base_url()?>frontend/css/jquery-ui.min.css">
	<link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/app.bundle.css">
    <link href="<?=base_url()?>frontend/css/extra.css" rel="stylesheet">
	<!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/fa-brands.css">
    <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/fa-solid.css">
    <!-- Alerts -->
    <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/toastr.css">
    <!-- TABULATOR -->
    <link href="<?=base_url()?>frontend/css/tabulator.css" rel="stylesheet">
</head>
<body>
	<script>
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || 'Sapphire';
            if (themeSettings.themeOptions){
                classHolder.className = themeSettings.themeOptions;
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
    </script>
    <!-- BEGIN Page Wrapper -->
    <div class="page-wrapper">
        <div class="page-inner">
            <!-- BEGIN Left Aside -->
            <aside class="page-sidebar ">
                <div class="page-logo">
                    <a class="d-flex" >
                        <img src="<?=base_url()?>frontend/images/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                        <span class="page-logo-text mr-1">SAS-DOC</span>
                    </a>
                </div>
                <!-- BEGIN PRIMARY NAVIGATION -->
                <nav id="js-primary-nav" class="primary-nav" role="navigation">
                <!-- <div class="info-card">
                        <div class="info-card-text">
                            <span class="text-truncate text-truncate-sm d-inline-block"><?=$this->session->nombre_completo?> </span>
                            <br><span class="text-truncate text-truncate-sm d-inline-block"><?=$this->session->puesto?></span>
                            <br><span class="text-truncate text-truncate-sm d-inline-block"><?=$this->session->gerencia?></span>
                            <br><span class="text-truncate text-truncate-sm d-inline-block"><?=$this->session->coordinacion?></span>
                            <br><span class="text-truncate text-truncate-sm d-inline-block"><?=$this->session->num_emp?></span>
                        </div>
                        <img src="<?=base_url()?>frontend/images/cover-2-lg.png" class="cover" alt="cover">
                    </div> -->
                    <!-- MENU -->
                    <?=$menu['cuerpo'];?>
                    <!-- <div class="filter-message js-filter-message bg-success-600"></div> -->
                </nav>
                <!-- END PRIMARY NAVIGATION -->
			</aside>
			<!-- END Left Aside -->
            <div class="page-content-wrapper">
                <!-- BEGIN Page Header -->
                <header class="page-header" role="banner">
                    <!-- we need this logo when user switches to nav-function-top -->
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center" data-toggle="modal" data-target="#modal-shortcut">
                            <img src="<?=base_url()?>frontend/images/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- DOC: nav menu layout change shortcut -->
                    <div class="hidden-md-down dropdown-icon-menu position-relative">
                        <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                            <i class="ni ni-menu"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                    <i class="ni ni-minify-nav"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                    <i class="ni ni-lock-nav"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- DOC: mobile button appears during mobile width -->
                    <div class="hidden-lg-up">
                        <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                            <i class="ni ni-menu"></i>
                        </a>
                    </div>
                    <!-- ICONOS SUPERIORES DERECHOS -->
                    <div class="ml-auto d-flex">
                        <?=$apps;?>
                        <?=$noti;?>
                        <?=$card;?>
                    </div>
                    <!-- END ICONOS SUPERIORES DERECHOS -->
                </header>
				<!-- END Page Header -->
				<!-- BEGIN Page Content -->
                <!-- the #js-page-content id is needed for some plugins to initialize -->
                <main id="js-page-content" role="main" class="page-content">
                    <div class="subheader">
                        <h1 class="subheader-title">
                            <i class='subheader-icon fal <?=$menu['icono']?>'></i> 
                            <?=$menu['titulo'];?>
                            <small class="text-truncate">
                                <?=$menu['descripcion'];?>
                            </small>
                            
                        </h1>
                    <li class="position-absolute pos-top pos-right d-none d-sm-block"><i class="fa fa-user m-r-5"> :</i><?=$this->session->nombre_completo?> / <i class="fa fa-cube m-r-5"></i> : <?=$this->session->gerencia?></li>
                        <li class="pos-top pos-right d-none d-sm-block"><span class="js-get-date"><?=fecha_esp();?></span></li>
                    </div>
                    
                    <hr>
                    