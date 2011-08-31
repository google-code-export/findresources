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

		$data['busquedasDelUsuario'][0]->id = "0";
		$data['busquedasDelUsuario'][0]->nombre = "Contadores serios";
		$data['busquedasDelUsuario'][1]->id = "1";
		$data['busquedasDelUsuario'][1]->nombre = "Abogado Marketineros";
		$data['busquedasDelUsuario'][2]->id = "2";
		$data['busquedasDelUsuario'][2]->nombre = "Secretarias no sexies";
		$data['busquedasDelUsuario'][3]->id = "3";
		$data['busquedasDelUsuario'][3]->nombre = "Obrero que desea reubicacion";
		
		$this->load->view('view_busquedas', $data);
		
	}
	

}?>

