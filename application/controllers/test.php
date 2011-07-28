<?php 

class Test extends CI_Controller {
	
 	function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

	function index(){
		/** REALIZAR VALIDACION DE LOS TESTS A REALIZAR POR EL USUARIO**/
		/** E IR LLAMANDO A LOS TESTS QUE CORRESPONDAN VALIDANDO CON **/
		/** LO QUE LE FALTA REALIZAR SEGÚN LA INFO OBTENIDA DE LA BD **/

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
	/** METODOS SOLO PARA PRUEBAS INTERNAS **/
	
	function luscher($num){
		//echo $num;
		$data['num'] = $num;
		$data['c1'] = '';
		$data['c2'] = '';
		$data['timer1'] = '';
		$data['timer2'] = '';
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_colors1";
			 	$this->load->view('view_test_luscher',$data);
			break;
			case 'select_colors1' :
		 		$data['c1'] = $this->input->post('colors1');
		 		$data['timer1'] = $this->input->post('timer');
			 	$data['source'] = "select_colors2";
			 	$this->load->view('view_test_luscher',$data);
			break;
			case 'select_colors2' : 
		 		$data['c1'] = $this->input->post('colors1');
		 		$data['c2'] = $this->input->post('colors2');
		 		$data['timer1'] = $this->input->post('timer1');
		 		$data['timer2'] = $this->input->post('timer');
		 		$data['source'] = "test_finished";
		 		$this->load->view('view_test_luscher',$data);
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_luscher',$data);
		}
	}

