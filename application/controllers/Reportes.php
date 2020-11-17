<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

require APPPATH. '/libraries/restclient.php';
class Reportes extends CI_Controller {

	private $api;

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->library('componentes');
		$this->load->helper(array('form', 'url'));

		$this->api = new RestClient([
			'base_url' => 'http://10.254.250.17/API_REST/api',
			'headers' => [
				'Ephylone'=>'inventarios',
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
        $data['consulta'] = "SELECT * FROM public.inventory_detail where id_inventory_detail = 14 ";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		var_dump($data['datos']);
		$this->load->view('reportes/reportes',$data);
		$this->load->view('footer');
		$this->load->view('reportes/reportes_js');
	}
	public function bienes_consumibles(){
		$data = $this->basicas();
        $data['consulta'] = "SELECT * FROM public.inventory_detail where id_inventory_detail = 14 ";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		var_dump($data['datos']);
		$this->load->view('reportes/reportes',$data);
		$this->load->view('footer');
		$this->load->view('reportes/reportes_js');
	}
	
	public function salir(){
		$this->session->sess_destroy();
		header('Location: '.base_url().'login/');
		exit;
	}	
}
