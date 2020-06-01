<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Componentes {
	
	private function valida_menu(){
		$url = $_SERVER['PHP_SELF'];
		$titulo_m = '';
		$descripcion = '';
		$fa_icon = '';
		$inicio_m = '';
		$documentos_m = '';
		$documentos_m_nuevo = '';
		$documentos_m_recibido = '';
		$bitacora_m = '';
		$reportes_m = '';
		$perfiles_m = '';


		switch (true) {
			case strpos($url, 'nuevo_documento') !== false:
				$documentos_m = 'active';
				$documentos_m_nuevo = 'active';
				$fa_icon = 'fa-file';
				$titulo_m = 'Nuevo Documento';
				$descripcion = 'Módulo para generar nuevo documento';
			break;
			case strpos($url, 'nuevo_ext') !== false:
				$documentos_m = 'active';
				$documentos_m_recibido = 'active';
				$fa_icon = 'fa-file';
				$titulo_m = 'Documento Externo';
				$descripcion = 'Módulo para generar nuevo documento externo';
			break;
			case strpos($url, 'bitacora') !== false:
				$bitacora_m = 'active';
				$fa_icon = 'fa-history';
				$titulo_m = 'Bitacora de Movimientos';
				$descripcion = 'Módulo para ver el registro de todos los movimientos en SAS-DOC';
			break;
			case strpos($url, 'reportes') !== false:
				$reportes_m = 'active';
				$fa_icon = 'fa-table';
				$titulo_m = 'Reportes';
				$descripcion = 'Módulo para descargar los reportes de los movimientos en SAS-DOC';
			break;
			case strpos($url, 'perfiles') !== false:
				$perfiles_m = 'active';
				$fa_icon = 'fa fa-user-circle';
				$titulo_m = 'Perfiles de Usuario';
				$descripcion = 'Módulo para gestionar perfiles de usuario';
			break;
			default:
				$titulo_m = "Inicio";
				$fa_icon= 'fa fa-home';
				$descripcion = 'Página de inicio y menú principal';
				$inicio_m = 'active';
			break;
		}

		$cuerpo = '<ul id="js-nav-menu" class="nav-menu">
		<li>
			<li class="'.$inicio_m.'">
				<a href="'.base_url().'" title="Listado de Documentos" >
					<i class="fal fa-home"></i>
					<span class="nav-link-text">Inicio</span>
				</a>
			</li>
			<li class="open '.$documentos_m.'">
				<a href="#" title="Nuevo Documento" >
					<i class="fal fa-file"></i>
					<span class="nav-link-text" >Documentos</span>
				</a>
				<ul>
					<li class="'.$documentos_m_nuevo.'">
                        <a href="'.base_url().'inicio/nuevo_documento" title="Crear Nuevo Documento">
							<span class="nav-link-text">Nuevo Documento</span>
						</a>
					</li>
				</ul>
            </li>
             <li class="nav-title">Herramientas</li>
			 <li class="'.$bitacora_m.'">
			 	    <a href="'.base_url().'inicio/bitacora"  title="Bitacora">
                        <i class="fal fa-history"></i>
			 		    <span class="nav-link-text">Bitacora de eventos</span>
			 	    </a>
             </li>
			 <li class="'.$reportes_m.'">
			 	<a href="'.base_url().'inicio/reportes" title="Reportes">
                    <i class="fal fa-table"></i>
			 		<span class="nav-link-text" data-i18n="nav.tables">Reportes</span>
                 </a>
             </li>
             
		</li>					   
	</ul>';
	//PERFILES DE USUARIO
	/* <li class="'.$perfiles_m.'">
                 <a href="'.base_url().'inicio/perfiles" title="Perfiles de Usuario" >
                    <i class="fal fa-user-circle"></i>
			 		<span class="nav-link-text" data-i18n="nav.tables">Perfiles de Usuario</span>
                 </a>
    </li> */
		return array('url'=>$url,'titulo'=>$titulo_m,'descripcion'=>$descripcion, 'icono'=>$fa_icon,'cuerpo'=>$cuerpo);
	}

	public function menu(){
		return $this->valida_menu();
	}

	public function apps(){
		return '<div>
		<a href="#" class="header-icon" data-toggle="dropdown" title="My Apps">
			<i class="fal fa-cube"></i>
		</a>
		<div class="dropdown-menu col-md-4 dropdown-menu-animated w-auto h-auto">
			<div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
				<h4 class="m-0 text-center color-white">
					Aplicaciónes
					<small class="mb-0 opacity-80">Aplicaciones del Usuario</small>
				</h4>
			</div>
			<div class="custom-scroll h-100">
				<ul class="app-list">
					<li>
						<a href="#" class="app-list-item hover-white">
							<span class="icon-stack">
								<img class="img" src="'.base_url().'frontend/images/directorio.png">
							</span>
							<span class="app-list-name">
								Directorio
							</span>
						</a>
					</li>
					<li>
						<a href="http://intranet.cnf.gob.mx:8080/controldeasistencia" target="_blank" class="app-list-item hover-white">
							<span class="icon-stack">
								<img class="img" src="'.base_url().'frontend/images/control_asis.png">
							</span>
							<span class="app-list-name">
								C. Asistencia
							</span>
						</a>
					</li>
					<li>
						<a href="http://www.cnf.gob.mx:8080/si/" target="_blank" class="app-list-item hover-white">
							<span class="icon-stack">
								<img class="img" src="'.base_url().'frontend/images/si.png">
							</span>
							<span class="app-list-name">
								S.I.
							</span>
						</a>
					</li>
					<li>
						<a href="http://intranet.cnf.gob.mx:8080/sisserv/" target="_blank" class="app-list-item hover-white">
							<span class="icon-stack">
								<img class="img" src="'.base_url().'frontend/images/sisserv.png">
							</span>
							<span class="app-list-name">
								SISSERV
							</span>
						</a>
					</li>
					<li>
						<a href="https://webmail.conafor.gob.mx/owa/" target="_blank" class="app-list-item hover-white">
							<span class="icon-stack">
								<img class="img" src="'.base_url().'frontend/images/owa.png">
							</span>
							<span class="app-list-name">
								CONAFOR Mail
							</span>
						</a>
					</li>
					<li>
						<a href="http://siiac.cnf.gob.mx" target="_blank" class="app-list-item hover-white">
							<span class="icon-stack">
								<img class="img" src="'.base_url().'frontend/images/siiac.png">
							</span>
							<span class="app-list-name">
								SIIAC
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>';
	}

	public function notificaciones(){
		return '<div>
					<a href="#" class="header-icon" data-toggle="dropdown" title="You got 0 notifications">
						<i class="fal fa-bell"></i>
						<span class="badge bg-info badge-icon">0</span>
					</a>
					<div class="dropdown-menu dropdown-menu-animated dropdown-xl">
						<div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center rounded-top">
							<h4 class="m-0 text-center color-white">
								0 Nuevas
								<small class="mb-0 opacity-80">Notificaciones</small>
							</h4>
						</div>

						<div class="tab-content tab-notification">
							<div class="tab-pane active" id="tab-feeds" role="tabpanel">
								<div class="custom-scroll h-100">
									<ul class="notification">
										<li class="unread">
										</li>
										<li>
											<div class="d-flex align-items-center show-child-on-hover">
												
												<div class="show-on-hover-parent position-absolute pos-right pos-bottom p-3">
													<a href="#" class="text-muted" title="delete"><i class="fal fa-trash-alt"></i></a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>';
	}

	public function card(){
		return '<div class="header-icon " style="font-size:23px;margin-top:3px"><a href="'.base_url().'inicio/salir"><i class="fa fa-power-off"></i></a></div>';

				
	}

}
?>

