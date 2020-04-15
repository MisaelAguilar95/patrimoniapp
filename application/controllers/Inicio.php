<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

require APPPATH. '/libraries/restclient.php';
class Inicio extends CI_Controller {

	private $api;

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->library('componentes');
		$this->load->helper(array('form', 'url'));

		$this->api = new RestClient([
			'base_url' => 'http://10.254.250.17/API_REST/api',
			'headers' => [
				'Ephylone'=>'doc',
				'Autorizacion' => $this->session->token],
			'format' => "json"
		]);
		$this->seguridad();
		}
		private function seguridad(){
			if(isset($_SESSION['token'])){
				if(!json_decode($this->api->GET('/validacion')->response)->status){
					$this->salir();
				}
			}
		
		else{
			$this->salir();
		}
	}

	private function response($arr){
		echo json_encode($arr);
	}

	//funcion para crear un selectg apartir de datos de la base
	public function crea_select($array,$id=null){
		$valores = '<option>Seleeciona</option>';
		//$array = json_decode($data);
        foreach ($array as $valor) {
            if ($id != null && $valor->id == $id)
               $valores .= '<option selected value="' . $valor->id . '">' . $valor->nombre . '</option>';
			else
               $valores .= '<option value="' . $valor->id . '">' . $valor->nombre . '</option>';
        }
        return $valores;
    }
		
	public function index(){
		$this->principal();
	}

	private function prepara($obj,$tipo=null){
		if($tipo == 'array')
			return json_encode((json_decode($obj->response,true)->data));
		else
			return json_decode($obj->response)->data;
	}

	private function principal(){
		$data['tabla'] = 'dbo.documentos';
		$data['consulta'] = "select * from dbo.documentos where remitente in('".$this->session->email."') OR (destinatario= '".$this->session->email."')";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);		
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('inicio/inicio',$data);
		$this->load->view('footer');
		$this->load->view('inicio/inicio_js',$data);
	}
	
	public function salir(){
		$this->session->sess_destroy();
		header('Location: '.base_url().'login/');
		exit;
	}	

	public function ver(){
		$data['tabla'] = 'c_tipos_documento';
		$data['campo_orden'] = 'nombre';
		//$resultado = $this->prepara($this->api->post('consulta', $data));
		//$data['tipos_documento'] = $this->crea_select($resultado);
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		$this->load->view('ver',$data);
		$this->load->view('footer');
		$this->load->view('nuevo/nuevo_js',$data);
	}


	public function nuevo_documento(){
		$data['tabla'] = 'dbo.c_destino';
		//$data['campo_orden'] = 'nombre';
		$data['consulta'] = "SELECT id,gerencia as nombre FROM dbo.c_destino order by gerencia ";
		$gerencias = json_decode($this->api->post('/ejecuta',$data)->response)->data;
		$data['gerencia_destino'] = $this->crea_select($gerencias);
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
		
		$this->load->view('pruebaform');
		$this->load->view('footer');
		// $data['menu'] = $this->componentes->menu();
		// $data['apps'] = $this->componentes->apps();
		// $data['noti'] = $this->componentes->notificaciones();
		// $data['card'] = $this->componentes->card();
		// $this->load->view('header',$data);
	}

	private function login(){
		$this->load->view('login/login');
	}

	public function conectar(){
		$par['usuario'] = $_GET['usuario'];
		$par['password'] = $_GET['password'];
		$this->api = new RestClient();
		var_dump($this->api->post('http://127.0.0.1/api_rest/autorizacion/inicio', 'POST', $par));
	}
	public function insertar(){
		if($_POST['asunto'] != ''|| $_POST['num_exp'] != ''|| $_POST['fecha_emision'] != ''||
			$_POST['fecha_limite'] != ''|| $_POST['remitente'] != ''|| $_POST['destinatario'] != ''){
			$_POST['fecha_creacion'] = date('Y-m-d');
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'documentos'));
			if($res['ban'])
				$this->response(array('msg'=>true));
			else
				$this->response(array('msg'=>false,'error'=>$res['error']));
		}
		else{
			$this->response(array('msg'=>false,'error'=>'Error al llenar el formulario'));
		}		
	}
	//Funcion para guadar los datos de un empleado
	public function save(){
		//cargamos configuraciones
		$config['upload_path'] = './frontend/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 1000;
		$config['file_name'] = md5(date('Y-m-d h:i:s'));
		//Cragamos libreria necesaria
		$this->load->library('upload', $config);
		//verificamos la carga del archivo
		if($this->upload->do_upload('cargar_pdf')){
			$_POST['pdf'] = $this->upload->data()['file_name'];
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'documentos'));
			if($res['ban'])
				$this->response(array('ban'=>true,'msg'=>'Documento creado'));
			else
				$this->response(array('ban'=>false,'msg'=>'Error al enviar','error'=>$res['error']));
		}
		else{
			$this->response(array('ban'=>false,'msg'=>'No existe Documento','error'=>$this->upload->display_errors()));
		}
	}
	
	public function actualizar(){
		if($_POST['documento'] != ''){
			$res = $this->api->post('/actualizar',array('datos'=>array('documento'=>$_POST['documento']),'tabla'=>'dbo.documentos','condicion'=>array('id'=>$_POST['id'])));
			if($res['ban'])
				$this->response(array('msg'=>true));
			else
				$this->response(array('msg'=>false,'error'=>$res['error']));
		}
	}

	public function elimina(){
		$res = $this->api->post('/eliminar',array('datos'=>$_POST,'tabla'=>'dbo.documentos'));
		if($res['ban'])
			$this->response(array('msg'=>true));
		else
			$this->response(array('msg'=>false,'error'=>$res['error']));
	}


	private function respuesta($data){
		var_dump($data->response);
	}

}
