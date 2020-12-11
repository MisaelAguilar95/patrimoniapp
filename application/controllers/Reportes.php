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
        $data['consulta'] = "SELECT inventory.source,
		folio,
		inventory.registered_date,
		supplier,
		inventory.status,
		username,
		full_name,
		management_code,
		inventory_code,
		cucop_description,
		brand,
		model,
		inventory_detail.serial,
		unit_cost_total,
		cucop_departure
		FROM inventory 
		LEFT JOIN inventory_invoice ON inventory.id_inventory_financial = inventory_invoice.id_inventory_financial
		LEFT join inventory_assigned  on inventory.id_assigned = inventory_assigned.id_inventory_assigned
		left join inventory_detail on inventory.id_inventory_detail = inventory_detail.id_inventory_detail
		where inventory.status= 'baja'";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		//var_dump($data['datos']);
		$this->load->view('reportes/reportes',$data);
		$this->load->view('footer');
		$this->load->view('reportes/reportes_js');
	}
	public function bienes_consumibles(){
		$data = $this->basicas();
        $data['consulta'] = "select additional_description,departure,cucop,cucop_description, sum (quantity) as cant
		from vw_consumiblee vc 
		where ejercicio_fiscal = 2020 
		and vc.type= 'salida_consumible'
		and unit_description != 'GERENCIA ESTATAL JALISCO'
		AND unit_description!='GERENCIA DE FINANCIAMIENTO'
		AND unit_description!='GERENCIA ESTATAL BAJA CALIFORNIA SUR'
		AND unit_description!='GERENCIA ESTATAL CAMPECHE'
		AND unit_description!='GERENCIA ESTATAL CHIHUAHUA'
		AND unit_description!='GERENCIA ESTATAL CHIAPAS'
		AND unit_description!='GERENCIA ESTATAL CIUDAD DE MEXICO'
		AND unit_description!='GERENCIA ESTATAL COAHUILA'
		AND unit_description!='GERENCIA ESTATAL MICHOACAN'
		AND unit_description!='GERENCIA ESTATAL NUEVO LEON' 
		AND unit_description!='GERENCIA ESTATAL SONORA'
		AND unit_description!='GERENCIA ESTATAL VERACRUZ'
		AND unit_description!='GERENCIA ESTATAL BAJA CALIFORNIA'
		AND unit_description!='GERENCIA ESTATAL OAXACA'
		AND unit_description!='GERENCIA ESTATAL YUCATAN'
		AND unit_description!='GERENCIA ESTATAL COLIMA'
		AND unit_description!='GERENCIA ESTATAL SINALOA'
		AND unit_description!='GERENCIA ESTATAL HIDALGO'
		AND unit_description!='GERENCIA ESTATAL GUERERRERO' 
		AND unit_description!='GERENCIA ESTATAL SAN LUIS POTOSI'
		AND unit_description!='GERENCIA ESTATAL DURANGO' 
		AND unit_description!='GERENCIA ESTATAL ZACATECAS'
		AND unit_description!='GERENCIA ESTATAL TABASCO'
		AND unit_description!='GERENCIA ESTATAL QUERETARO'
		AND unit_description!='GERENCIA ESTATAL QUINTANA ROO'
		AND unit_description!='GERENCIA ESTATAL PUEBLA'
		AND unit_description!='GERENCIA ESTATAL NAYARIT'
		AND unit_description!='GERENCIA ESTATAL MEXICO'
		AND unit_description!='GERENCIA ESTATAL TLAXCALA'
		AND unit_description!='GERENCIA ESTATAL TAMAULIPAS' 
		AND unit_description!='GERENCIA ESTATAL AGUASCALIENTES'
		AND unit_description!='GERENCIA ESTATAL MORELOS'
		group by additional_description,vc.departure,vc.cucop,vc.cucop_description
		";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		//var_dump($data['datos']);
		$this->load->view('reportes/consumibles',$data);
		$this->load->view('footer');
		$this->load->view('reportes/consumibles_js');
	}
	public function bienes_consumibles_ofi(){
		$data = $this->basicas();
        $data['consulta'] = "select additional_description,departure,cucop,cucop_description, sum (quantity) as cant
		from vw_consumiblee vc 
		where ejercicio_fiscal = 2020 
		and vc.type= 'salida_consumible'
		and unit_description = 'GERENCIA ESTATAL JALISCO'
		OR unit_description='GERENCIA DE FINANCIAMIENTO'
		OR unit_description='GERENCIA ESTATAL BAJA CALIFORNIA SUR'
		OR unit_description='GERENCIA ESTATAL CAMPECHE'
		OR unit_description='GERENCIA ESTATAL CHIHUAHUA'
		OR unit_description='GERENCIA ESTATAL CHIAPAS'
		OR unit_description='GERENCIA ESTATAL CIUDAD DE MEXICO'
		OR unit_description='GERENCIA ESTATAL COAHUILA'
		OR unit_description='GERENCIA ESTATAL MICHOACAN'
		OR unit_description='GERENCIA ESTATAL NUEVO LEON' 
		OR unit_description='GERENCIA ESTATAL SONORA'
		OR unit_description='GERENCIA ESTATAL VERACRUZ'
		OR unit_description='GERENCIA ESTATAL BAJA CALIFORNIA'
		OR unit_description='GERENCIA ESTATAL OAXACA'
		OR unit_description='GERENCIA ESTATAL YUCATAN'
		OR unit_description='GERENCIA ESTATAL COLIMA'
		OR unit_description='GERENCIA ESTATAL SINALOA'
		OR unit_description='GERENCIA ESTATAL HIDALGO'
		OR unit_description='GERENCIA ESTATAL GUERERRERO' 
		OR unit_description='GERENCIA ESTATAL SAN LUIS POTOSI'
		OR unit_description='GERENCIA ESTATAL DURANGO' 
		OR unit_description='GERENCIA ESTATAL ZACATECAS'
		OR unit_description='GERENCIA ESTATAL TABASCO'
		OR unit_description='GERENCIA ESTATAL QUERETARO'
		OR unit_description='GERENCIA ESTATAL QUINTANA ROO'
		OR unit_description='GERENCIA ESTATAL PUEBLA'
		OR unit_description='GERENCIA ESTATAL NAYARIT'
		OR unit_description='GERENCIA ESTATAL MEXICO'
		OR unit_description='GERENCIA ESTATAL TLAXCALA'
		OR unit_description='GERENCIA ESTATAL TAMAULIPAS' 
		OR unit_description='GERENCIA ESTATAL AGUASCALIENTES'
		OR unit_description='GERENCIA ESTATAL MORELOS'
		group by additional_description,vc.departure,vc.cucop,vc.cucop_description
		";
		$data['datos'] = json_encode(json_decode($this->api->post('/ejecuta',$data)->response)->data);
		//var_dump($data['datos']);
		$this->load->view('reportes/consumibles',$data);
		$this->load->view('footer');
		$this->load->view('reportes/consumibles_js');
	}
	
	public function salir(){
		$this->session->sess_destroy();
		header('Location: '.base_url().'login/');
		exit;
	}	
}
