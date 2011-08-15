<?php 

class Test extends CI_Controller {
	
	public $sep = ";";
	
 	function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->library('oracledb');
        $this->load->library('session');
    }

	function index(){
		/* Obtengo el separador */
		$query = $this->db->query('SELECT PKG_UTIL.FU_OBTIENE_SEPARADOR_SPLIT() SEPARADOR FROM DUAL');
		$row = $query->row_array();
		$this->sep = $row["SEPARADOR"];
		/** REALIZAR VALIDACION DE LOS TESTS A REALIZAR POR EL USUARIO**/
		/** E IR LLAMANDO A LOS TESTS QUE CORRESPONDAN VALIDANDO CON **/
		/** LO QUE LE FALTA REALIZAR SEGÚN LA INFO OBTENIDA DE LA BD **/
		
		/* USUARIO DE PRUEBA HASTA PODER TOMAR EL USUARIO REAL GUARDADO EN SESION */
		$this->session->set_userdata('usuario', "juan@juan.com");


		$luscher_state = ($this->session->userdata('luscher')) ? $this->session->userdata('luscher') : "PEND";
		$d48_state = ($this->session->userdata('d48')) ? $this->session->userdata('d48') : "PEND";
		$raven_state = ($this->session->userdata('raven')) ? $this->session->userdata('raven') : "PEND";
		
		$this->session->set_userdata('luscher', $luscher_state);
		$this->session->set_userdata('d48', $d48_state);
		$this->session->set_userdata('raven', $raven_state);
		if ($this->session->userdata('luscher') == "PEND") {
			$this->luscher("1");
		}else
		if ($this->session->userdata('d48') == "PEND") {
			$this->d48("2");
		} else
		if ($this->session->userdata('raven') == "PEND") {
			$this->raven("3");

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
				$usuario = $this->session->userdata('usuario');
				$seleccion_luscher1 = $this->input->post('colors1');
				$seleccion_luscher2 = $this->input->post('colors2');
				$result = $this->Test_model->setLuscherResults($usuario,$seleccion_luscher1,$seleccion_luscher2);
				if ($result["error"] == 0 )
					$data["result"] = "Test completado correctamente";
				else 			
					$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
		 		$data['source'] = "test_finished";
		 		$this->load->view('view_test_luscher',$data);
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
				$usuario = $this->session->userdata('usuario');
		 		$result = $this->Test_model->setRavenResults($usuario,$correctAnswers);
				if ($result["error"] == 0 )
					$data["result"] = "Test completado correctamente";
				else 			
					$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
					
		 		$this->load->view('view_test_raven',$data);
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
				$usuario = $this->session->userdata('usuario');
		 		$result = $this->Test_model->setD48Results($usuario,$correctAnswers);
				if ($result["error"] == 0 )
					$data["result"] = "Test completado correctamente";
				else 			
					$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
					
		 		$this->load->view('view_test_d48',$data);
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
				$usuario = $this->session->userdata('usuario');
				
				/* Obtengo el valor de todas las placas */
				$seleccion_mips = $this->input->post('q1');
				$id = 2;
				while ($id <= 180) {
					$data['q'.$id] = $this->input->post('q'.$id);
					//$seleccion_mips .= $this->input->post('q'.$id);
			    	$id++;  
				}
					
				$correctAnswers = $this->Test_model->getMIPSCorrectAnswers($data);
		 		$result = $this->Test_model->setMIPSResults($usuario,$correctAnswers);
				if ($result["error"] == 0 )
					$data["result"] = "Test completado correctamente";
				else 			
					$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];

					
		 		$data['source'] = "test_finished";
			 	$this->load->view('view_test_mips',$data);
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
			$rdata = $this->session->userdata('RORSCHACH_DATA');
			unset($rdata[$key][$del]);
			$this->session->set_userdata('RORSCHACH_DATA',$rdata);

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

		   $rdata = $this->session->userdata('RORSCHACH_DATA');
		   $rdata[$key][] = $tag;
		   $this->session->set_userdata('RORSCHACH_DATA',$rdata);

		}

		/* Obtengo el valor de todas las placas */
		$rdata = $this->session->userdata('RORSCHACH_DATA');

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
		 		//$data['session'] = $this->session->userdata('RORSCHACH_DATA');
				$answers = $this->session->userdata('RORSCHACH_DATA');
				$usuario = $this->session->userdata('usuario');
		 		$result = $this->Test_model->setRorschachResults($usuario,$answers);
		 		print_r($answers);
				if ($result["error"] == 0 )
					$data["result"] = "Test completado correctamente";
				else 			
					$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
					
		 		$this->session->sess_destroy();
		 		$this->load->view('view_test_rorschach',$data);
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_rorschach',$data);
		}
	}
	
}
?>