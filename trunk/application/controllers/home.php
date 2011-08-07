<?php 
class Home extends CI_Controller {
	
	public function Home(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = $this->session->userdata('ID_USUARIO');
		if(!$idUsuario){
			redirect('login');
		}
		echo 'we are at home baby' . $idUsuario;
		
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['tiposDeDocumentos'] =  $this->Util_model->getTiposDeDocumentos();
		
		$idUsuario = $this->session->userdata('ID_USUARIO');
		
		
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

	
}

?>

