<?php
class Test_model extends CI_Model {

	function Test_model()
	{
		parent::__construct();
	}

	public function setLuscherResults($usuario,$seleccion_luscher1,$seleccion_luscher2){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		/* Guardo los resultados del test*/
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_SELECCION_LUSCHER1', 'value'=>$seleccion_luscher1, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_SELECCION_LUSCHER2', 'value'=>$seleccion_luscher2, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST','PR_LUSCHER_USUARIO',$params);
			
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setLuscherResults(): ' . $result["desc"]);
		}

	}
	
	public function getRavenCorrectAnswers($ravenAnswers){
		/* LISTADO DE LOS RESULTADOS DE RAVEN*/
		
		$answer[1] ="4";
		$answer[2] ="5";
		$answer[3] ="1";
		$answer[4] ="2";
		$answer[5] ="6";
		$answer[6] = "3";
		$answer[7] = "6";
		$answer[8] = "2";
		$answer[9] = "1";
		$answer[10] = "3";
		$answer[11] = "5";
		$answer[12] = "4";
		$answer[13] = "2";
		$answer[14] = "6";
		$answer[15] = "1";
		$answer[16] = "2";
		$answer[17] = "1";
		$answer[18] = "3";
		$answer[19] = "5";
		$answer[20] = "6";
		$answer[21] = "4";
		$answer[22] = "3";
		$answer[23] = "4";
		$answer[24] = "5";
		$answer[25] = "8";
		$answer[26] = "2";
		$answer[27] = "3";
		$answer[28] = "8";
		$answer[29] = "7";
		$answer[30] = "4";
		$answer[31] = "5";
		$answer[32] = "1";
		$answer[33] = "7";
		$answer[34] = "6";
		$answer[35] = "1";
		$answer[36] = "2";
		$answer[37] = "3";
		$answer[38] = "4";
		$answer[39] = "3";
		$answer[40] = "7";
		$answer[41] = "8";
		$answer[42] = "6";
		$answer[43] = "5";
		$answer[44] = "4";
		$answer[45] = "1";
		$answer[46] = "2";
		$answer[47] = "5";
		$answer[48] = "6";
		$answer[49] = "7";
		$answer[50] = "6";
		$answer[51] = "8";
		$answer[52] = "2";
		$answer[53] = "1";
		$answer[54] = "5";
		$answer[55] = "2";
		$answer[56] = "4";
		$answer[57] = "1";
		$answer[58] = "6";
		$answer[59] = "3";
		$answer[60] = "5";
		
		/* ANALIS DE LOS RESULTADOS DE RAVEN*/
		$result = "";
		$i = 1;
		while($i <= 60) {
			if ($ravenAnswers["s".$i] == $answer[$i])
				$result .= "B";
			else
				$result .= "M"; 
			$i++;
		}
		return $result;

	}
	
	public function setRavenResults($usuario,$ravenResults){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		/* Guardo los resultados del test*/
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_RESULTS', 'value'=>$ravenResults, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST','PR_RAVEN_USUARIO',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setRavenResults(): ' . $result["desc"]);
		}
	}
	
	public function getD48CorrectAnswers($ravenAnswers){
		/* LISTADO DE LOS RESULTADOS DE D48*/
		$answer[1]  ="24";
		$answer[2]  ="61";
		$answer[3]  ="35";
		$answer[4]  ="02";
		$answer[5]  ="41";
		$answer[6]  ="36";
		$answer[7]  ="52";
		$answer[8]  ="04";
		$answer[9]  ="26";
		$answer[10] ="33";
		$answer[11] ="40";
		$answer[12] ="51";
		$answer[13] ="23";
		$answer[14] ="56";
		$answer[15] ="14";
		$answer[16] ="25";
		$answer[17] ="60";
		$answer[18] ="14";
		$answer[19] ="22";
		$answer[20] ="15";
		$answer[21] ="04";
		$answer[22] ="63";
		$answer[23] ="21";
		$answer[24] ="35";
		$answer[25] ="64";
		$answer[26] ="30";
		$answer[27] ="15";
		$answer[28] ="24";
		$answer[29] ="55";
		$answer[30] ="36";
		$answer[31] ="56";
		$answer[32] ="40";
		$answer[33] ="44";
		$answer[34] ="10";
		$answer[35] ="62";
		$answer[36] ="35";
		$answer[37] ="60";
		$answer[38] ="46";
		$answer[39] ="35";
		$answer[40] ="21";
		$answer[41] ="51";
		$answer[42] ="06";
		$answer[43] ="46";
		$answer[44] ="30";
		$answer[45] ="25";
		$answer[46] ="56";
		$answer[47] ="22";
		$answer[48] ="13";

		
		/* ANALIS DE LOS RESULTADOS DE D48*/
		$result = "";
		$i = 1;
		while($i <= 48) {
			if ($ravenAnswers["s".$i] == $answer[$i])
				$result .= "B";
			else
				$result .= "M"; 
			$i++;
		}
		return $result;

	}
	
	public function setD48Results($usuario,$d48Results){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		/* Guardo los resultados del test*/
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_RESULTS', 'value'=>$d48Results, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST','PR_D48_USUARIO',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setD48Results(): ' . $result["desc"]);
		}

	}
	
	public function getMIPSCorrectAnswers($ravenAnswers){
		/* LISTADO DE LOS RESULTADOS DE MIPS*/
		$answer[1] ="";
		$answer[2] ="";
		$answer[3] ="";
		$answer[4] ="";
		$answer[5] ="";
		$answer[6] ="";
		$answer[7] ="";
		$answer[8] ="";
		$answer[9] ="";
		$answer[10] ="";
		$answer[11] ="";
		$answer[12] ="";
		$answer[13] ="";
		$answer[14] ="";
		$answer[15] ="";
		$answer[16] ="";
		$answer[17] ="";
		$answer[18] ="";
		$answer[19] ="";
		$answer[20] ="";
		$answer[21] ="";
		$answer[22] ="";
		$answer[23] ="";
		$answer[24] ="";
		$answer[25] ="";
		$answer[26] ="";
		$answer[27] ="";
		$answer[28] ="";
		$answer[29] ="";
		$answer[30] ="";
		$answer[31] ="";
		$answer[32] ="";
		$answer[33] ="";
		$answer[34] ="";
		$answer[35] ="";
		$answer[36] ="";
		$answer[37] ="";
		$answer[38] ="";
		$answer[39] ="";
		$answer[40] ="";
		$answer[41] ="";
		$answer[42] ="";
		$answer[43] ="";
		$answer[44] ="";
		$answer[45] ="";
		$answer[46] ="";
		$answer[47] ="";
		$answer[48] ="";
		$answer[49] ="";
		$answer[50] ="";
		$answer[51] ="";
		$answer[52] ="";
		$answer[53] ="";
		$answer[54] ="";
		$answer[55] ="";
		$answer[56] ="";
		$answer[57] ="";
		$answer[58] ="";
		$answer[59] ="";
		$answer[60] ="";
		$answer[61] ="";
		$answer[62] ="";
		$answer[63] ="";
		$answer[64] ="";
		$answer[65] ="";
		$answer[66] ="";
		$answer[67] ="";
		$answer[68] ="";
		$answer[69] ="";
		$answer[70] ="";
		$answer[71] ="";
		$answer[72] ="";
		$answer[73] ="";
		$answer[74] ="";
		$answer[75] ="";
		$answer[76] ="";
		$answer[77] ="";
		$answer[78] ="";
		$answer[79] ="";
		$answer[80] ="";
		$answer[81] ="";
		$answer[82] ="";
		$answer[83] ="";
		$answer[84] ="";
		$answer[85] ="";
		$answer[86] ="";
		$answer[87] ="";
		$answer[88] ="";
		$answer[89] ="";
		$answer[90] ="";
		$answer[91] ="";
		$answer[92] ="";
		$answer[93] ="";
		$answer[94] ="";
		$answer[95] ="";
		$answer[96] ="";
		$answer[97] ="";
		$answer[98] ="";
		$answer[99] ="";
		$answer[100] ="";
		$answer[101] ="";
		$answer[102] ="";
		$answer[103] ="";
		$answer[104] ="";
		$answer[105] ="";
		$answer[106] ="";
		$answer[107] ="";
		$answer[108] ="";
		$answer[109] ="";
		$answer[110] ="";
		$answer[111] ="";
		$answer[112] ="";
		$answer[113] ="";
		$answer[114] ="";
		$answer[115] ="";
		$answer[116] ="";
		$answer[117] ="";
		$answer[118] ="";
		$answer[119] ="";
		$answer[120] ="";
		$answer[121] ="";
		$answer[122] ="";
		$answer[123] ="";
		$answer[124] ="";
		$answer[125] ="";
		$answer[126] ="";
		$answer[127] ="";
		$answer[128] ="";
		$answer[129] ="";
		$answer[130] ="";
		$answer[131] ="";
		$answer[132] ="";
		$answer[133] ="";
		$answer[134] ="";
		$answer[135] ="";
		$answer[136] ="";
		$answer[137] ="";
		$answer[138] ="";
		$answer[139] ="";
		$answer[140] ="";
		$answer[141] ="";
		$answer[142] ="";
		$answer[143] ="";
		$answer[144] ="";
		$answer[145] ="";
		$answer[146] ="";
		$answer[147] ="";
		$answer[148] ="";
		$answer[149] ="";
		$answer[150] ="";
		$answer[151] ="";
		$answer[152] ="";
		$answer[153] ="";
		$answer[154] ="";
		$answer[155] ="";
		$answer[156] ="";
		$answer[157] ="";
		$answer[158] ="";
		$answer[159] ="";
		$answer[160] ="";
		$answer[161] ="";
		$answer[162] ="";
		$answer[163] ="";
		$answer[164] ="";
		$answer[165] ="";
		$answer[166] ="";
		$answer[167] ="";
		$answer[168] ="";
		$answer[169] ="";
		$answer[170] ="";
		$answer[171] ="";
		$answer[172] ="";
		$answer[173] ="";
		$answer[174] ="";
		$answer[175] ="";
		$answer[176] ="";
		$answer[177] ="";
		$answer[178] ="";
		$answer[179] ="";
		$answer[180] ="";
		/* ANALIS DE LOS RESULTADOS DE MIPS*/
		$result = "";
		$i = 1;
		while($i <= 180) {
			if ($ravenAnswers["q".$i] == $answer[$i])
				$result .= "B";
			else
				$result .= "M"; 
			$i++;
		}
		return $result;

	}
	
	public function setMIPSResults($usuario,$mipsResults){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		/* Guardo los resultados del test*/
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_SELECCION_MIPS', 'value'=>$mipsResults, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST','PR_MIPS_USUARIO',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setMIPSResults(): ' . $result["desc"]);
		}

	}
	
	public function setRorschachResults($usuario,$answers){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		/* Guardo los resultados del test*/
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_SELECCION_RORSCHACH', 'value'=>$answers, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST','PR_RORSCHACH_USUARIO',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setRorschachResults(): ' . $result["desc"]);
		}

	}
	
	
	public function getTestsPendientes($usuario){
		$result["test_pendientes"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_TEST_PENDIENTES', 'value'=>&$result["test_pendientes"], 'type'=>SQLT_RSET , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_II','PR_TEST_PENDIENTES',$params);
		$result["test_pendientes"] = $this->oracledb->get_cursor_data(":PO_TEST_PENDIENTES");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getTestsPendientes(): ' . $result["desc"]);
		}

	}
	
	public function getInforme($usuario){
		$result["informe_info"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_INFORME', 'value'=>&$result["informe_info"], 'type'=>SQLT_RSET , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_II','PR_INFORME_USUARIO',$params);
		$result["informe_info"] = $this->oracledb->get_cursor_data(":PO_INFORME");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getInforme(): ' . $result["desc"]);
		}

	}
	
}
?>