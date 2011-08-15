<?php 
class Autenticacion extends CI_Controller {
	
	public function Autenticacion(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		
		$codigoAutenticacion = $this->input->get('autCode');
		$userId = $this->input->get('email');
		
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
				
		if($idUsuario){
			//user is already logged in.
			redirect('home');
			
		}else{
			
			$data['autenticado'] =  $this->Usuario_model->activarUsuario($codigoAutenticacion, $userId);
			//user is already logged in.
			$this->load->view('view_autenticacion', $data);
		}
		
		
	}

	
}

?>

