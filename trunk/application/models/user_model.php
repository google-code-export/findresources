<?php
class User_model extends CI_Model {
	
	function User_model() 
	{
		parent::__construct();
	}
	
	function check_login($username, $password)
	{
		
		//$shal_password = shal($password);
		$query_str = "SELECT username FROM login_user WHERE username = ? and password = ? ";
		 
		
		//Change this by an store procedure.
	    $result = $this->db->query($query_str, array($username, $password));

	    if($result->num_rows() == 1)
	    {
	    	return $result->row(0)->username;
	    }
	    else
	    {
	    	return false;
	    }
	}
}

?>