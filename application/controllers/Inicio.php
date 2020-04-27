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
		$valores = '<option>Selecciona</option>';
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

	private function basicas(){
		$data['menu'] = $this->componentes->menu();
		$data['apps'] = $this->componentes->apps();
		$data['noti'] = $this->componentes->notificaciones();
		$data['card'] = $this->componentes->card();
		$this->load->view('header',$data);
		return $data;
	}

	private function principal(){		
		$data = $this->basicas();
		//$data['tabla'] = 'dbo.documentos';
		$data['consulta'] = "SELECT
								DOC.id,
								DOC.num_doc,
								SEG.remitente,
								SEG.destinatario,
								DOC.asunto,
								DOC.fecha_limite,
								SEG.estatus_r as estatus
							FROM
								dbo.documentos DOC
							LEFT JOIN vw_seguimiento SEG ON SEG.id_seguimiento = DOC.id 
							WHERE SEG.remitente in ('".$this->session->email."')
							
							UNION ALL
							SELECT
							DOC.id,
							DOC.num_doc,
								SEG.remitente,
								SEG.destinatario,
								DOC.asunto,
								DOC.fecha_limite,
								SEG.estatus_d as estatus
							FROM
								dbo.documentos DOC
							LEFT JOIN vw_seguimiento SEG ON SEG.id_seguimiento = DOC.id 
							WHERE SEG.destinatario in ('".$this->session->email."')";
							
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		$this->load->view('inicio/inicio',$data);
		$this->load->view('footer');
		$this->load->view('funciones');
		$this->load->view('inicio/inicio_js',$data);
		
	}
	
	public function salir(){
		$this->session->sess_destroy();
		header('Location: '.base_url().'login/');
		exit;
	}	

	public function ver($id){
		//var_dump($data['oficio']);
		//$data['tipos_documento'] = $this->crea_select($resultado);
		$data = $this->basicas();
		$data['tabla'] = 'dbo.vw_documentos';
		$data['condicion'] = array('id'=>$id);
		$data['oficio'] = json_encode(json_decode($this->api->post('consulta_unica', $data)->response)->data);
		//var_dump($data['oficio']);
		$this->load->view('inicio/ver',$data);
		$this->load->view('footer');
		$this->load->view('inicio/ver_js',$data);
	}


	public function nuevo_documento(){
		//$data['tabla'] = 'dbo.c_destino';
		//$data['campo_orden'] = 'nombre';
		$data = $this->basicas();
		$data['consulta'] = "SELECT id ,nombre as nombre FROM catalogos.c_tipos_documento order by nombre ";
		$nombre = json_decode($this->api->post('/ejecuta',$data)->response)->data;
		$data['tipos_documento'] = $this->crea_select($nombre);
		$data['consulta'] = "SELECT id ,nombre as nombre FROM catalogos.indicacion order by nombre ";
		$nombre = json_decode($this->api->post('/ejecuta',$data)->response)->data;
		$data['tipo_indicacion'] = $this->crea_select($nombre);
		$data['consulta'] = "SELECT id,gerencia as nombre FROM catalogos.c_destino order by gerencia ";
		$gerencias = json_decode($this->api->post('/ejecuta',$data)->response)->data;
		$data['gerencia_destino'] = $this->crea_select($gerencias);
		$this->load->library('componentes');
		$this->load->view('nuevo/nuevo',$data);
		$this->load->view('footer');
		$this->load->view('nuevo/nuevo_js',$data);
	}

	public function nuevo_ext(){
		$data = $this->basicas();
		$this->load->library('componentes');
		$this->load->view('nuevo/nuevo_ext');
		$this->load->view('footer');
		$this->load->view('nuevo/nuevo_ext_js',$data);
	}

	public function bitacora(){
		$data = $this->basicas();
		$this->load->view('bitacora/bitacora');
		$this->load->view('footer');
		$this->load->view('bitacora/bitacora_js',$data);
	}
	public function documentacion(){
		$this->load->view('documentacion');
		
	}
	public function reportes(){
		$data = $this->basicas();
		$this->load->view('reportes/reportes');
		$this->load->view('footer');
		$this->load->view('reportes/reportes_js',$data);
	}

	public function perfiles(){
		$data = $this->basicas();
		$this->load->view('perfiles/perfiles');
		$this->load->view('footer');
		$this->load->view('perfiles/perfiles_js',$data);
	}

	private function login(){
		$this->load->view('login/login');
	}

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
			
			if($res['ban']){
				$id_insertado = $res['id_insertado'];
				$data['remitente'] = $_POST['remitente'];
				$data['destinatario'] = $_POST['destinatario'];
				$data['id_seguimiento'] = $id_insertado;
				$res2 = $this->api->post('/insertar',array('datos'=>$data,'tabla'=>'seguimiento'));
				if($res2['ban']){
					$this->principal();
				}
				else{
					$this->response(array('ban'=>false,'msg'=>'Error en el if 1','error'=>$res['error']));
				}
			}
			else{
				$this->response(array('ban'=>false,'msg'=>'Error en el if 2','error'=>$res['error']));
				var_dump($res2);
			}
		}
		else{
			$this->response(array('ban'=>false,'msg'=>'No existe Documento','error'=>$this->upload->display_errors()));
		}
	
	}

	public function turnar(){
		if(isset($_POST)){
			$_POST['remitente'] = $this->session->email;
			$_POST['estatus_r'] = 3;
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'seguimiento'));
			if(!$res['ban']){
				$this->response(array('ban'=>false,'msg'=>'Error al enviar','error'=>$res['error']));
			}
		}
		$this->principal();
	}
	
	public function atendido(){
		if(isset($_POST)){
			$_POST['remitente'] = $this->session->email;
			$_POST['estatus_r'] = '6';
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'seguimiento'));
			if(!$res['ban']){
				$this->response(array('ban'=>false,'msg'=>'Error al enviar','error'=>$res['error']));
			}
		}
		$this->principal();
	}
	
	public function contestar(){
		$data = $this->basicas();
		$data['consulta'] = "SELECT id ,nombre as nombre FROM catalogos.c_tipos_documento order by nombre ";
		$nombre = json_decode($this->api->post('/ejecuta',$data)->response)->data;
		$data['tipos_documento'] = $this->crea_select($nombre);
		$data['consulta'] = "SELECT id,gerencia as nombre FROM catalogos.c_destino order by gerencia ";
		$gerencias = json_decode($this->api->post('/ejecuta',$data)->response)->data;
		$data['gerencia_destino'] = $this->crea_select($gerencias);
		$this->load->library('componentes');
		$this->load->view('nuevo/nuevo',$data);
		$this->load->view('footer');
		$this->load->view('nuevo/nuevo_js',$data);
	}


}
