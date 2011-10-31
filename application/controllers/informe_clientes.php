<?php 
class Informe_Clientes extends CI_Controller {
	
	public function Informe_Clientes(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_informe_clientes');
		}
		
	}
	
	public function getClientesGrid(){
		
		$empresas = $this->Usuario_model->getDatosEmpresas("");
		$empresas = $empresas["usuarios"];
		$grid["page"] = 1;
		$grid["total"] = sizeof($empresas);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;

		foreach ($empresas as $empresa) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$empresa->usuario,
				$empresa->razon_social,
				$empresa->cuit,
				$empresa->saldo,
				"<a class='' href='javascript:showBusquedas(\"". $empresa->usuario ."\", \"". $empresa->razon_social ."\");'><img src='/images/src/lupa.png'></img></a>" 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function getBusquedasGrid(){
		
		$usuarioEmpresa = @$_GET["usuarioEmpresa"];

		$busquedasDelUsuario = $this->Busquedas_model->getBusquedasDeUsuario($usuarioEmpresa);

		$busquedasDelUsuario = array_merge($busquedasDelUsuario['busquedas_activas'], $busquedasDelUsuario['busquedas_inactivas']);
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($busquedasDelUsuario);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($busquedasDelUsuario as $busqueda) {
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array(
				$busqueda->d_titulo,
				$busqueda->d_estado
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
		
}

?>