	function raven($num){
	$data['num'] = $num;
		
		$data['timer'] = '';
		
		/* Obtengo el valor de todas las placas */
		$data['s1'] = $this->input->post('s1');
		$data['s2'] = $this->input->post('s2');
		$data['s3'] = $this->input->post('s3');
		$data['s4'] = $this->input->post('s4');	
		$data['s5'] = $this->input->post('s5');
		$data['s6'] = $this->input->post('s6');
		$data['s7'] = $this->input->post('s7');
		$data['s8'] = $this->input->post('s8');		
		$data['s9'] = $this->input->post('s9');	
		$data['s10'] = $this->input->post('s10');
		$data['s11'] = $this->input->post('s11');
		$data['s12'] = $this->input->post('s12');
		$data['s13'] = $this->input->post('s13');
		$data['s14'] = $this->input->post('s14');	
		$data['s15'] = $this->input->post('s15');
		$data['s16'] = $this->input->post('s16');
		$data['s17'] = $this->input->post('s17');
		$data['s18'] = $this->input->post('s18');		
		$data['s19'] = $this->input->post('s19');	
		$data['s20'] = $this->input->post('s20');	
		$data['s21'] = $this->input->post('s21');
		$data['s22'] = $this->input->post('s22');
		$data['s23'] = $this->input->post('s23');
		$data['s24'] = $this->input->post('s24');	
		$data['s25'] = $this->input->post('s25');
		$data['s26'] = $this->input->post('s26');
		$data['s27'] = $this->input->post('s27');
		$data['s28'] = $this->input->post('s28');		
		$data['s29'] = $this->input->post('s29');	
		$data['s30'] = $this->input->post('s30');
		$data['s31'] = $this->input->post('s31');
		$data['s32'] = $this->input->post('s32');
		$data['s33'] = $this->input->post('s33');
		$data['s34'] = $this->input->post('s34');	
		$data['s35'] = $this->input->post('s35');
		$data['s36'] = $this->input->post('s36');
		$data['s37'] = $this->input->post('s37');
		$data['s38'] = $this->input->post('s38');		
		$data['s39'] = $this->input->post('s39');	
		$data['s40'] = $this->input->post('s40');
		$data['s41'] = $this->input->post('s41');
		$data['s42'] = $this->input->post('s42');
		$data['s43'] = $this->input->post('s43');
		$data['s44'] = $this->input->post('s44');	
		$data['s45'] = $this->input->post('s45');
		$data['s46'] = $this->input->post('s46');
		$data['s47'] = $this->input->post('s47');
		$data['s48'] = $this->input->post('s48');
		$data['s49'] = $this->input->post('s49');
		$data['s50'] = $this->input->post('s50');
		$data['s51'] = $this->input->post('s51');
		$data['s52'] = $this->input->post('s52');
		$data['s53'] = $this->input->post('s53');
		$data['s54'] = $this->input->post('s54');	
		$data['s55'] = $this->input->post('s55');
		$data['s56'] = $this->input->post('s56');
		$data['s57'] = $this->input->post('s57');
		$data['s58'] = $this->input->post('s58');
		$data['s59'] = $this->input->post('s59');
		$data['s60'] = $this->input->post('s60');
		
		/* Actualizo el valor seleccionado en la placa actual */
		$data['placa'] = intval($this->input->post('placa'));
		switch ($data['placa']){
		case 1:
			$data['s1'] = intval($this->input->post('item'));
			break;
		case 2:
			$data['s2'] = intval($this->input->post('item'));
			break;
		case 3:
			$data['s3'] = intval($this->input->post('item'));
			break;
		case 4:
			$data['s4'] = intval($this->input->post('item'));
			break;
		case 5:
			$data['s5'] = intval($this->input->post('item'));
			break;
		case 6:
			$data['s6'] = intval($this->input->post('item'));
			break;
		case 7:
			$data['s7'] = intval($this->input->post('item'));
			break;
		case 8:
			$data['s8'] = intval($this->input->post('item'));
			break;
		case 9:
			$data['s9'] = intval($this->input->post('item'));
			break;
		case 10:
			$data['s10'] = intval($this->input->post('item'));
			break;
		case 11:
			$data['s11'] = intval($this->input->post('item'));
			break;
		case 12:
			$data['s12'] = intval($this->input->post('item'));
			break;
		case 13:
			$data['s13'] = intval($this->input->post('item'));
			break;
		case 14:
			$data['s14'] = intval($this->input->post('item'));
			break;
		case 15:
			$data['s15'] = intval($this->input->post('item'));
			break;
		case 16:
			$data['s16'] = intval($this->input->post('item'));
			break;
		case 17:
			$data['s17'] = intval($this->input->post('item'));
			break;
		case 18:
			$data['s18'] = intval($this->input->post('item'));
			break;
		case 19:
			$data['s19'] = intval($this->input->post('item'));
			break;
		case 20:
			$data['s20'] = intval($this->input->post('item'));
			break;
		case 21:
			$data['s21'] = intval($this->input->post('item'));
			break;
		case 22:
			$data['s22'] = intval($this->input->post('item'));
			break;
		case 23:
			$data['s23'] = intval($this->input->post('item'));
			break;
		case 24:
			$data['s24'] = intval($this->input->post('item'));
			break;
		case 25:
			$data['s25'] = intval($this->input->post('item'));
			break;
		case 26:
			$data['s26'] = intval($this->input->post('item'));
			break;
		case 27:
			$data['s27'] = intval($this->input->post('item'));
			break;
		case 28:
			$data['s28'] = intval($this->input->post('item'));
			break;
		case 29:
			$data['s29'] = intval($this->input->post('item'));
			break;
		case 30:
			$data['s30'] = intval($this->input->post('item'));
			break;
		case 31:
			$data['s31'] = intval($this->input->post('item'));
			break;
		case 32:
			$data['s32'] = intval($this->input->post('item'));
			break;
		case 33:
			$data['s33'] = intval($this->input->post('item'));
			break;
		case 34:
			$data['s34'] = intval($this->input->post('item'));
			break;
		case 35:
			$data['s35'] = intval($this->input->post('item'));
			break;
		case 36:
			$data['s36'] = intval($this->input->post('item'));
			break;
		case 37:
			$data['s37'] = intval($this->input->post('item'));
			break;
		case 38:
			$data['s38'] = intval($this->input->post('item'));
			break;
		case 39:
			$data['s39'] = intval($this->input->post('item'));
			break;
		case 40:
			$data['s40'] = intval($this->input->post('item'));
			break;
		case 41:
			$data['s41'] = intval($this->input->post('item'));
			break;
		case 42:
			$data['s42'] = intval($this->input->post('item'));
			break;
		case 43:
			$data['s43'] = intval($this->input->post('item'));
			break;
		case 44:
			$data['s44'] = intval($this->input->post('item'));
			break;
		case 45:
			$data['s45'] = intval($this->input->post('item'));
			break;
		case 46:
			$data['s46'] = intval($this->input->post('item'));
			break;
		case 47:
			$data['s47'] = intval($this->input->post('item'));
			break;
		case 48:
			$data['s48'] = intval($this->input->post('item'));
			break;
		case 49:
			$data['s49'] = intval($this->input->post('item'));
			break;
		case 50:
			$data['s50'] = intval($this->input->post('item'));
			break;
		case 51:
			$data['s51'] = intval($this->input->post('item'));
			break;
		case 52:
			$data['s52'] = intval($this->input->post('item'));
			break;
		case 53:
			$data['s53'] = intval($this->input->post('item'));
			break;
		case 54:
			$data['s54'] = intval($this->input->post('item'));
			break;
		case 55:
			$data['s55'] = intval($this->input->post('item'));
			break;
		case 56:
			$data['s56'] = intval($this->input->post('item'));
			break;
		case 57:
			$data['s57'] = intval($this->input->post('item'));
			break;
		case 58:
			$data['s58'] = intval($this->input->post('item'));
			break;
		case 59:
			$data['s59'] = intval($this->input->post('item'));
			break;
		case 60:
			$data['s60'] = intval($this->input->post('item'));
			break;
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
		 		$data['timer'] = $this->input->post('timer');
		 		$data['source'] = "test_finished";
		 		$this->load->view('view_test_raven',$data);
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_raven',$data);
		}
	}
	
