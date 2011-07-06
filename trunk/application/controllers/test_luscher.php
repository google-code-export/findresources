<?php 

class Test_Luscher extends CI_Controller {
	
 	function __construct() {
        parent::__construct();
    }

	function index(){
		$data['c1'] = '';
		$data['c2'] = '';
		if($this->input->post('sex') == '') {
			$data['source'] = "select_sex";
			$this->load->view('view_test_luscher',$data);
		 } else {
		 	if ($this->input->post('colors1') == '') {
			 	$data['source'] = "select_colors1";
			 	$this->load->view('view_test_luscher',$data);
		 	} else {
		 		if ($this->input->post('colors2') == '') {
		 			$data['c1'] = $this->input->post('colors1');
			 		$data['source'] = "select_colors2";
			 		$this->load->view('view_test_luscher',$data);
		 		} else {
		 			$data['c1'] = $this->input->post('colors1');
		 			$data['c2'] = $this->input->post('colors2');
		 			$data['source'] = "test_finished";
		 			$this->load->view('view_test_luscher',$data);
		 		}
		 	}
		 }
	}

	
	
}
?>