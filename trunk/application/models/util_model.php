<?php
class Util_model extends FR_Model {
	
	function Util_model() 
	{
		parent::__construct();
	}
	
	/**
	 * Busca en la db los estados civiles disponibles.
	 * @author martin.fox
	 * @param
	 * @return [{id, descripcion}]
	 * */
	public function  getEstadosCiviles(){
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':PO_SALIDA', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_UTIL','pr_obtiene_estado_civil',$params);
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			foreach ($dbRegistros as $i => $dbRegistro){
				$response[$i]->id  = $dbRegistro->ESTADO_CIVIL;
				$response[$i]->descripcion  = $dbRegistro->D_ESTADO_CIVIL;
			}
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
	}
	
	/**
	 * Busca en la db los paises disponibles.
	 * @author martin.fox
	 * @param
	 * @return [{id, descripcion}]
	 */
	public function  getPaises(){
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':PO_PAISES', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_UTIL','pr_obtiene_paises',$params);
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			//convert db data to model data.
			foreach ($dbRegistros as $i => $dbRegistro){
				$response[$i]->id  = $dbRegistro->PAIS;
				$response[$i]->descripcion  = $dbRegistro->DPAIS;
			}
			
			return $response;
		}
		else{
			
			/** CERRAR LA CONEXIÓN A LA BASE **/ 
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
	}
	
	/**
	/**
	 * Busca en la db las provincias de un pais.
	 * @author martin.fox
	 * @param idPais
	 * @return [{id, descripcion}]
	 */
	public function  getProvincias($idPais){

		/** LOAD DATABASE **/
//		$this->load->database();		
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
//		array('name'=>':PI_ID_PAIS', 'value'=>$idPais, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':PO_SALIDA', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_UTIL','pr_obtiene_provincias',$params);
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			foreach ($dbRegistros as $i => $dbRegistro){
				$response[$i]->id  = $dbRegistro->PROVINCIA;
				$response[$i]->descripcion  = $dbRegistro->D_PROVINCIA;
			}
			
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
	
	}

	/**
	 * Devuelve las habilidades diponibles para seleccionar.
	 * */
	public function  getListadoDeIndustriasDisponibles(){
		$respuesta[0]->id = 0; 
		$respuesta[0]->descripcion = "Petrolera";
		$respuesta[1]->id = 1; 
		$respuesta[1]->descripcion = "Banca";
		$respuesta[2]->id = 1; 
		$respuesta[2]->descripcion = "Gobierno";
		return $respuesta;
	}

	/**
	 * Devuelve las habilidades diponibles para seleccionar.
	 * */
	public function  getRubrosDisponibles(){
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':PO_SALIDA', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_UTIL','pr_obtiene_rubros',$params);
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			foreach ($dbRegistros as $i => $dbRegistro){
				$response[$i]->id  = $dbRegistro->ID_RUBRO;
				$response[$i]->descripcion  = $dbRegistro->D_RUBRO;
			}
			
			return $response;
		}
		else{
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
		
	}

	/**
	 * Devuelve las herramientas de un determinado rubro.
	 * Recibe por post el rubro correspondiente.
	 * */
	public function  getHerramientasPorRubro(){
		$respuesta[0]->id = 1; 
		$respuesta[0]->descripcion = "Java";
		$respuesta[1]->id = 2; 
		$respuesta[1]->descripcion = ".Net";
		$respuesta[2]->id = 3; 
		$respuesta[2]->descripcion = "Oracle";
		return $respuesta;
	}
	
}

?>
