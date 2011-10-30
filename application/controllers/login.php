<?php 
class Login extends CI_Controller {
	
	public function Login(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['tiposDeDocumentos'] =  $this->Util_model->getTiposDeDocumentos();
		$data['paises'] = $this->Util_model->getPaises();
		
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if($idUsuario){
			//user is already logged in.
			redirect('home');
			
		}else{
			//user is already logged in.
			$this->load->view('view_login', $data);
		}
		
		
	}
	
	
	/**
	 * Crea nuevo usuario.
	 * input: json 'usuario' {email, clave, nombre, apellido, razonSocial, idIndustria, idTipoDocumento, 
	 * 			numeroDocumento, telefono, idPais, tipoUsuario: "E">empresa "C">candidato}
	 * output: 
	 */
	public function  crearNuevoUsuario(){
		$usuario = $this->input->post('usuario');
		$usuario = json_decode(utf8_decode($usuario));
		$usuario->clave = md5($usuario->clave);
		$activationCode = $this->randomString(32);
		$respuesta = $this->Usuario_model->crearNuevoUsuario($usuario, $activationCode);
		//email confirmation
		$this->email->from('noreply@gmail.com', 'FindResources');
		$this->email->to($usuario->email);
		$this->email->subject(utf8_encode('FindResources - Confirmación de Registro'));

		$link =  base_url() .'autenticacion?autCode=' . $activationCode . '&email='. $usuario->email;

		$email = <<<EOF
		<html>
			<head>
				<style type="text/css">
				</style>
			</head>
			<body>
				<div style="border-bottom: 1px #CCCCCC solid; margin-bottom: 20px;padding:10px;font-family: sans-serif; font-size:18px">
					<img src="http://findresources.dyndns.info/images/src/logofr2.png" alt="Find Resources"/>
				</div>
		
				<div style="color:#00529E; font-family: sans-serif; display:block;padding:20px">
					Por favor haga clic en este link para confirmar su registro:  <a href="$link">  Confirme su registro </a>
				</div>
				<div style="color:#00529E; font-family: sans-serif; display:block;padding:20px">
					O copie y pegue la siguente direccion de internet en su explorador: 
					<p/>
					$link
				</div>
			</body>
		</html>
EOF;
		
		
		$this->email->message(utf8_encode($email));
		
		//ENVIAR EMAIL.
		$emailSent = $this->email->send();
		
		echo json_encode($respuesta);
	}
	
	/**
	 * Realiza el login.
	 * input: json 'usuario' {email, clave}
	 * output: true si esta logged in, false si user/password son invalidas
	 * TODO Esta llamada debe ser segura, investigar este tema.
	 */
	public function  doLogin(){
		$usuario = $this->input->post('usuario');
		$usuario = json_decode($usuario);
		$clave = md5($usuario->clave);
		$isLoggued = $this->Usuario_model->canLogin($usuario->email, $clave);
		if($isLoggued){
			session_destroy();
			session_start();
			$_SESSION[SESSION_ID_USUARIO] = $usuario->email;
			echo "true";
		}else{
			echo "false";
		}
	}
	
	/**
	 * Realiza el login.
	 * input: json 'usuario' con el email que ingresó.
	 * output: true si existe el usuario, false si el nombre de usuario esta disponible.
	 */
	public function getExisteUsuario(){
		$usuario = $this->input->post('usuario');
		$estado = $this->Usuario_model->getEstadoUsuario($usuario);
		if($estado == 0){
			echo "false";
		} else{
			echo "true";
		}
	}
	
	//TODO send this function to a class called String_helper
	function randomString($length)
	{
		$len = $length;
		$base = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
		$max = strlen($base) -1;
		$activatecode = '';
		mt_srand((double)microtime()*1000000);
		while (	strlen($activatecode)< $len ){
			$activatecode.= $base{mt_rand(0, $max)};
		}
		
		return $activatecode;
	}
	
}

?>

