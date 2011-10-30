<?php 
class Feedback_Resultados extends CI_Controller {
	
	public function Feedback_Resultados(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "P"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_feedback_resultados');
		}
		
	}
	
	public function getBusquedasGrid(){
		$nombreDeBusqueda = @$_GET["nombreDeBusqueda"];
		$empresa = @$_GET["nombreDeEmpresa"];
		$mail = @$_GET["mailDeEmpresa"];
		
		
		
		$busquedas = $this->Busquedas_model->getBusquedasDelSistema($nombreDeBusqueda, $empresa, $mail);
		$busquedas = $busquedas["informe_busqueda"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($busquedas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;

		foreach ($busquedas as $busqueda) {
			
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$busqueda->d_titulo,
				$busqueda->razon_social,
				$busqueda->usuario,
				$busqueda->listaconocimientos,
				$busqueda->listaaspectosperso,
				"<a class='' href='javascript:showCandidatos(\"". $busqueda->id_busqueda ."\", \"". $busqueda->d_busqueda ."\");'><img src='/images/src/lupa.png'></img></a>" 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function getCandidatosGrid(){
		
		$idBusqueda = @$_GET["idBusqueda"];

		$candidatos = $this->Busquedas_model->getInformeDeCandidatosDeBusqueda($idBusqueda);
		$candidatos = $candidatos["informe_busqueda"];
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($candidatos);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		
		foreach ($candidatos as $candidato) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$candidato->apellido,
				$candidato->nombre,
				$candidato->usuario,
				$candidato->listaaspectosperso_cv
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}	
		
}

?>

