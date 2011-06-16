<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->view('view_login');
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[200]|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('view_login');
			
		}
		else
		{
			
			echo 'Estas adentro nene';
			
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */