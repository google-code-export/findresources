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
		$_SESSION[SESSION_TIPO_USUARIO] = $dataUsuario->idTipoUsuario;
		
		$data['tiposDeDocumentos'] =  $this->Util_model->getTiposDeDocumentos();
		$data['paises'] = $response = $this->Util_model->getPaises();
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();

		// SI EL USUARIO ES UN CANDIDATO => VERIFICO SI TIENE TESTS PENDIENTES
		if ($dataUsuario->idTipoUsuario == "C") {
			$tests_del_usuario = $this->Test_model->getTestsPendientes($idUsuario);
			if (array_key_exists(0, $tests_del_usuario["test_pendientes"]))	{
				$data["test_pendiente"] = "SI";
			} else {
				$data["test_pendiente"] = "NO";
			}
		}
		
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