	function d48($num){
		$data['num'] = $num;
		
		$data['timer'] = '';
		
		/* Obtengo el valor de todas las placas */
		$data['s1'] = $this->input->post('s1');
		$data['s2'] = $this->input->post('s2');
		$data['s3'] = $this->input->post('s3');
		$data['s4'] = $this->input->post('s4');	
		$data['s5'] = $this->input->post('s5');
		$data['s6'] = $this->input->post('s6');
		$data['s7'] = $this->input->post('s7');
		$data['s8'] = $this->input->post('s8');		
		$data['s9'] = $this->input->post('s9');	
		$data['s10'] = $this->input->post('s10');
		$data['s11'] = $this->input->post('s11');
		$data['s12'] = $this->input->post('s12');
		$data['s13'] = $this->input->post('s13');
		$data['s14'] = $this->input->post('s14');	
		$data['s15'] = $this->input->post('s15');
		$data['s16'] = $this->input->post('s16');
		$data['s17'] = $this->input->post('s17');
		$data['s18'] = $this->input->post('s18');		
		$data['s19'] = $this->input->post('s19');	
		$data['s20'] = $this->input->post('s20');	
		$data['s21'] = $this->input->post('s21');
		$data['s22'] = $this->input->post('s22');
		$data['s23'] = $this->input->post('s23');
		$data['s24'] = $this->input->post('s24');	
		$data['s25'] = $this->input->post('s25');
		$data['s26'] = $this->input->post('s26');
		$data['s27'] = $this->input->post('s27');
		$data['s28'] = $this->input->post('s28');		
		$data['s29'] = $this->input->post('s29');	
		$data['s30'] = $this->input->post('s30');
		$data['s31'] = $this->input->post('s31');
		$data['s32'] = $this->input->post('s32');
		$data['s33'] = $this->input->post('s33');
		$data['s34'] = $this->input->post('s34');	
		$data['s35'] = $this->input->post('s35');
		$data['s36'] = $this->input->post('s36');
		$data['s37'] = $this->input->post('s37');
		$data['s38'] = $this->input->post('s38');		
		$data['s39'] = $this->input->post('s39');	
		$data['s40'] = $this->input->post('s40');
		$data['s41'] = $this->input->post('s41');
		$data['s42'] = $this->input->post('s42');
		$data['s43'] = $this->input->post('s43');
		$data['s44'] = $this->input->post('s44');	
		$data['s45'] = $this->input->post('s45');
		$data['s46'] = $this->input->post('s46');
		$data['s47'] = $this->input->post('s47');
		$data['s48'] = $this->input->post('s48');
		
		/* Actualizo el valor seleccionado en la placa actual */
		$data['placa'] = intval($this->input->post('placa'));
		switch ($data['placa']){
		case 1:
			$data['s1'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 2:
			$data['s2'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 3:
			$data['s3'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 4:
			$data['s4'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 5:
			$data['s5'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 6:
			$data['s6'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 7:
			$data['s7'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 8:
			$data['s8'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 9:
			$data['s9'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 10:
			$data['s10'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 11:
			$data['s11'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 12:
			$data['s12'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 13:
			$data['s13'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 14:
			$data['s14'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 15:
			$data['s15'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 16:
			$data['s16'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 17:
			$data['s17'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 18:
			$data['s18'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 19:
			$data['s19'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 20:
			$data['s20'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 21:
			$data['s21'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 22:
			$data['s22'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 23:
			$data['s23'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 24:
			$data['s24'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 25:
			$data['s25'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 26:
			$data['s26'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 27:
			$data['s27'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 28:
			$data['s28'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 29:
			$data['s29'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 30:
			$data['s30'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 31:
			$data['s31'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 32:
			$data['s32'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 33:
			$data['s33'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 34:
			$data['s34'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 35:
			$data['s35'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 36:
			$data['s36'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 37:
			$data['s37'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 38:
			$data['s38'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 39:
			$data['s39'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 40:
			$data['s40'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 41:
			$data['s41'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 42:
			$data['s42'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 43:
			$data['s43'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 44:
			$data['s44'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 45:
			$data['s45'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 46:
			$data['s46'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 47:
			$data['s47'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;
		case 48:
			$data['s48'] = intval($this->input->post('item1')).intval($this->input->post('item2'));
			break;

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
		 		$data['timer'] = $this->input->post('timer');
		 		$data['source'] = "test_finished";
		 		$this->load->view('view_test_d48',$data);
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_d48',$data);
		}
	}
	
	
	function mips($num){
	$data['num'] = $num;
		
		$data['timer'] = '';
		
		/* Obtengo el valor de todas las placas */
		$data['q1'] = $this->input->post('q1');
		$data['q2'] = $this->input->post('q2');
		$data['q3'] = $this->input->post('q3');
		$data['q4'] = $this->input->post('q4');	
		$data['q5'] = $this->input->post('q5');
		$data['q6'] = $this->input->post('q6');
		$data['q7'] = $this->input->post('q7');
		$data['q8'] = $this->input->post('q8');		
		$data['q9'] = $this->input->post('q9');	
		$data['q10'] = $this->input->post('q10');
		$data['q11'] = $this->input->post('q11');
		$data['q12'] = $this->input->post('q12');
		$data['q13'] = $this->input->post('q13');
		$data['q14'] = $this->input->post('q14');	
		$data['q15'] = $this->input->post('q15');
		$data['q16'] = $this->input->post('q16');
		$data['q17'] = $this->input->post('q17');
		$data['q18'] = $this->input->post('q18');		
		$data['q19'] = $this->input->post('q19');	
		$data['q20'] = $this->input->post('q20');	
		$data['q21'] = $this->input->post('q21');
		$data['q22'] = $this->input->post('q22');
		$data['q23'] = $this->input->post('q23');
		$data['q24'] = $this->input->post('q24');	
		$data['q25'] = $this->input->post('q25');
		$data['q26'] = $this->input->post('q26');
		$data['q27'] = $this->input->post('q27');
		$data['q28'] = $this->input->post('q28');		
		$data['q29'] = $this->input->post('q29');	
		$data['q30'] = $this->input->post('q30');
		$data['q31'] = $this->input->post('q31');
		$data['q32'] = $this->input->post('q32');
		$data['q33'] = $this->input->post('q33');
		$data['q34'] = $this->input->post('q34');	
		$data['q35'] = $this->input->post('q35');
		$data['q36'] = $this->input->post('q36');
		$data['q37'] = $this->input->post('q37');
		$data['q38'] = $this->input->post('q38');		
		$data['q39'] = $this->input->post('q39');	
		$data['q40'] = $this->input->post('q40');
		$data['q41'] = $this->input->post('q41');
		$data['q42'] = $this->input->post('q42');
		$data['q43'] = $this->input->post('q43');
		$data['q44'] = $this->input->post('q44');	
		$data['q45'] = $this->input->post('q45');
		$data['q46'] = $this->input->post('q46');
		$data['q47'] = $this->input->post('q47');
		$data['q48'] = $this->input->post('q48');
		$data['q49'] = $this->input->post('q49');
		$data['q50'] = $this->input->post('q50');
		$data['q51'] = $this->input->post('q51');
		$data['q52'] = $this->input->post('q52');
		$data['q53'] = $this->input->post('q53');
		$data['q54'] = $this->input->post('q54');	
		$data['q55'] = $this->input->post('q55');
		$data['q56'] = $this->input->post('q56');
		$data['q57'] = $this->input->post('q57');
		$data['q58'] = $this->input->post('q58');
		$data['q59'] = $this->input->post('q59');
		$data['q60'] = $this->input->post('q60');
		$data['q61'] = $this->input->post('q61');
		$data['q62'] = $this->input->post('q62');
		$data['q63'] = $this->input->post('q63');
		$data['q64'] = $this->input->post('q64');	
		$data['q65'] = $this->input->post('q65');
		$data['q66'] = $this->input->post('q66');
		$data['q67'] = $this->input->post('q67');
		$data['q68'] = $this->input->post('q68');		
		$data['q69'] = $this->input->post('q69');	
		$data['q70'] = $this->input->post('q70');
		$data['q71'] = $this->input->post('q71');
		$data['q72'] = $this->input->post('q72');
		$data['q73'] = $this->input->post('q73');
		$data['q74'] = $this->input->post('q74');	
		$data['q75'] = $this->input->post('q75');
		$data['q76'] = $this->input->post('q76');
		$data['q77'] = $this->input->post('q77');
		$data['q78'] = $this->input->post('q78');		
		$data['q79'] = $this->input->post('q79');	
		$data['q80'] = $this->input->post('q80');
		$data['q81'] = $this->input->post('q81');
		$data['q82'] = $this->input->post('q82');
		$data['q83'] = $this->input->post('q83');
		$data['q84'] = $this->input->post('q84');	
		$data['q85'] = $this->input->post('q85');
		$data['q86'] = $this->input->post('q86');
		$data['q87'] = $this->input->post('q87');
		$data['q88'] = $this->input->post('q88');		
		$data['q89'] = $this->input->post('q89');	
		$data['q90'] = $this->input->post('q90');
		$data['q91'] = $this->input->post('q91');
		$data['q92'] = $this->input->post('q92');
		$data['q93'] = $this->input->post('q93');
		$data['q94'] = $this->input->post('q94');	
		$data['q95'] = $this->input->post('q95');
		$data['q96'] = $this->input->post('q96');
		$data['q97'] = $this->input->post('q97');
		$data['q98'] = $this->input->post('q98');		
		$data['q99'] = $this->input->post('q99');	
		$data['q100'] = $this->input->post('q100');
		$data['q101'] = $this->input->post('q101');
		$data['q102'] = $this->input->post('q102');
		$data['q103'] = $this->input->post('q103');
		$data['q104'] = $this->input->post('q104');	
		$data['q105'] = $this->input->post('q105');
		$data['q106'] = $this->input->post('q106');
		$data['q107'] = $this->input->post('q107');
		$data['q108'] = $this->input->post('q108');		
		$data['q109'] = $this->input->post('q109');	
		$data['q110'] = $this->input->post('q110');
		$data['q111'] = $this->input->post('q111');
		$data['q112'] = $this->input->post('q112');
		$data['q113'] = $this->input->post('q113');
		$data['q114'] = $this->input->post('q114');	
		$data['q115'] = $this->input->post('q115');
		$data['q116'] = $this->input->post('q116');
		$data['q117'] = $this->input->post('q117');
		$data['q118'] = $this->input->post('q118');		
		$data['q119'] = $this->input->post('q119');	
		$data['q120'] = $this->input->post('q120');	
		$data['q121'] = $this->input->post('q121');
		$data['q122'] = $this->input->post('q122');
		$data['q123'] = $this->input->post('q123');
		$data['q124'] = $this->input->post('q124');	
		$data['q125'] = $this->input->post('q125');
		$data['q126'] = $this->input->post('q126');
		$data['q127'] = $this->input->post('q127');
		$data['q128'] = $this->input->post('q128');		
		$data['q129'] = $this->input->post('q129');	
		$data['q130'] = $this->input->post('q130');
		$data['q131'] = $this->input->post('q131');
		$data['q132'] = $this->input->post('q132');
		$data['q133'] = $this->input->post('q133');
		$data['q134'] = $this->input->post('q134');	
		$data['q135'] = $this->input->post('q135');
		$data['q136'] = $this->input->post('q136');
		$data['q137'] = $this->input->post('q137');
		$data['q138'] = $this->input->post('q138');		
		$data['q139'] = $this->input->post('q139');	
		$data['q140'] = $this->input->post('q140');
		$data['q141'] = $this->input->post('q141');
		$data['q142'] = $this->input->post('q142');
		$data['q143'] = $this->input->post('q143');
		$data['q144'] = $this->input->post('q144');	
		$data['q145'] = $this->input->post('q145');
		$data['q146'] = $this->input->post('q146');
		$data['q147'] = $this->input->post('q147');
		$data['q148'] = $this->input->post('q148');
		$data['q149'] = $this->input->post('q149');
		$data['q150'] = $this->input->post('q150');
		$data['q151'] = $this->input->post('q151');
		$data['q152'] = $this->input->post('q152');
		$data['q153'] = $this->input->post('q153');
		$data['q154'] = $this->input->post('q154');	
		$data['q155'] = $this->input->post('q155');
		$data['q156'] = $this->input->post('q156');
		$data['q157'] = $this->input->post('q157');
		$data['q158'] = $this->input->post('q158');
		$data['q159'] = $this->input->post('q159');
		$data['q160'] = $this->input->post('q160');
		$data['q161'] = $this->input->post('q161');
		$data['q162'] = $this->input->post('q162');
		$data['q163'] = $this->input->post('q163');
		$data['q164'] = $this->input->post('q164');	
		$data['q165'] = $this->input->post('q165');
		$data['q166'] = $this->input->post('q166');
		$data['q167'] = $this->input->post('q167');
		$data['q168'] = $this->input->post('q168');		
		$data['q169'] = $this->input->post('q169');	
		$data['q170'] = $this->input->post('q170');
		$data['q171'] = $this->input->post('q171');
		$data['q172'] = $this->input->post('q172');
		$data['q173'] = $this->input->post('q173');
		$data['q174'] = $this->input->post('q174');	
		$data['q175'] = $this->input->post('q175');
		$data['q176'] = $this->input->post('q176');
		$data['q177'] = $this->input->post('q177');
		$data['q178'] = $this->input->post('q178');		
		$data['q179'] = $this->input->post('q179');	
		$data['q180'] = $this->input->post('q180');
		switch ($this->input->post('source')) {
			case 'init_test' :
			 	$data['source'] = "select_questions";
			 	$this->load->view('view_test_mips',$data);
			break;
			case 'select_questions' :
		 		$data['timer'] = $this->input->post('timer');
		 		$data['source'] = "test_finished";
			 	$this->load->view('view_test_mips',$data);
			break;
			default :
		 		$data['source'] = "init_test";
				$this->load->view('view_test_mips',$data);
		}
	}
}
?>