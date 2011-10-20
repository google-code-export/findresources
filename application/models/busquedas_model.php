<?php
class Busquedas_model extends CI_Model {

	function Busquedas_model()
	{
		parent::__construct();
		/** SETEO SEPARADOR **/
		$query = $this->db->query('SELECT PKG_UTIL.FU_OBTIENE_SEPARADOR_SPLIT() SEPARADOR FROM DUAL');
		$row = $query->row_array();
		$this->sep = $row["SEPARADOR"];
	}
	
	

	/** CREA O MODIFICA BUSQUEDAS **/
	public function setBusqueda($idUsuario,$busqueda, $idTicket){
		$result["id_busqueda"] = NULL;
		$result["f_hasta"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_ID_BUSQUEDA', 'value'=>$busqueda["id_busqueda"], 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_D_TITULO', 'value'=>$busqueda["d_titulo"], 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_D_BUSQUEDA', 'value'=>$busqueda["d_busqueda"], 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CANTIDAD_RECURSOS', 'value'=>$busqueda["cantidad_recursos"], 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':PO_ID_BUSQUEDA', 'value'=>&$result["id_busqueda"], 'type'=>SQLT_CHR, 'length'=>255),
		array('name'=>':PO_F_HASTA', 'value'=>$result["f_hasta"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);

		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUSQUEDA',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
			throw new Exception('Oracle error message in setBusqueda(): ' . $result["desc"]);
		}

	}	
	/** CREO O MODIFICO LA EDUCACION FORMAL DE UNA BUSQUEDA **/
	public function  setEducacionFormalDeBusqueda($idBusqueda, $educacionFormal = "N"){
		$result["id_bus_edu_formal"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUS_EDU_FORMAL', 'value'=>$educacionFormal['id_bus_edu_formal'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_ENTIDAD_EDUCATIVA', 'value'=>$educacionFormal['id_entidad_educativa'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_D_ENTIDAD', 'value'=>$educacionFormal['d_entidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_ENTIDAD', 'value'=>$educacionFormal['c_modo_entidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_TITULO', 'value'=>$educacionFormal['titulo'], 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':PI_C_MODO_TITULO', 'value'=>$educacionFormal['c_modo_titulo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_NIVEL_EDUCACION', 'value'=>$educacionFormal['id_nivel_educacion'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_NIVEL_EDUCACION', 'value'=>$educacionFormal['c_modo_nivel_educacion'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_AREA', 'value'=>$educacionFormal['id_area'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_AREA', 'value'=>$educacionFormal['c_modo_area'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ESTADO', 'value'=>$educacionFormal['estado'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_ESTADO', 'value'=>$educacionFormal['c_modo_estado'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_PROMEDIO_DESDE', 'value'=>$educacionFormal['promedio_desde'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_PROMEDIO_HASTA', 'value'=>$educacionFormal['promedio_hasta'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_PROMEDIO', 'value'=>$educacionFormal['c_modo_promedio'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_BAJA', 'value'=>$educacionFormal['c_baja'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_id_bus_edu_formal', 'value'=>&$result["id_bus_edu_formal"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_EDUCACION_FORMAL',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setEducacionFormalDeBusqueda(): ' . $result["desc"]);
		}
			
	}
	/** CREO O MODIFICO LOS RECURSOS A BUSCAR **/
	public function  setRecursoBusqueda($idBusqueda, $cv){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_EDAD_DESDE', 'value'=>$cv['edad_desde'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_EDAD_HASTA', 'value'=>$cv['edad_hasta'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_EDAD_C_MODO', 'value'=>$cv['edad_c_modo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_NACIONALIDAD', 'value'=>$cv['nacionalidad'], 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':PI_PROVINCIA', 'value'=>$cv['provincia'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_LOCALIDAD', 'value'=>$cv['localidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_TWITTER_C_MODO', 'value'=>$cv['twitter_c_modo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_GTALK_C_MODO', 'value'=>$cv['gtalk_c_modo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_SMS_C_MODO', 'value'=>$cv['sms_c_modo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_CV',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setRecursoBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CREO O MODIFICO LAS INDUSTRIAS A BUSCAR **/
	public function  setIndustriasBusqueda($idBusqueda, $industrias){
		
		$parametro = "";
		foreach ($industrias as $industria){
			$parametro = $parametro .  
					$industria["id_industria"] . $this->sep . 
					$industria["valoracion"]  . $this->sep.
					$industria["importancia"] . $this->sep;
		}
		// Borro el último separador
		if ($parametro != "")
			$parametro = substr($parametro,0,-1);
			
		//var_dump($idBusqueda);
		//var_dump($parametro);
		
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_BUS_INDUSTRIA', 'value'=>$parametro, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_INDUSTRIA',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
			print_r($result);
			throw new Exception('Oracle error message in setIndustriasBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CREO O MODIFICO LAS HERRAMIENTAS A BUSCAR **/
	public function  setHerramientasBusqueda($idBusqueda, $herramientas){
		$parametro = "";
		foreach ($herramientas as $herramienta){
			$parametro = $parametro .  
					$herramienta["id_herramienta"] . $this->sep . 
					$herramienta["valor_herramienta"] . $this->sep.
					$herramienta["importancia"] . $this->sep;
		}
		// Borro el último separador
		if ($parametro != "")
			$parametro = substr($parametro,0,-1);
			
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_BUS_HERRAMIENTA', 'value'=>$parametro, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HERRAMIENTA',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setHerramientasBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CREO O MODIFICO LAS INDUSTRIAS A BUSCAR **/
	public function  setHabilidadesBlandasBusqueda($idBusqueda, $habilidadesBlandas){
		
		$result["error"] = NULL;
		$result["desc"] = NULL;

		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_BUS_HAB_BLANDA', 'value'=>$habilidadesBlandas, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HABILIDADES_BLANDAS',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setHabilidadesBlandasBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	/** CONSULTA LOS DATOS DE LA BUSQUEDA **/
	public function  getBusqueda($idBusqueda){

		$result["d_busqueda"] = NULL;
		$result["cantidad_recursos"] = NULL;
		$result["f_hasta"] = NULL;
		$result["d_titulo"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_D_BUSQUEDA', 'value'=>&$result["d_busqueda"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_CANTIDAD_RECURSOS', 'value'=>&$result["cantidad_recursos"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["f_hasta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_D_TITULO', 'value'=>&$result["d_titulo"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUSQUEDA',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CONSULTO LOS RECURSOS DE LA BUSQUEDA **/
	public function  getRecursoBusqueda($idBusqueda){
		$result2['edad_desde']= NULL;
		$result2['edad_hasta']= NULL;
		$result2['edad_c_modo']= NULL;
		$result2['lista_nacionalidad']= NULL;
		$result2['lista_provincia']= NULL;
		$result2['lista_localidad']= NULL;
		$result2['twitter_c_modo']= NULL;
		$result2['gtalk_c_modo']= NULL;
		$result2['sms_c_modo']= NULL;
		$result2["error"] = NULL;
		$result2["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_EDAD_DESDE', 'value'=>&$result2['edad_desde'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_EDAD_HASTA', 'value'=>&$result2['edad_hasta'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_EDAD_C_MODO', 'value'=>&$result2['edad_c_modo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_LISTA_NACIONALIDAD', 'value'=>&$result2['lista_nacionalidad'], 'type'=>SQLT_RSET, 'length'=>255),
	 		array('name'=>':PO_LISTA_PROVINCIA', 'value'=>&$result2['lista_provincia'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_LISTA_LOCALIDAD', 'value'=>&$result2['lista_localidad'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_TWITTER_C_MODO', 'value'=>&$result2['twitter_c_modo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_GTALK_C_MODO', 'value'=>&$result2['gtalk_c_modo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_SMS_C_MODO', 'value'=>&$result2['sms_c_modo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_CV',$params);
		$result2["lista_nacionalidad"] = $this->oracledb->get_cursor_data(":PO_LISTA_NACIONALIDAD");
		$result2["lista_provincia"] = $this->oracledb->get_cursor_data(":PO_LISTA_PROVINCIA");
		$result2["lista_localidad"] = $this->oracledb->get_cursor_data(":PO_LISTA_LOCALIDAD");
		$result["recurso"] = $result2;

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getRecursoBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CONSULTA DE EDUCACION FORMAL DE UNA BUSQUEDA **/
	public function  getEducacionFormalDeBusqueda($idBusqueda){
		
		$result['edu_formal'] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_EDU_FORMAL', 'value'=>&$result['edu_formal'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_EDU_FORMAL',$params);
		$result["edu_formal"] = $this->oracledb->get_cursor_data(":PO_EDU_FORMAL");

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getEducacionFormalDeBusqueda(): ' . $result["desc"]);
		}

		
	}
		
		
	/** CONSULTO LAS INDUSTRIAS DE UNA  BUSQUEDA**/
	public function  getIndustriasBusqueda($idBusqueda) {
		$result["lista_industria"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_LISTA_INDUSTRIA', 'value'=>&$result["lista_industria"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_INDUSTRIA',$params);
		$result["lista_industria"] = $this->oracledb->get_cursor_data(":PO_LISTA_INDUSTRIA");

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getIndustriasBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CONSULTO LAS HERRAMIENTAS DE UNA BUSQUEDA **/
	public function  getHerramientasBusqueda($idBusqueda){
		$result["lista_herramienta"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_LISTA_HERRAMIENTA', 'value'=>&$result["lista_herramienta"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_HERRAMIENTA',$params);
		$result["lista_herramienta"] = $this->oracledb->get_cursor_data(":PO_LISTA_HERRAMIENTA");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getHerramientasBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CONSULTO LAS HABILIDADES BLANDAS DE UNA BUSUQEDA **/
	public function  getHabilidadesBlandasBusqueda($idBusqueda){
		$result["hab_blanda"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_HAB_BLANDA', 'value'=>&$result["hab_blanda"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_HABILIDADES_BLANDAS',$params);
		$result["hab_blanda"] = $this->oracledb->get_cursor_data(":PO_HAB_BLANDA");

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getHabilidadesBlandasBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CONSULTO LAS HABILIDADES BLANDAS DE UNA BUSQUEDA **/
	public function  getBusquedasDeUsuario($idUsuario){
		$result["busquedas_activas"] = NULL;
		$result["busquedas_inactivas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_BUSQUEDAS_ACTIVAS', 'value'=>&$result["busquedas_activas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_BUSQUEDAS_INACTIVAS', 'value'=>&$result["busquedas_inactivas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUSQUEDAS_X_USUARIO',$params);
		$result["busquedas_activas"] = $this->oracledb->get_cursor_data(":PO_BUSQUEDAS_ACTIVAS");
		$result["busquedas_inactivas"] = $this->oracledb->get_cursor_data(":PO_BUSQUEDAS_INACTIVAS");
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getBusquedasDeUsuario(): ' . $result["desc"]);
		}
			
	}
	
	/** EXTIENDO FECHA DE LA BUSQUEDA **/
	public function  extenderBusqueda($idBusqueda,$idUsuario,$idTicket){
		$result["f_hasta"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["f_hasta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_EXTENDER_BUSQUEDA',$params);
		

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in extenderBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	/** EXTIENDO FECHA DE LA BUSQUEDA **/
	public function  getBusquedasAVencer($idUsuario,$dias){
		//Si días es 0 trae las búsquedas activas
		$result["busquedas_activas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_DIAS', 'value'=>$dias, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_BUSQUEDAS_ACTIVAS', 'value'=>&$result["busquedas_activas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUSQUEDAS_PROX_VENCER',$params);
		$result["busquedas_activas"] = $this->oracledb->get_cursor_data(":PO_BUSQUEDAS_ACTIVAS");
	
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getBusquedasAVencer(): ' . $result["desc"]);
		}
			
	}
	
	/** OBTENGO TODOS LOS DATOS DE UNA BUSQUEDA **/
	public function  getOpcionesDeBusqueda($idBusqueda){
		
		$temp1 = $this->getEducacionFormalDeBusqueda($idBusqueda);
		$result["edu_formal"] = $temp1["edu_formal"];
		$temp2 = $this->getHabilidadesBlandasBusqueda($idBusqueda);
		$result["hab_blanda"] = $temp2["hab_blanda"];
		$temp3 = $this->getHerramientasBusqueda($idBusqueda);
		$result["lista_herramienta"] = $temp3["lista_herramienta"];
		$temp4 = $this->getIndustriasBusqueda($idBusqueda);
		$result["lista_industria"] = $temp4["lista_industria"];
		$temp5 = $this->getRecursoBusqueda($idBusqueda);
		$result["recurso"] = $temp5["recurso"];
		$error = $temp1["error"] + $temp2["error"] + $temp3["error"] + $temp4["error"] + $temp5["error"];
		
		if ($error == 0) {
			$result["error"] = 0;
			$result["desc"] = NULL;
		} else {
			$result["error"] = 1;
			$result["desc"] = "Error al obtener información de las búsqueda.";
		}
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getOpcionesDeBusqueda(): ' . $result["desc"]);
		}
			
	}

	
	/** OBTENGO ESTADO DE BUSQUEDA **/
	public function  getEstadoBusqueda($idBusqueda){

		$result["d_busqueda"] = NULL;
		$result["cantidad_recursos"] = NULL;
		$result["f_hasta"] = NULL;
		$result["f_alta"] = NULL;
		$result["d_estado"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_TITULO', 'value'=>&$result["titulo"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_D_BUSQUEDA', 'value'=>&$result["d_busqueda"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_CANTIDAD_RECURSOS', 'value'=>&$result["cantidad_recursos"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["f_hasta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_F_ALTA', 'value'=>&$result["f_alta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_D_ESTADO', 'value'=>&$result["d_estado"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_ESTADO_BUSQUEDA',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getEstadoBusqueda(): ' . $result["desc"]);
		}
			
	}

	/** SETEO HISTORIA LABORAL EN BUSQUEDA **/
	public function  setHistoriaLaboral($idBusqueda,$historiaLaboral){
		$result["id_historia_laboral"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_HISTORIA_LABORAL', 'value'=>$historiaLaboral["id_historia_laboral"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_D_COMPANIA', 'value'=>$historiaLaboral["d_compania"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_COMPANIA', 'value'=>$historiaLaboral["c_modo_compania"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_INDUSTRIA', 'value'=>$historiaLaboral["id_industria"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_INDUSTRIA', 'value'=>$historiaLaboral["c_modo_industria"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_PAIS', 'value'=>$historiaLaboral["pais"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_PAIS', 'value'=>$historiaLaboral["c_modo_pais"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ANOS', 'value'=>$historiaLaboral["anos"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_ANOS', 'value'=>$historiaLaboral["c_modo_anos"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_D_TITULO', 'value'=>$historiaLaboral["titulo"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_TITULO', 'value'=>$historiaLaboral["c_modo_titulo"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_BAJA', 'value'=>$historiaLaboral["c_baja"], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_ID_HISTORIA_LABORAL', 'value'=>&$result["id_historia_laboral"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HISTORIA_LABORAL',$params);

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setHistoriaLaboral(): ' . $result["desc"]);
		}
			
	}
	

	/** OBTENGO HISTORIA LABORAL EN BUSQUEDA **/
	public function  getHistoriaLaboral($idBusqueda){
		$result["lista_historia_laboral"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_LISTA_HISTORIA_LABORAL', 'value'=>&$result["lista_historia_laboral"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_HISTORIA_LABORAL',$params);
		$result["lista_historia_laboral"] = $this->oracledb->get_cursor_data(":PO_LISTA_HISTORIA_LABORAL");

		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getHistoriaLaboral(): ' . $result["desc"]);
		}
			
	}
	
	
	/** OBTENGO RESULTADOS DE BUSQUEDA **/
	public function  getResultadoBusqueda($idBusqueda,$actualiza = "N"){
		$result["resultado_busqueda"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ACTUALIZA_BUSQUEDA', 'value'=>$actualiza, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_RESULTADO_BUSQUEDA', 'value'=>&$result["resultado_busqueda"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_CORREOS', 'value'=>&$result["correos"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_CORREOS_RECUERDO', 'value'=>&$result["correos_recuerdo"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_RESULTADO_BUSQUEDA',$params);
		$result["resultado_busqueda"] = $this->oracledb->get_cursor_data(":PO_RESULTADO_BUSQUEDA");
		$result["correos"] = $this->oracledb->get_cursor_data(":PO_CORREOS");
		$result["correos_recuerdo"] = $this->oracledb->get_cursor_data(":PO_CORREOS_RECUERDO");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in getResultadoBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	
	/** CAMBIAR ESTADO CV DE BUSQUEDA **/
	public function  cambiarEstadoCVBusqueda($idBusqueda,$estado,$observacion = ""){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_RES_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_ESTADO_CONTACTO', 'value'=>$estado, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_X_OBSERVACION', 'value'=>$observacion, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_ACT_EST_CV_BUSQUEDA',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in cambiarEstadoCVBusqueda(): ' . $result["desc"]);
		}
			
	}
	
	/** CAMBIAR ESTADO CV DE BUSQUEDA **/
	public function  setBajaBusqueda($idBusqueda){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BAJA_BUSQUEDA',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in setBajaBusqueda(): ' . $result["desc"]);
		}
			
	}
	
		
	/** REACTIVAR BUSQUEDA **/
	public function  activaBusqueda($idBusqueda,$idTicket,$usuario){
		$result["f_hasta"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_USUARIO', 'value'=>$usuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["f_hasta"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_ACTIVA_BUSQUEDA',$params);
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in activaBusqueda(): ' . $result["desc"]);
		}
			
	}

	/** Informe de puestos Solicitados 
	 * si idBusqueda es null o "", devuelve todas las busquedas del sistema. 
	 * **/
	public function  getBusquedasPorAreaDeNegocio($idBusqueda){
		$result["informe_busqueda"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_informe_busqueda', 'value'=>&$result["informe_busqueda"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','pr_cons_informe_busqueda',$params);
		
		$result["informe_busqueda"] = $this->oracledb->get_cursor_data(":PO_INFORME_BUSQUEDA");
		
		if($result["error"] == 0){
			return $result;		
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message in activaBusqueda(): ' . $result["desc"]);
		}
			
	}
}