<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class OracleDB {

	public $conn_id = NULL;

	public $stmt_id = NULL;

	public $curs_id = NULL;

	public $result_array = NULL;

	public $error_code = NULL;

	public $error_desc = NULL;

	public $instance = NULL;

	/*  public function __contruct($params)
	 {
	 $CI->oracledb = new OracleDB();
	 $this->conn_id = $params["db"];
	  
	 }*/

	public function stored_procedure($conn,$package,$procedure,$params)
	{
		$this->conn_id = $conn;
		 
		$have_cursor = FALSE;

		$sql = "begin $package.$procedure(";
		$i = 0;
		foreach ($params as $param)
		{
			$sql .= $param['name'] . ",";
			if (array_key_exists('type', $param) && ($param['type'] == OCI_B_CURSOR))
			{
				$have_cursor = TRUE;
				$params[$i]['value'] = $this->_set_curs_id();
			}
			$i++;
		}
		$sql = trim($sql, ",") . "); end;";
		$this->_set_stmt_id($sql);
		$this->_bind_params($params);
		$this->_execute($have_cursor);
	}

	function _set_curs_id()
	{
		$this->curs_id = oci_new_cursor($this->conn_id);
		return $this->curs_id;
	}

	function _set_stmt_id($sql)
	{
		$this->stmt_id = ociparse($this->conn_id, $sql);
	}

	function _bind_params($params)
	{
		if ( ! is_array($params) OR ! is_resource($this->stmt_id))
		{
			return;
		}

		foreach ($params as $param)
		{
			foreach (array('name', 'value', 'type', 'length') as $val)
			{
				if ( ! isset($param[$val]))
				{
					$param[$val] = '';
				}
			}

			oci_bind_by_name($this->stmt_id, $param['name'], $param['value'], $param['length'], $param['type']);
		}
	}

	function _execute($have_cursor)
	{

		oci_execute($this->stmt_id);

		if ($have_cursor) {
			oci_execute($this->curs_id);

		}
		oci_free_statement($this->stmt_id);
	}

	public function get_cursor_data()
	{
		oci_fetch_all($this->curs_id,$this->result_array);
		oci_free_statement($this->curs_id);
		return $this->result_array;
	}
	
	public function close()
	{
		oci_close($this->conn_id);
	}
}
?>