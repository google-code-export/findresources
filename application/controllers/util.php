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
	public function  getHerramientasPorArea(){
		$idArea = $this->input->post('idArea');
		$respuesta = $this->Util_model->getHerramientasPorArea($idArea);
		echo json_encode($respuesta);
	}
	
	/**
	 * input: 
	 * output: json array > [{id, descripcion}]
	 */
	public function  getNivelesDeEducacion(){
		$respuesta = $this->Util_model->getNivelesDeEducacion();
		echo json_encode($respuesta);
	}

	
	/**
	 * devuelve la lista de areas que existen donde una persona
	 * desarrolla sus actividades.
	 * input: 
	 * output: json array > [{id, descripcion}]
	 */
	public function  getAreas(){
		$respuesta = $this->Util_model->getAreasDisponibles();
		echo json_encode($respuesta);
	}
	
	
	/**
	 * devuelve los rubros de emrpesas que existen
	 * input: 
	 * output: json array > [{id, descripcion}]
	 */
	public function  getRubros(){
		$respuesta = $this->Util_model->getRubrosDisponibles();
		echo json_encode($respuesta);
	}
		
	
}

?>

