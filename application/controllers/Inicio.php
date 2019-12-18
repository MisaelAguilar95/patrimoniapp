<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

require APPPATH. '/libraries/restclient.php';
class Inicio extends CI_Controller {

	private $api;
	//Constructor
	function __construct(){
		parent::__construct();
	}

	public function index(){
		if(isset($this->session->data_info['token'])){
			$this->load->library('componentes');
			$this->principal();
		}else
			$this->login();
	}

	private function desagregado($obj){
		var_dump($obj);
		//return json_encode(json_decode($obj->response)->data);
	}


	private function principal(){
		//$result = $this->api->get("consulta/catalogo_usuarios/1/20");
		//$data['datos'] = $this->desagregado($result);
		$data['titulos'] = '[ {title:"Name", field:"id"},
		{title:"Progress", field:"nombre", align:"center", sorter:"number"},
		{title:"Gender", field:"gender"},
		{title:"Rating", field:"rating", align:"center"},
		{title:"Favourite Color", field:"col"},
		{title:"Date Of Birth", field:"dob", align:"center", sorter:"date"},
		{title:"Acciones", formatter:printIcon,  align:"center"}]';
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('inicio/inicio');
		$this->load->view('footer');
		$this->load->view('inicio/inicio_js',$data);
	}

	public function nuevo_documento(){
		$this->load->library('componentes');
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('nuevo/nuevo');
		$this->load->view('footer');
		$this->load->view('nuevo/nuevo_js',$data);
	}

	public function nuevo_ext(){
		$this->load->library('componentes');
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('nuevo/nuevo_ext');
		$this->load->view('footer');
		$this->load->view('nuevo/nuevo_ext_js',$data);
	}

	public function bitacora(){
		$this->load->library('componentes');
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('bitacora/bitacora');
		$this->load->view('footer');
		$this->load->view('bitacora/bitacora_js',$data);
	}

	public function reportes(){
		$this->load->library('componentes');
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('reportes/reportes');
		$this->load->view('footer');
		$this->load->view('reportes/reportes_js',$data);
	}

	public function perfiles(){
		$this->load->library('componentes');
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('perfiles/perfiles');
		$this->load->view('footer');
		$this->load->view('perfiles/perfiles_js',$data);
	}

	public function form(){
		$datos = $_POST;
		// $data['menu'] = $this->componentes->menu();
		// $data['apps'] = $this->componentes->apps();
		// $data['noti'] = $this->componentes->notificaciones();
		// $data['card'] = $this->componentes->card();
		// $this->load->view('header',$data);
		$this->load->view('pruebaform');
		$this->load->view('footer');
	}

	private function login(){
		$this->load->view('login/login');
	}

	public function conectar(){
		$par['usuario'] = $_GET['usuario'];
		$par['password'] = $_GET['password'];
		$this->api = new RestClient();
		var_dump($this->api->post('http://127.0.0.1:8005/api_rest/autorizacion/inicio', 'POST', $par));
	}	

}
