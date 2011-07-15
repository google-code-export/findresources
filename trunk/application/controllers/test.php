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
			$this->luscher("2");

		} else
		if ($this->session->userdata('raven') == "PEND") {
			$this->luscher("3");

		}
	}
	
	function luscher($num){
		echo $num;
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
		$data['lamina'] = $this->input->post('lamina')+1;
		$data['c2'] = '';
		$data['timer1'] = '';
		$data['timer2'] = '';
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
	
	
}
?>