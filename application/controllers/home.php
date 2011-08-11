<?php 
class Home extends CI_Controller {
	
	public function Home(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = $this->session->userdata(SESSION_ID_USUARIO);
		if(!$idUsuario){
			redirect('login');
		}
		//get usuario data.
		$dataUsuario = $this->Usuario_model->getUsuario($idUsuario);
		
		$data['dataUsuario'] = $dataUsuario;
				
		/////////////echo $this->session->userdata('session_id');
		$this->load->view('view_home', $data);
		
	}
	
	public function doLogout(){
		$this->session->sess_destroy();
		echo "done";
	}
	
	
	
	
}

?>

