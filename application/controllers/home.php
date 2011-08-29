<?php 
class Home extends CI_Controller {
	
	public function Home(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		var_dump($idUsuario);
		if(!$idUsuario){
			redirect('login');
		}
		//get usuario data.
		$dataUsuario = $this->Usuario_model->getUsuario($idUsuario);
		
		$data['usuarioData'] = $dataUsuario;
				
		$this->load->view('view_home', $data);
		
	}
	
	public function doLogout(){
		session_destroy();
		echo "done";
	}
	
	
	
	
}

?>

