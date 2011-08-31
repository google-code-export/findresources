<?php 
class Busquedas extends CI_Controller {
	
	public function Busquedas(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		//$usuario = @$_SESSION[SESSION_ID_USUARIO];
		$usuario = "jonakup@hotmail.com";
		$data['usuarioData'] = $this->Usuario_model->getUsuario($usuario);
		$this->load->view('view_busquedas', $data);
		
	}
	

}?>

