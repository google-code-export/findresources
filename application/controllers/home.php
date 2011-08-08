<?php 
class Home extends CI_Controller {
	
	public function Home(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = $this->session->userdata('ID_USUARIO');
		if(!$idUsuario){
			redirect('login');
		}
		$data = array();
		
		$this->load->view('view_home', $data);
		
	}
	
	public function doLogout(){
		$this->session->sess_destroy();
		echo "done";
	}
	
	
	
	
}

?>

