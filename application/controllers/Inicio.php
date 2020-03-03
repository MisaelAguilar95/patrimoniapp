<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

require APPPATH. '/libraries/restclient.php';
class Inicio extends CI_Controller {

	private $api;

	//Constructor
	function __construct(){
		parent::__construct();
		$this->api = new RestClient([
			'base_url' => "http://127.0.0.1:8005/api_rest/api",
			'headers' => ['Ephylone'=>'sas-doc']
		]);
	}

	public function index(){
		// if(isset($this->session->data_info['token'])){
		// 	$this->load->library('componentes');
		// 	$this->principal();
		// }else
		// 	$this->login();
		$this->load->library('componentes');
		$this->principal();
	}

	private function prepara($obj,$tipo=null){
		if($tipo == 'array')
			return json_encode((json_decode($obj->response)->data));
		else
			return json_decode($obj->response)->data;
	}

	private function crea_select($obj){
		$result = '<option></option>';
		for ($i=0; $i < count($obj); $i++){
			$result .= '<option  >'.$obj[$i]->nombre.'</option>';
		}
		return $result;
	}

	private function principal(){
		$data['tabla'] = 'dbo.vw_documentos';
		$data['datos'] = $this->prepara($this->api->post('consulta', $data),'array');
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
		$data['tabla'] = 'catalogos.c_tipos_documento';
		$data['campo_orden'] = 'nombre';
		$resultado = $this->prepara($this->api->post('consulta', $data));
		$data['tipos_documento'] = $this->crea_select($resultado);
		$this->load->library('componentes');
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('nuevo/nuevo',$data);
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

	private function respuesta($data){
		var_dump($data->response);
	}

}
