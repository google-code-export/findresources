<?php 
class Util extends CI_Controller {
	
	public function Util(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
	}
	
	
	/**
	 * input: idPais
	 * output: json array > [{id, descripcion}]
	 */
	public function  getProvincias(){
		$idPais = $this->input->post('idPais');
		$respuesta = $this->Util_model->getProvincias($idPais);
		echo json_encode($respuesta);
	}

	/**
	 * @input:  por post el rubro correspondiente.
	 * @output: las herramientas de un determinado rubro.
	 * 			json array con {id, descripcion}
	 * */
	public function  getHerramientasPorRubro(){
		$idRubro = $this->input->post('idRubro');
		$respuesta = $this->Util_model->getHerramientasPorRubro($idRubro);
		echo json_encode($respuesta);
	}

}

?>

