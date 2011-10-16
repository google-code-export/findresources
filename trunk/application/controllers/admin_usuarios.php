<?php 
class Admin_Usuarios extends CI_Controller {
	
	public function Admin_Usuarios(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_admin_usuarios');
		}
		
	}
	
	public function getUsuariosExpertosGrid(){
		
		$usuarios = $this->Usuario_model->getUsuariosExpertos();
		$usuarios = $usuarios["usuarios"];
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($usuarios);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($usuarios as $usuario) {
			$grid["rows"][$key]["id"] = $usuario->id_usuario ;
			$grid["rows"][$key]["cell"] = array($usuario->usuario , $usuario->nombre, "********", "BAJA", "EDITAR");
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function bajaUsuario(){
		

				
	}
	
	
	
}

?>

