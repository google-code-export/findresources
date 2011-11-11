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
		/** TODO ONLY FOR DEMO **/
		if(strlen($result) != 60)
		$result ="BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
		/** TODO ONLY FOR DEMO **/
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
		/** TODO ONLY FOR DEMO **/
		if(strlen($result) != 48)
		$result ="BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
		/** TODO ONLY FOR DEMO **/
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
		/* ANALIS DE LOS RESULTADOS DE MIPS*/
		$result = "";
		$i = 1;
		while($i <= 180) {
			//TODO SOLO PARA LA DEMO, SE PODRIA AGREGAR UN NUEVO VALOR A V y F para contarlo como incorrecto X
			// POR BOTON FINALIZAR
				/* SOLO PARA DEMO */
				if($ravenAnswers["q".$i] == "") {
					$ravenAnswers["q".$i] = "V";
				}
				/* SOLO PARA DEMO */
				$result .= $ravenAnswers["q".$i]; 
				$i++;
		}
		/** TODO ONLY FOR DEMO **/
		if(strlen($result) != 180)
		$result ="VVVVVVVFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVFVVVVVVVVVVVVVVVVVVVVVVVVFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV";
		/** TODO ONLY FOR DEMO **/
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
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_III','PR_RORSCHACH_USUARIO',$params);

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
	
	
	public function getCorridas($idTest){
		
		$result["corridas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_ID_TEST', 'value'=>$idTest, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_TEST', 'value'=>&$result["corridas"], 'type'=>SQLT_RSET , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_III','pr_obtiene_corridas_x_id_test',$params);
		$result["corridas"] = $this->oracledb->get_cursor_data(":PO_TEST");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getInforme(): ' . $result["desc"]);
		}
		
	}
	

	public function getEstadisticas($idTest){
		
		$result["estadisticas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_ID_TEST', 'value'=>$idTest, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_ESTADISTICA', 'value'=>&$result["estadisticas"], 'type'=>SQLT_RSET , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_II','pr_estadistica_test',$params);
		$result["estadisticas"] = $this->oracledb->get_cursor_data(":PO_ESTADISTICA");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getInforme(): ' . $result["desc"]);
		}
		
	}


	public function getPropuestasCambios($idTest){
		
		$result["propuestas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_TEST', 'value'=>$idTest, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PO_PROPUESTAS', 'value'=>&$result["propuestas"], 'type'=>SQLT_RSET , 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_III','pr_obtiene_prop_de_cambio',$params);
		$result["propuestas"] = $this->oracledb->get_cursor_data(":PO_PROPUESTAS");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getInforme(): ' . $result["desc"]);
		}
		
	}
	
	public function getPropuestaCambioPorUsuario($idTest, $idCorrida, $usuario){
		$result["propuesta"] = NULL;
		$result["nota"] = NULL;
		
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_TEST', 'value'=>$idTest, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PI_ID_PSICOTECNICO', 'value'=>$idCorrida, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PO_PROPUESTA', 'value'=>&$result["propuesta"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_NOTA', 'value'=>&$result["nota"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_III','pr_obtiene_propuesta',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			// no result return empty string.
			$result["propuesta"] = "";
			$result["nota"] = "";
			
		}

	}
	
		
	public function setPropuestaCambioPorUsuario($idTest, $idCorrida, $usuario, $propuesta,$nota){
		
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_TEST', 'value'=>$idTest, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PI_ID_PSICOTECNICO', 'value'=>$idCorrida, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PI_PROPUESTA', 'value'=>$propuesta, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PI_NOTA', 'value'=>$nota, 'type'=>SQLT_CHR , 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TEST_III','pr_actualiza_prop_de_cambio',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getInforme(): ' . $result["desc"]);
		}

	}
	

}
?>