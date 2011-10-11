<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class FunctionUtils {

	/*  public function __contruct($params)
	 {
	  
	 }*/

	
	public function setSession($session_name,$data){
		$_SESSION[$session_name] = $data;
	}
	
	public function getSession($session_name){
		return @$_SESSION[$session_name];
	}
	
	public function unsetSession($session_name){
		unset($_SESSION[$session_name]);
	}


}
?>