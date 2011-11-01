<?php 
class Informe_Psicotecnicos extends CI_Controller {
	
	public function Informe_Psicotecnicos(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_informe_psicotecnicos');
		}
	}
	
	public function getPsicotecnicosGrid(){
		
		$estadisticas = $this->Test_model->getEstadisticas("");
		$estadisticas = $estadisticas["estadisticas"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($estadisticas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($estadisticas as $estadistica) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
			$estadistica->d_test,
			$estadistica->listaaspectosper, 
			$estadistica->cantidad, 
			"<a class='' href='javascript:showPropose(\"". $estadistica->id_test ."\", \"". $estadistica->d_test ."\");'><img src='/images/src/lupa.png'></img></a>" 
		);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function getPropuestasGrid(){
		$idPsicotecnico = @$_GET["idPsicotecnico"];
	
		////////////////////////
		$propuestas = $this->Test_model->getPropuestasCambios($idPsicotecnico);
		$propuestas = $propuestas["propuestas"]; 
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($propuestas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($propuestas as $propuesta) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
					$propuesta->fecha, 
					$propuesta->entradas,
					$propuesta->salida,
					$propuesta->propuesta,
					$propuesta->nota);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	
}

?>

