<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City');

require APPPATH. '/libraries/restclient.php';
class Login extends CI_Controller {

	private $api;

	//Constructor
	function __construct(){
        parent::__construct();
	}

	public function index(){
        $this->load->view('funciones');
        $this->load->view('login/login');
    }

    public function asigna_token(){
        if(isset($_POST['data'])){
            $data = $_POST['data'];
            $gerencia = explode('=',explode(',',$data['pertenencia'])[1])[1];
            $coordinacion = explode('=',explode(',',$data['pertenencia'])[2])[1];
            $this->session->set_userdata(array(
            'token'=>$data['token'],
            'nombre_completo'=>$data['nombre_completo'],
            'gerencia'=>$gerencia,
            'coordinacion'=>$coordinacion,
            'email'=>$data['email'],
            'ext'=>$data['ext'],
            'num_emp'=>$data['num_emp'],
            'emp_type'=>$data['emp_type'],
            'puesto'=>$data['puesto']));
        }
        else{
            echo json_decode('Faltan parametros de conexión');
        }
    }
}
