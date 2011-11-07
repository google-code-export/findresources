<?php 

class Test extends CI_Controller {
	
	public $sep = ";";
	
 	function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('oracledb');
        $this->load->library('session');
    }

	function inicio(){
		$data["source"] ="inicio";
		$this->load->view('view_tests',$data);
		
	}
	function fin(){
		$data["source"] ="fin";
		$this->load->view('view_tests',$data);
		
	}
	function index() {
	/* Obtengo el separador */
		$query = $this->db->query('SELECT PKG_UTIL.FU_OBTIENE_SEPARADOR_SPLIT() SEPARADOR FROM DUAL');
		$row = $query->row_array();
		$this->sep = $row["SEPARADOR"];
		/** REALIZAR VALIDACION DE LOS TESTS A REALIZAR POR EL USUARIO**/
		/** E IR LLAMANDO A LOS TESTS QUE CORRESPONDAN VALIDANDO CON **/
		/** LO QUE LE FALTA REALIZAR SEGÚN LA INFO OBTENIDA DE LA BD **/

		/* USUARIO DE PRUEBA HASTA PODER TOMAR EL USUARIO REAL GUARDADO EN SESION */
		$idUsuario = $this->functionutils->getSession('SESSION_ID_USUARIO');
		if(!$idUsuario){
			redirect('login');
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			//$idUsuario = "juan@juan.com";
			//$this->functionutils->setSession('SESSION_ID_USUARIO',$idUsuario);
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////		
		}
		$tests_del_usuario = $this->Test_model->getTestsPendientes($idUsuario);

		if (!array_key_exists(0, $tests_del_usuario["test_pendientes"]))	{
			 redirect('/Test/fin', 'refresh');
		}
		switch (strtolower($tests_del_usuario["test_pendientes"][0]->nombre_test)) {
			case "luscher":
				$this->luscher("1");
				break;
			case "d48":
				$this->d48("2");
				break;
			case "raven":
				$this->raven("3");
				break;
			case "mips":
				$this->mips("4");
				break;
			case "rorschach":
				$this->rorschach("5");
				break;
			default :
				$this->fin();
		}
	}
	/** METODOS SOLO PARA PRUEBAS INTERNAS **/
	function t1(){
		$this->luscher("1");
	}
	function t2(){
		$this->d48("2");
	}
	function t3(){
		$this->raven("3");
	}
	function t4(){
		$this->mips("4");
	}
	function t5(){
		$this->rorschach("5");
	}
	/** METODOS SOLO PARA PRUEBAS INTERNAS **/
	
	/**
	 * Test de Luscher
	 */
	function luscher($num = 1){
		//echo $num;
		$data['num'] = $num;
		$data['c1'] = '';
		$data['c2'] = '';
		$data['sep'] = $this->sep;
		
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_colors1";
			 	$this->load->view('view_test_luscher',$data);
			break;
			case 'select_colors1' :
		 		$data['c1'] = $this->input->post('colors1');
			 	$data['source'] = "select_colors2";
			 	$this->load->view('view_test_luscher',$data);
			break;
			case 'select_colors2' : 
				$usuario = $this->functionutils->getSession('SESSION_ID_USUARIO');
				$seleccion_luscher1 = $this->input->post('colors1');
				$seleccion_luscher2 = $this->input->post('colors2');
			 	$data['source'] = "test_finished";
				try {
					$result = $this->Test_model->setLuscherResults($usuario,$seleccion_luscher1,$seleccion_luscher2);
					if ($result["error"] == "0" )
						$data["result"] = "OK";
					else 			
						$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
			 		$this->load->view('view_test_luscher',$data);
				} catch (Exception $e) {
					$data["result"] = "ERROR (".$e->getMessage().")";
		 			$this->load->view('view_test_luscher',$data);
				}
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_luscher',$data);
		}
		
	}

	/**
	 * Test de Raven
	 */
	function raven($num = 3){
		
		$data['num'] = $num;
		
		$data['timer'] = '';
		
		/* Obtengo el valor de todas las fichas */
		$id = 1;
		while ($id <= 60) {
			$data['s'.$id] = intval($this->input->post('s'.$id));
	    	$id++;  
		}

		/* Actualizo el valor seleccionado en la placa actual */
		$data['placa'] = intval($this->input->post('placa'));
		if($data['placa'] >= 1 AND $data['placa'] <= 60) {
			$data['s'.$data['placa']] = intval($this->input->post('item'));
		}

		$data['placa'] = $data['placa']+1;
			
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_pieza";
			 	$this->load->view('view_test_raven',$data);
			break;
			case 'select_pieza' :
		 		$data['timer'] = $this->input->post('timer');
			 	$data['source'] = "select_pieza";
			 	$this->load->view('view_test_raven',$data);
			break;
			case 'select_pieza_final' :
			case 'timeout' :  
		 		$data['timer'] = $this->input->post('timer');
		 		$data['source'] = "test_finished";
				$correctAnswers = $this->Test_model->getRavenCorrectAnswers($data);
				$usuario = $this->functionutils->getSession('SESSION_ID_USUARIO');
		 		try{
			 		$result = $this->Test_model->setRavenResults($usuario,$correctAnswers);
					if ($result["error"] == "0" )
						$data["result"] = "OK";
					else 			
						$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
						
			 		$this->load->view('view_test_raven',$data);
		 		
				} catch (Exception $e) {
					$data["result"] = "ERROR (".$e->getMessage().")";
		 			$this->load->view('view_test_raven',$data);
				}
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_raven',$data);
		}
	}
	
	/**
	 * Test de Domino D48
	 */
	function d48($num = 2){
		
		$data['num'] = $num;
		
		$data['timer'] = '';
		
		/* Obtengo el valor de todas las fichas */
		$id = 1;
		while ($id <= 48) {
			$data['s'.$id] = $this->input->post('s'.$id);
	    	$id++;  
		}
		
		/* Actualizo el valor seleccionado en la placa actual */
		$data['placa'] = intval($this->input->post('placa'));
		
		/* Guardo el valor de la ficha */
		if($data['placa'] >= 1 AND $data['placa'] <= 48) {
			$data['s'.$data['placa']] = intval($this->input->post('item1')).intval($this->input->post('item2'));
		}
		
		$data['placa'] = $data['placa']+1;
			
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_ficha";
			 	$this->load->view('view_test_d48',$data);
			break;
			case 'select_ficha' :
		 		$data['timer'] = $this->input->post('timer');
			 	$data['source'] = "select_ficha";
			 	$this->load->view('view_test_d48',$data);
			break;
			case 'select_ficha_final' : 
			case 'timeout' :  

		 		$data['timer'] = $this->input->post('timer');
		 		$data['source'] = "test_finished";
		 		
				$correctAnswers = $this->Test_model->getD48CorrectAnswers($data);
				$usuario = $this->functionutils->getSession('SESSION_ID_USUARIO');
				try {
		 			$result = $this->Test_model->setD48Results($usuario,$correctAnswers);
					if ($result["error"] == "0" )
						$data["result"] = "OK";
					else 			
						$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
						
			 		$this->load->view('view_test_d48',$data);
			 		
				} catch (Exception $e) {
					$data["result"] = "ERROR (".$e->getMessage().")";
		 			$this->load->view('view_test_d48',$data);
				}
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_d48',$data);
		}
	}
	
	/**
	 * Test de MIPS
	 */
	function mips($num = 4){
		
		$data['num'] = $num;
		
		$data['timer'] = '';
		
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_questions";
			 	$this->load->view('view_test_mips',$data);
			break;
			case 'select_questions' :
		 		
		 		$codError = NULL;
				$descError = NULL;
				$usuario = $this->functionutils->getSession('SESSION_ID_USUARIO');
				$data['source'] = "test_finished";
				/* Obtengo el valor de todas las placas */
				$data['q1'] = $this->input->post('q1');
				$id = 2;
				while ($id <= 180) {
					$data['q'.$id] = $this->input->post('q'.$id);
			    	$id++;  
				}
					
				$correctAnswers = $this->Test_model->getMIPSCorrectAnswers($data);
				try {
			 		$result = $this->Test_model->setMIPSResults($usuario,$correctAnswers);
					if ($result["error"] == "0" )
						$data["result"] = "OK";
					else 			
						$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
				 	$this->load->view('view_test_mips',$data);
				} catch (Exception $e) {
					$data["result"] = "ERROR (".$e->getMessage().")";
		 			$this->load->view('view_test_mips',$data);
				}
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_mips',$data);
		}
	}
	
	
	/**
	 * Test de Rorschach
	 */
	function rorschach($num = 5){
		
		$data['num'] = $num;
		
		/* Si no está seteado el número de mancha, fijo la 1. */
		$p = $this->input->post('pic');
		if($p == ""){
		 	$pic = 1;
		} else {
			$pic = intval($p);

		}
		
		/* Seteo el nombre de la key del array */
		$key = "img".$pic;
		
		/* Si borran un tag */
		$d = $this->input->post('del');
		if($d != ""){
			$del = intval($d);
			$rdata = $this->functionutils->getSession('RORSCHACH_DATA');
			unset($rdata[$key][$del]);
			$this->functionutils->setSession('RORSCHACH_DATA',$rdata);
			//Modifico el source para que no entre en el switch final
			$_POST["source"] = "select_img";
		}
		
		/* Agregado de un tag */
		if($this->input->post('description') != ""){	
			
			foreach($_POST as $id => $val){
				$$id = addslashes($val);
			}
			
			$tag['pictureid']  = $pic;
			$tag['top']  = $top;
			$tag['left']  = $left;
			$tag['width']  = $width;
			$tag['height']  = $height;
			$tag['description']  = $description;
		   $rdata = $this->functionutils->getSession('RORSCHACH_DATA');
		   $rdata[$key][] = $tag;
		   $this->functionutils->setSession('RORSCHACH_DATA',$rdata);
			//Modifico el source para que no entre en el switch final
			$_POST["source"] = "select_img";
		}

		/* Obtengo el valor de todas las placas */
		$rdata = $this->functionutils->getSession('RORSCHACH_DATA');

		/* La primera vez que se usa hay que setearlo como array para que no tire error el array_key_exists*/
		if(!is_array($rdata)) {
			$rdata = array();
		}
		
		/* Para que no tire warning por que no existe la key del array */
		if (array_key_exists($key, $rdata)) {
			$data["session_img"] = $rdata[$key];
		} else {
			$data["session_img"] = "";
		}
		
		/* Guardo el número de mancha */
		$data["pic"] = $pic;
		
		/* Derivo según la etapa en la que estoy */
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_img";
			 	$this->load->view('view_test_rorschach',$data);
			break;
			case 'select_img' :
			 	$data['source'] = "select_img";
			 	$this->load->view('view_test_rorschach',$data);
			break;
			case 'select_img_final' : 
		 		$data['source'] = "test_finished";
				$answers = $this->functionutils->getSession('RORSCHACH_DATA');
				$usuario = $this->functionutils->getSession('SESSION_ID_USUARIO');
				try {
					$result["error"] = 0;
					$result["desc"]  = "";
					$tagdata = "";
					if (is_array($answers)){
						foreach($answers as $tags){
							foreach($tags as $tag){
									$tagdata .= $tag['pictureid'].$this->sep;
									$tagdata .= $tag['top'].$this->sep;
									$tagdata .= $tag['left'].$this->sep;
									$tagdata .= $tag['width'].$this->sep;
									$tagdata .= $tag['height'].$this->sep;
									$tagdata .= $tag['description'].$this->sep;
									
							}
						}
						/** Elimino el último separador **/
						$tagdata = substr($tagdata,0,-1);
						$result = $this->Test_model->setRorschachResults($usuario,$tagdata);			

						if ($result["error"] == "0" )
							$data["result"] = "OK";
						else {			
							$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
							break;
						}
					} else {
						$result["error"] = "999";
						$result["desc"] = "No se ingresaron datos";
					}
						
			 		$this->functionutils->unsetSession('RORSCHACH_DATA');
			 		$this->load->view('view_test_rorschach',$data);
				} catch (Exception $e) {
					$data["result"] = "ERROR (".$e->getMessage().")";
		 			$this->load->view('view_test_rorschach',$data);
				}
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_rorschach',$data);
		}
	}
	
	public function informe(){
		
		$usuario = $this->input->post("informe_usuario");
		if(!$usuario || $usuario  == ""){
			$usuario = @$_GET["usuario"];
		}
		
		if(!$usuario || $usuario  == ""){
			echo "No se seleccionó un usuario";
			exit;
		}
		
		$informe  = $this->Test_model->getInforme($usuario);
		$data['informe'] = $informe["informe_info"];
		
		$data['perfil'] = "empresa"; // por ahora solo la empresa ingresa aqui.
		
		$this->load->view('view_test_informe', $data);
		
	}
	
}
?>