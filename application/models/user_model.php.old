<?php
class User_model extends CI_Model {
	
	function User_model() 
	{
		parent::__construct();
	}
	
	function check_login($username, $password)
	{
		
		$sha1_password = sha1($password);
		$query_str = "SELECT username FROM login_user WHERE username = ? and password = ? ";
		 
		
	    $result = $this->db->query($query_str, array($username, $sha1_password));
		
	    
	    if($result->num_rows() == 1)
	    {
		    return $result->row(0)->USERNAME;
	    }
	    else
	    {
	    	return false;
	    }
	}
	
	function register_user($username, $password, $name, $email, $activation_code){
		
		$sha1_password = sha1($password);
		
		$query_str = "INSERT INTO login_user (USERNAME, PASSWORD, NAME, EMAIL, ACTIVATION_CODE) VALUES (?, ?, ?, ?, ?)";
		
	    $result = $this->db->query($query_str, array($username, $sha1_password, $name, $email, $activation_code));
		
	}
	
	function check_exist_username($username)
	{
		$query_str = "SELECT username from login_user where username = ?";	
		
		$result = $this->db->query($query_str, $username);
		
		if( $result->num_rows() > 0 ){
			// username exists
			return true;
		}
		else 
		{
			// username doesn't exist.
			return false;	
		}
		
	}
	
	
}

?>