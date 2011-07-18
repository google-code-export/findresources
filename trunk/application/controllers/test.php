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
}
?>