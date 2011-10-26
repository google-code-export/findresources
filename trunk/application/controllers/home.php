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
	
	/** FOOTER METHODS **/
	public function sobrenosotros(){
		$this->load->view('footer/view_sobrenosotros');
	}
	public function ayuda(){
		$tipoUsuario = $this->input->get('u');
	
		switch ($tipoUsuario) {
		    case "E": //EMPRESA
			$this->load->view('footer/view_ayuda_empresas'); 
	        break;
		    case "P": //EXPERTO
			$this->load->view('footer/view_ayuda_expertos');
			break;
			case "C": //CANDIDATO
			default:
			$this->load->view('footer/view_ayuda_candidatos');
	    		
		} //end switch

	}
	public function sugerencias(){
		$data["filled_form"] = false;
		$this->load->view('footer/view_sugerencias',$data);
	}
	public function terminos(){
		$this->load->view('footer/view_terminos');
	}
	public function contact(){
		$descripcion = $this->input->post('Descripcion');
		$pais = $this->input->post('Pais');
		$telefono = $this->input->post('Telefono');
		$email = $this->input->post('Email');
		$nombre = $this->input->post('NombreApellido');

		$this->email->from($email, utf8_encode($nombre));
		$this->email->to("leandro.minio@gmail.com,jonakup@gmail.com,jpppina@gmail.com,foxbaucia@gmail.com");
		$this->email->subject('FindResources - Sugerencias');
		$this->email->message(utf8_encode('
		<b>Sugerencias de FindResources</b><br /><br />
		NOMBRE : '.$nombre.'<br />
		EMAIL :  '.$email.'<br />
		DESCRIPCIÓN : '.$descripcion.'<br />
		PAÍS : '.$pais.'<br />
		TELÉFONO : '.$telefono.'<br />
		 '));
		//ENVIAR EMAIL.
		$emailSent = $this->email->send();
		
		$data["filled_form"] = true;
		$this->load->view('footer/view_sugerencias',$data);
	}
	/** FOOTER METHODS **/
	
}

?>

