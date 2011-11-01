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
				"<a href='javascript:editPropuesta(\"". $corrida->id_psicotecnico /*->id_test*/ ."\",  \"". $corrida->id_psicotecnico  ."\",  \"". $corrida->usuario  ."\", \"". $corrida->entradas  ."\",\"". $corrida->salida  ."\");'><img src='/images/src/pencil.gif'></img></a>" 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	
	public function getDatosPropuesta(){
		$idTest = @$_GET["idTest"];
		$idCorrida = @$_GET["idPsicotecnico"];
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		
		$data = $this->Test_model->getPropuestaCambioPorUsuario($idTest, $idCorrida, $idUsuario);
		$respuesta->salidas_del_usuario = $data["propuesta"];
		$respuesta->notas_del_usuario = $data["nota"];
		echo json_encode_utf8($respuesta);
		
	}
	
	/**
	 * Recibe el id_habilidad_blanda y d_coloquio 
	 * */
	public function setPropuestaDeCambio(){

		$propuesta = $this->input->post('propuesta');
		$propuesta = json_decode_into_array(utf8_decode($propuesta));

		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		
		$data = $this->Test_model->setPropuestaCambioPorUsuario($propuesta["idTest"], $propuesta["idCorrida"], $idUsuario, $propuesta["propuesta"],$propuesta["nota"]);
		
		echo json_encode_utf8($data);
		
	}
	
		
}

?>

