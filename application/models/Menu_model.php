<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function obtener_menu(){
        $resultado = array('ban'=>true,'msg'=>'correcto');
        return $resultado;
    }
}

?>