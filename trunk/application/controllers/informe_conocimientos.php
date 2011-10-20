<?php 
class Informe_Conocimientos extends CI_Controller {
	
	public function Informe_Conocimientos(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_informe_conocimientos');
		}
		
	}
	
	public function getIndustriasGrid(){
		
		$industriasDisponibles = $this->Util_model->getIndustriasDisponibles();
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($industriasDisponibles);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($industriasDisponibles as $industria) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array($industria);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function getHerramientasGrid(){
		
		$herramientasDisponibles = $this->Util_model->getAreasDisponibles();
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($herramientasDisponibles);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($herramientasDisponibles as $area) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array($area, "herramienta x");
			$key++;
		}

		echo json_encode_utf8($grid);
		
	}
	
	
}

?>

