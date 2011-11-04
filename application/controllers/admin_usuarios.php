<?php 
class Admin_Usuarios extends CI_Controller {
	
	public function Admin_Usuarios(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		$data['tiposDeDocumentos'] =  $this->Util_model->getTiposDeDocumentos();
		$data['paises'] = $this->Util_model->getPaises();
		
		if(!$idUsuario || @$_SESSION[SESSION_TIPO_USUARIO] != "A"){
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_admin_usuarios', $data);
		}
		
	}
	
	public function getUsuariosExpertosGrid(){
		
		$usuarios = $this->Usuario_model->getUsuariosExpertos();
		$usuarios = $usuarios["usuarios"];
		
		$grid["page"] = 1;
		$grid["total"] = sizeof($usuarios);
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($usuarios as $usuario) {
			$grid["rows"][$key]["id"] = $usuario->id_usuario ;
			$grid["rows"][$key]["cell"] = array($usuario->usuario , $usuario->nombre, "********", 
			"<a class='removeUserLink' href='javascript:removeUser(\"". $usuario->usuario ."\");'><img src='/images/src/delete.png'></img></a>", 
			"<a class='editUserLink' href='javascript:editUserPassword(\"". $usuario->usuario ."\");'><img src='/images/src/pencil.gif'></img></a>" 
			);
			$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	public function bajaUsuario(){
		$usuario = $this->input->post('usuario');
		$respuesta = $this->Usuario_model->bajaUsuario($usuario);
		echo json_encode_utf8($respuesta);
		
	}
	
	/**
	 * Crea nuevo usuario experto.
	 * input: json 'usuario' {email, clave, nombre, apellido}
	 * output: 
	 */
	public function  setUserData(){
		$usuario = $this->input->post('usuario');
		$usuario = json_decode_into_array(utf8_decode($usuario));
		$usuario->clave = md5($usuario->clave);

		$respuesta = $this->Usuario_model->crearNuevoUsuarioExperto($usuario);
		//email confirmation
		$this->email->from('noreply@gmail.com', 'Findresources');
		$this->email->to($usuario["email"]);
		$this->email->subject(utf8_encode('FindResources - Confirmación de Registro'));
		$this->email->message(utf8_encode('Su usuario Experto ha sido creado, contáctese con el administrador para saber su contraseña.'));
		//ENVIAR EMAIL.
		$emailSent = $this->email->send();
		
		echo json_encode($respuesta);
	}
	
	/**
	 * Cambia la contraseña del usuario.
	 * input: json 'usuario' {email, clave}
	 * output: 
	 */
	public function  setUserPassword(){
		$usuario = $this->input->post('usuario');
		$usuario = json_decode($usuario);
		$usuario->clave = md5($usuario->clave);

		$respuesta = $this->Usuario_model->modificaClave($usuario->email, $usuario->clave);
		
		echo json_encode($respuesta);
	}
	
	
}

?>

