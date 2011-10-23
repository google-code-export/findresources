<?php 
class Feedback_Aspectos extends CI_Controller {
	
	public function Feedback_Aspectos(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "P"){
			redirect('home');
			
		}else{
			$idHabilidad = NULL;

			$data['habilidadesBlandasDisponibles'] = $this->Util_model->getHabilidadesBlandas($idHabilidad);
			
			//user is already logged in.
			$this->load->view('view_feedback_aspectos', $data);
		}
		
	}
	
	public function getAspectosGrid(){
		
		$aspectos = $this->Util_model->getHabilidadesBlandas("");
		$aspectos = $aspectos["lista_hab_blandas"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($aspectos);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;

		foreach ($aspectos as $aspecto) {
			
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$aspecto->d_habilidad_blanda,
				$aspecto->d_coloquio,
				"<a class='' href='javascript:editColoquio(\"". $aspecto->id_habilidad_blanda  ."\");'><img src='/images/src/pencil.gif'></img></a>" 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	/**
	 * Recibe el id_habilidad_blanda y d_coloquio 
	 * */
	public function setHabilidadBlanda(){
		
		$aspecto = $this->input->post('habilidad_blanda');
		$aspecto = json_decode($aspecto);
		$respuesta = $this->Util_model->setHabilidadBlanda($aspecto->id_habilidad_blanda, $aspecto->d_habilidad_blanda, $aspecto->d_coloquio );
		echo json_encode($respuesta);
		
	}
	
		
}

?>

