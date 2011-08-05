<?php 
class Util extends CI_Controller {
	
	public function Util(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
	}
	
	
	/**
	 * input: json 'usuario' {email, clave, nombre, apellido, razonSocial, idIndustria, idTipoDocumento, 
	 * 			numeroDocumento, telefono, idPais, tipoUsuario: "E">empresa "C">candidato}
	 * output: 
	 */
	public function  crearNuevoUsuario(){
		$usuario = $this->input->post('usuario');
		$codigoAutenticacion = $this->Usuario_model->crearNuevoUsuario($usuario);
		//ENVIAR EMAIL.
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
	
}

?>

