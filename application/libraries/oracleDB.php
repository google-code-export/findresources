<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class OracleDB {

	public $conn_id = NULL;

	public $stmt_id = NULL;

	public $curs_id = array();

	public $result_array = array();

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
				$params[$i]['value'] = $this->_set_curs_id($param['name']);
				echo "--";
				var_dump($param);
				echo "--";
			}
			$i++;
		}
		$sql = trim($sql, ",") . "); end;";
		$this->_set_stmt_id($sql);
		$this->_bind_params($params);
		$this->_execute($have_cursor);
	}

	function _set_curs_id($name = '')
	{
		$this->curs_id[$name] = oci_new_cursor($this->conn_id);
		return $this->curs_id[$name];
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
			foreach ($this->curs_id as $cursor)
				oci_execute($cursor);

		}
		oci_free_statement($this->stmt_id);
	}

	public function get_cursor_data($name = '')
	{
		oci_fetch_all($this->curs_id[$name],$temp[$name]);
		oci_free_statement($this->curs_id[$name]);
		$this->result_array[$name] = array();
		/* FIX Para guardar el resultado como un array clásico */
		foreach($temp[$name] as $fieldName => $aField){
			//oracle return the values in caps lock, and we use lower case.
			$fieldName = strtolower($fieldName);
			foreach($aField as $index => $aValue){
				$this->result_array[$name][$index]->$fieldName = $aValue;
			}
		}
		return $this->result_array[$name];
	}
	
	public function close()
	{
		oci_close($this->conn_id);
	}
}
?>