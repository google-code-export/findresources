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
		
		$industriasDisponibles = $this->Util_model->getIndustriasDisponibles();
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($industriasDisponibles);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($industriasDisponibles as $industria) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array("MIPS" , "Introversion, Apertura", "9999", 
			"<a class='' href='javascript:showPropose(\"". "1" ."\", \"". "1" ."\");'><img src='/images/src/lupa.png'></img></a>" 
		);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function getPropuestasGrid(){
		$idPsicotecnico = @$_GET["idPsicotecnico"];
	
		////////////////////////
		$industriasDisponibles = $this->Util_model->getIndustriasDisponibles();
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($industriasDisponibles);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($industriasDisponibles as $industria) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array("10/10/2010" , "entrada 1, entrada 2, entrada 3, entrada 4", "Saluda 1 2 y 3", "Propuesta de Salida . . . . ", "Notas .... . . . .");
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	
}

?>

