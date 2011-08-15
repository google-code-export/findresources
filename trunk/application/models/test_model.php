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
			
		return $result;

	}
	
	public function getRavenCorrectAnswers($ravenAnswers){
		/* LISTADO DE LOS RESULTADOS DE RAVEN*/
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
		
		/* ANALIS DE LOS RESULTADOS DE RAVEN*/
		$result = NULL;
		$i = 1;
		while($i <= 60) {
			if ($ravenAnswers["s".$i] == $answer[$i])
				$result[$i] .= "B";
			else
				$result[$i] .= "M"; 
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
			
		return $result;

	}
	
	public function getD48CorrectAnswers($ravenAnswers){
		/* LISTADO DE LOS RESULTADOS DE D48*/
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

		
		/* ANALIS DE LOS RESULTADOS DE D48*/
		$result = NULL;
		$i = 1;
		while($i <= 48) {
			if ($ravenAnswers["s".$i] == $answer[$i])
				$result[$i] .= "B";
			else
				$result[$i] .= "M"; 
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
			
		return $result;

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
		$answer[101] ="";
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
		$result = NULL;
		$i = 1;
		while($i <= 180) {
			if ($ravenAnswers["q".$i] == $answer[$i])
				$result[$i] .= "B";
			else
				$result[$i] .= "M"; 
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

		return $result;

	}
	public function setRorschachResults($usuario,$answers){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		/* Guardo los resultados del test*/
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_SELECCION_MIPS', 'value'=>$answers, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST','PR_RORSCHACH_USUARIO',$params);

		return $result;

	}
}
?>