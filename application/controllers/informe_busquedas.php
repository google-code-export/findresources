<?php 
class Informe_Busquedas extends CI_Controller {
	
	public function Informe_Busquedas(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_informe_busquedas');
		}
		
	}
	
	public function getBusquedasGrid(){

		$busquedas = $this->Busquedas_model->getBusquedasPorAreaDeNegocio("");
		$busquedas = $busquedas["informe_busqueda"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($busquedas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($busquedas as $busqueda) {
			
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$busqueda->d_industria,
				$busqueda->razon_social,
				$busqueda->d_titulo,
				$busqueda->d_herramienta,
				$busqueda->d_habilidad_blanda,
				$busqueda->estado
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
		
}

?>

