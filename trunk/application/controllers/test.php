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

	
	
}
?>