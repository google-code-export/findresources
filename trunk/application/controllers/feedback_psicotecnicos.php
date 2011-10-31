<?php 
class Feedback_Psicotecnicos extends CI_Controller {
	
	public function Feedback_Psicotecnicos(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "P"){
			redirect('home');
			
		}else{
			$idHabilidad = NULL;
			
			$data["psicotecnicosDisponibles"] = $this->Util_model->getPsicotecnicosDisponibles();
			$data["psicotecnicosDisponibles"] = $data["psicotecnicosDisponibles"]["psicotecnicos"]; 

			//user is already logged in.
			$this->load->view('view_feedback_psicotecnicos', $data);
		}
		
	}
	
	public function getFeedbackPsicotecnicosGrid(){
		
		$idTest = @$_GET["psicotecnico"];
		
		$corridas = $this->Test_model->getCorridas($idTest);
		$corridas = $corridas["corridas"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($corridas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;

		foreach ($corridas as $corrida) {
			
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$corrida->nombre,
				$corrida->apellido,
				$corrida->usuario,
				$corrida->entradas,
				$corrida->salida,
				"<a href='javascript:editPropuesta(\"". $corrida->id_psicotecnico  ."\",  \"". $corrida->usuario  ."\", \"". $corrida->entradas  ."\",\"". $corrida->salida  ."\");'><img src='/images/src/pencil.gif'></img></a>" 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	
	public function getDatosPropuesta(){
		
		$respuesta->salidas_del_usuario = "una salida del usuario logueado";
		
		$respuesta->notas_del_usuario = "las notas del usuario logueado.";
		echo json_encode_utf8($respuesta);
		
	}
	
	/**
	 * Recibe el id_habilidad_blanda y d_coloquio 
	 * */
	public function setPropuestaDeCambio(){
		/*
		$aspecto = $this->input->post('habilidad_blanda');
		$aspecto = json_decode($aspecto);
		$respuesta = $this->Util_model->setHabilidadBlanda($aspecto->id_habilidad_blanda, $aspecto->d_habilidad_blanda, $aspecto->d_coloquio );
		echo json_encode($respuesta);*/
		echo json_encode_utf8("bla");
		
	}
	
		
}

?>

