<?php 
class Informe_Aspectos extends CI_Controller {
	
	public function Informe_Aspectos(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_informe_aspectos');
		}
		
	}
	
	public function getAspectosGrid(){
		
		$aspectosDisponibles = $this->Util_model->getHabilidadesBlandas("");
		$aspectosDisponibles = $aspectosDisponibles["lista_hab_blandas"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($aspectosDisponibles);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($aspectosDisponibles as $aspecto) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$aspecto->d_habilidad_blanda,
				$aspecto->d_coloquio 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	
}

?>

