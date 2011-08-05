<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	
	function User(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
	}
	
	
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
	
	public function main_page(){
		echo 'You are logged in bitch';
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
			// Process their input and login the user
			extract($_POST);

			$user_id = $this->User_model->check_login($username, $password);
			
			if(! $user_id){
				//login failed error
				$this->session->set_flashdata('login_error', TRUE);
				redirect('user/login');				
			}
			else
			{
				//logem in
				$this->session->set_userdata('logged_in', TRUE);
				$this->session->set_userdata('user_id', $user_id);
				
				redirect('user/main_page');
			}
			
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
	}
	
	public function register(){
		
		$this->form_validation->set_rules('username', 'Nombre de usuario', 'trim|required|alapha_numeric|min_length[6]|xss_clean|strtolower|callback_username_not_exist');
		$this->form_validation->set_rules('name', 'Nombre', 'trim|required|alapha_numeric|min_length[6]|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]|xss_clean|valid_email');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|alapha_numeric|min_length[6]|xss_clean');
		$this->form_validation->set_rules('password_conf', 'Confirme Contraseña', 'trim|required|alapha_numeric|min_length[6]|matches[password]|xss_clean');
		
		if($this->form_validation->run() == FALSE)
		{
			//hasn't been run or there are validation errors
			$this->load->view('view_register', $this->view_data);
			
		}
		else 
		{
			//everything is good - process the form - write the data into the registration database.
			
			//$username, $name, $email, $password and $password_conf since here.
			extract($_POST);
			
			$activation_code = $this->random_string(10);
			
			$this->User_model->register_user($username, $password, $name, $email, $activation_code);

			//email confirmation
			$this->email->from('registracion@findresources.com.ar', 'Findresources');
			$this->email->to($email);
			$this->email->subject('Confirmacion de Registración');
			$this->email->message('Porfavor clickee este link para confirmar su registración. ' . anchor('http://localhost/tutorial/register_confirm/' . $activation_code, 'Confirme registracion'));

			//$this->email->send();
			//confirm view
			
			
		}
	}
	
	function username_not_exist($username){
		
		$this->form_validation->set_message('username_not_exist', 'El usuario ya existe, porfavor use otro nombre de usuario');
		
		if($this->User_model->check_exist_username($username)){
			return false;
		}
		else 
		{
			return true;
		}		
	}
	
	
	//TODO send this function to a class called String_helper
	function random_string($length)
	{
		$len = $length;
		$base = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
		$max = strlen($base) -1;
		$activatecode = '';
		mt_srand((double)microtime()*1000000);
		while (	strlen($activatecode)< $len + 1 ){
			$activatecode.= $base{mt_rand(0, $max)};
		}
		
		return $activatecode;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */