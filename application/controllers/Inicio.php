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

	//funcion para crear un select apartir de datos de la base
	public function crea_select($array,$id=null){
		$valores = '<option value="">Selecciona</option>';
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
								DOC.fecha_emision,
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
								DOC.fecha_emision,
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
		$data['consulta'] = "SELECT id ,nombre as nombre FROM catalogos.c_indicacion order by nombre ";
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
		//$data['tabla'] = 'dbo.documentos';
		$data['consulta'] = "SELECT 
		SEG.id,
		num_doc,
		id_seguimiento,
		notas,
		remitente,
		destinatario,
		EST_r.nombre as estatus,
		fecha
		FROM
		seguimiento SEG
		LEFT JOIN catalogos.c_estatus_general EST_r ON EST_r.id = SEG.estatus_r
		WHERE remitente in ('".$this->session->email."')

		UNION ALL
		SELECT 
		SEG.id,
		num_doc,
		id_seguimiento,
		notas,
		remitente,
		destinatario,
		EST_d.nombre as estatus,
		fecha
		FROM
		seguimiento SEG
		LEFT JOIN catalogos.c_estatus_general EST_d ON EST_d.id = SEG.estatus_d
		WHERE destinatario in ('".$this->session->email."')
		";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		$this->load->view('bitacora/bitacora',$data);
		$this->load->view('footer');
		$this->load->view('funciones');
		$this->load->view('bitacora/bitacora_js',$data);

		
	}
	public function documentacion(){
		$this->load->view('documentacion');
		
	}
	public function reportes(){
		$data = $this->basicas();
		$data['consulta'] = "SELECT 
		estatus_r
		FROM
		seguimiento
		WHERE estatus_r = 1 AND remitente in ('".$this->session->email."')";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		$data['consulta'] = "SELECT 
		estatus_d
		FROM
		seguimiento
		WHERE estatus_d = 2 AND destinatario in ('".$this->session->email."')";
		$data['datos2'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		$data['consulta'] = "SELECT 
		estatus_r
		FROM
		seguimiento
		WHERE estatus_r = 6 AND remitente in ('".$this->session->email."')";
		$data['datos3'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		$data['consulta'] = "SELECT 
		estatus_r
		FROM
		seguimiento
		WHERE estatus_r = 3 AND remitente in ('".$this->session->email."')";
		$data['datos4'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		$this->load->view('reportes/reportes',$data);
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

	private function carga_archivo($nombre,$tam,$tipo,$path,$acro){
		$config['upload_path'] = $path;
        $config['allowed_types'] = $tipo;
        $config['max_size'] = $tam;
		$config['file_name'] = $acro.'_'.md5(date('Y-m-d h:i:s'));
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if($this->upload->do_upload($nombre))
			return array('ban'=>true,'file_name'=>$config['file_name']);
		else
			return array('ban'=>false);
	}

	public function save(){
		$file = $this->carga_archivo('cargar_pdf',1000,'pdf','./frontend/pdf/','pdf');
		
		if($file['ban']){
			$_POST['pdf'] = $file['file_name'];
			$file2 = $this->carga_archivo('carga_anexo',1000,'pdf','./frontend/anexos/','anexo');
			if($file2['ban'])
				$_POST['carga_anexo'] = $file2['file_name'];
				$file3 = $this->carga_archivo('carga_anexo2',1000,'pdf','./frontend/anexos/','anexo2');
			if($file3['ban'])
				$_POST['carga_anexo2'] = $file3['file_name'];
				$file4 = $this->carga_archivo('carga_anexo3',1000,'pdf','./frontend/anexos/','anexo3');
			if($file4['ban'])
				$_POST['carga_anexo3'] = $file4['file_name'];
				$file5 = $this->carga_archivo('carga_anexo4',1000,'pdf','./frontend/anexos/','anexo4');
			if($file5['ban'])
				$_POST['carga_anexo4'] = $file5['file_name'];
			$_POST['remitente'] = $this->session->email;
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'documentos'));				
			if($res['ban']){
				$id_insertado = $res['id_insertado'];
				$data['remitente'] = $_POST['remitente'];
				$data['notas'] = $_POST['notas'];
				$data['num_doc'] = $_POST['num_doc'];
				$data['fecha'] = date('Y-m-d');
				$data['destinatario'] = $_POST['destinatario'];
				$data['id_seguimiento'] = $id_insertado;
				$res2 = $this->api->post('/insertar',array('datos'=>$data,'tabla'=>'seguimiento'));
				if($res2['ban']){
					$this->api->post('/mail',array('mensaje'=>'Haz recibido una notificación, ingresa a : http://187.218.230.37/sasdoc/login/ Para atenderla. '
						."<br />".'Fecha Límite: '.$_POST['fecha_limite'].'<br/>'.'Número de Oficio: '.$_POST['num_doc'].'<br />'.'Asunto : '.$_POST['asunto'].'<br />'.' Remitente: '.$_POST['remitente'],
						'email_destino'=>$_POST['destinatario'], 'asunto'=>'Notificación de SAS-DOC'));
					header('Location: '.base_url().'inicio/');
					//$this->principal();
				}
				else{
					$this->response(array('ban'=>false,'msg'=>'Error al enviar #1','error'=>$res['error']));
					
				}
			}
			else{
				echo'<script type="text/javascript">
					alert("ERROR al enviar: Llenar los campos obligatorios, marcados con un : *");
					window.location.href="nuevo_documento";
				</script>';
				
			}
		}
		else{
			echo'<script type="text/javascript">
					alert("ERROR al enviar: Seleccionar un documento PDF");
					window.location.href="nuevo_documento";
   				</script>';
		}
	}

	public function turnar(){
		if(isset($_POST)){
			$_POST['remitente'] = $this->session->email;
			$_POST['estatus_r'] = 3;
			$_POST['fecha'] = date('Y-m-d');
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'seguimiento'));
			if(!$res['ban']){
				$this->response(array('ban'=>false,'msg'=>'Error al enviar','error'=>$res['error']));
			}
		}
		//header('Location: '.base_url().'inicio/');
		//$this->principal();
	}
	
	public function atendido(){
		if(isset($_POST)){
			$_POST['remitente'] = $this->session->email;
			$_POST['estatus_r'] = 6;
			$_POST['fecha'] = date('Y-m-d');
			$res = $this->api->post('/insertar',array('datos'=>$_POST,'tabla'=>'seguimiento'));
			if(!$res['ban']){
				$this->response(array('ban'=>false,'msg'=>'Error al enviar','error'=>$res['error']));
			}
		}
		header('Location: '.base_url().'inicio/');
		//$this->principal();
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
