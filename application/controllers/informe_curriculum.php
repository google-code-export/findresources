<?php 
class Informe_Curriculum extends CI_Controller {
	
	public function Informe_Curriculum(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_informe_curriculum');
		}
		
	}
	
	public function getCurriculumsGrid(){
		
		$busquedas = $this->Curriculum_model->getInformeCurriculum("","");
		$grid["page"] = 1;
		$grid["total"] = sizeof($busquedas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;

		foreach ($busquedas as $busqueda) {
			
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$busqueda->usuario,
				$busqueda->nombre,
				$busqueda->apellido,
				$busqueda->lista_herramientas,
				$busqueda->lista_aspectos_personalidad,
				$busqueda->q_busquedas,
				$busqueda->f_actualizacion 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
		
}

?>

