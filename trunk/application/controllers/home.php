<?php 
class Home extends CI_Controller {
	
	public function Home(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];

		if(!$idUsuario){
			redirect('login');
		}
		//get usuario data.
		$dataUsuario = $this->Usuario_model->getUsuario($idUsuario);
		
		$data['usuarioData'] = $dataUsuario;
		$data['tiposDeDocumentos'] =  $this->Util_model->getTiposDeDocumentos();
		$data['paises'] = $response = $this->Util_model->getPaises();
		
		$this->load->view('view_home', $data);
		
	}
	
	public function doLogout(){
		session_destroy();
		echo "done";
	}
	
	/**
	 * input: 
	 * 	'usuario' : json string
	 *      {nombre, apellido, razonSocial, 
	 *      idIndustria, idTipoDocumento, numeroDocumento, 
	 *      telefono, idPais
	 *      }
	 * output idCurriculum.
	 * */
	public function setUsuario(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		
		$usuario = $this->input->post('usuario');
		
		$usuario = json_decode_into_array(utf8_decode($usuario));
		$usuario["email"] = $idUsuario;
		
		$response = $this->Usuario_model->modificarUsuario($usuario);
		
		echo json_encode($response);
		
	}
	
	
	
}

?>

