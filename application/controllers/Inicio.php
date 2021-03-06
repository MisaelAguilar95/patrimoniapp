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
				'Ephylone'=>'patrimonial',
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
		$data['consulta'] = "select * from vw_inmuebles 
		where fin_contrato >= to_date('00-01-2020 21:24:00', 'dd-mm-yyyy hh24:mi:ss') order by name ";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		//var_dump($data['datos']);
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
		$data['tabla'] = 'public.vw_inmuebles';
		$data['condicion'] = array('id_real_estate'=>$id);
		$data['oficio'] = json_encode(json_decode($this->api->post('consulta_unica', $data)->response)->data);
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
	public function actualizar(){
		if($_POST['ocupante'] != ''){
			//$_POST['email'] = $this->session->email;
			$condicion = array('id_real_estate'=>$_POST['id']);
			$data = array('ocupante' => $_POST['ocupante'],'tipo_contrato'=>$_POST['tipo_contrato'], 
					'fecha_i'=>$_POST['fecha_i'],'fecha_f'=>$_POST['fecha_f'],'uso_espacio'=>$_POST['uso_espacio'],
					'superficie_espacio'=>$_POST['superficie_espacio'],'ocupante2'=>$_POST['ocupante2'],'tipo_contrato2'=>$_POST['tipo_contrato2'],
					'fecha_i2'=>$_POST['fecha_i2'],'fecha_f2'=>$_POST['fecha_f2'],'uso_espacio2'=>$_POST['uso_espacio2'],
					'superficie_espacio2'=>$_POST['superficie_espacio2']);
			$res = $this->api->post('/actualizar', array('tabla'=>'public.real_estate_prueba', 'condicion'=>$condicion, 'datos'=>$data));
			if($res['ban'])
				$this->response(array('msg'=>true));
			else
				$this->response(array('msg'=>false,'error'=>$res['error']));
		}
		else
			$this->response(array('msg'=>false,'error'=>'Faltan parametros para la actualización'));
	}
	public function reportes(){
		$data = $this->basicas();
		$this->load->view('reportes/reportes',$data);
		$this->load->view('footer');
		$this->load->view('reportes/reportes_js');
	}

	public function perfiles(){
		$data = $this->basicas();
		$this->load->view('perfiles/perfiles');
		$this->load->view('footer');
		$this->load->view('perfiles/perfiles_js',$data);
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
					$this->api->post('/mail',array('mensaje'=>'Haz recibido una notificación, ingresa a : http://187.218.230.37/patrimoniapp/login/ Para atenderla. '
						."<br />".'Fecha Límite: '.$_POST['fecha_limite'].'<br/>'.'Número de Oficio: '.$_POST['num_doc'].'<br />'.'Asunto : '.$_POST['asunto'].'<br />'.' Remitente: '.$_POST['remitente'],
						'email_destino'=>$_POST['destinatario'], 'asunto'=>'Notificación de PATRIMONIAPP'));
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
