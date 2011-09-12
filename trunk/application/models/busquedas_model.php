<?php
class Busquedas_model extends FR_Model {

	function Busquedas_model()
	{
		parent::__construct();
	}
	
	

	/** CREA O MODIFICA BUSQUEDAS **/
	public function setBusqueda($idBusqueda,$idUsuario,$descripcionBusqueda,$idTicket,$cantidadRecursos,$fechaHasta){
		$result["idBusqueda"] = NULL;
		$result["fechaHastaOut"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_D_BUSQUEDA', 'value'=>$descripcionBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CANTIDAD_RECURSOS', 'value'=>$cantidadRecursos, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_F_HASTA', 'value'=>$fechaHasta, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_ID_BUSQUEDA', 'value'=>&$result["idBusqueda"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_F_HASTA', 'value'=>$result["fechaHastaOut"], 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUSQUEDA',$params);
			
		return $result;

	}	
	/** CREO O MODIFICO LA EDUCACION FORMAL DE UNA BUSQUEDA **/
	public function  setEducacionFormalDeBusqueda($idBusqueda, $educacionFormal){
		$result["idEducacionFormal"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_educacion_formal_cv', 'value'=>$educacionFormal['id'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_entidad_educativa', 'value'=>$educacionFormal['idEntidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_d_entidad', 'value'=>$educacionFormal['descripcionEntidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_c_modo_entidad', 'value'=>$educacionFormal['modoEntidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_titulo', 'value'=>$educacionFormal['titulo'], 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':pi_c_modo_titulo', 'value'=>$educacionFormal['modoTitulo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_nivel_educacion', 'value'=>$educacionFormal['idNivelEducacion'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_c_modo_nivel_educacion', 'value'=>$educacionFormal['modoNivelEducacion'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_area', 'value'=>$educacionFormal['idArea'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_c_modo_area', 'value'=>$educacionFormal['modoArea'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_estado', 'value'=>$educacionFormal['estado'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_c_modo_estado', 'value'=>$educacionFormal['modoEstado'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_promedio_desde', 'value'=>$educacionFormal['promedioDesde'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_promedio_hasta', 'value'=>$educacionFormal['promedioHasta'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_c_modo_promedio', 'value'=>$educacionFormal['modoPromedio'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_c_baja', 'value'=>$educacionFormal['baja'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_id_bus_edu_formal', 'value'=>&$result["idEducacionFormal"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_EDUCACION_FORMAL',$params);
		
		return $result;
			
	}
	/** CREO O MODIFICO LOS RECURSOS A BUSCAR **/
	public function  setRecursoBusqueda($idBusqueda, $cv){

		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_edad_desde', 'value'=>$cv['edadDesde'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_edad_hasta', 'value'=>$cv['edadHasta'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_edad_c_modo', 'value'=>$cv['edadModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_nacionalidad', 'value'=>$cv['nacionalidad'], 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':pi_provincia', 'value'=>$cv['provincia'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_localidad', 'value'=>$cv['localidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_twitter_c_modo', 'value'=>$cv['twitterModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_gtalk_c_modo', 'value'=>$cv['gtalkModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_sms_c_modo', 'value'=>$cv['smsModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_CV',$params);
		
		return $result;
			
	}
	
	
	/** CREO O MODIFICO LAS INDUSTRIAS A BUSCAR **/
	public function  setIndustriasBusqueda($idBusqueda, $industrias){

		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_bus_industria', 'value'=>$industrias, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_INDUSTRIA',$params);
		
		return $result;
			
	}
	
	
	/** CREO O MODIFICO LAS HERRAMIENTAS A BUSCAR **/
	public function  setHerramientasBusqueda($idBusqueda, $herramientas){

		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_bus_herramienta', 'value'=>$herramientas, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HERRAMIENTA',$params);
		
		return $result;
			
	}
	
	
	/** CREO O MODIFICO LAS INDUSTRIAS A BUSCAR **/
	public function  setHabilidadesBlandasBusqueda($idBusqueda, $habilidadesBlandas){

		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_bus_hab_blanda', 'value'=>$habilidadesBlandas, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HABILIDADES_BLANDAS',$params);
		
		return $result;
			
	}
	
	/** CONSULTA LOS DATOS DE LA BUSQUEDA **/
	public function  getBusqueda($idBusqueda){

		$result["descripcionBusqueda"] = NULL;
		$result["cantidadRecursos"] = NULL;
		$result["fechaHasta"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_D_BUSQUEDA', 'value'=>&$result["descripcionBusqueda"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_CANTIDAD_RECURSOS', 'value'=>&$result["cantidadRecursos"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["fechaHasta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUSQUEDA',$params);
		
		return $result;
			
	}
	
	
	/** CONSULTO LOS RECURSOS DE LA BUSQUEDA **/
	public function  getRecursoBusqueda($idBusqueda){
		$result['edadDesde']= NULL;
		$result['edadHasta']= NULL;
		$result['edadModo']= NULL;
		$result['nacionalidad']= NULL;
		$result['provincia']= NULL;
		$result['localidad']= NULL;
		$result['twitterModo']= NULL;
		$result['gtalkModo']= NULL;
		$result['smsModo']= NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_edad_desde', 'value'=>&$result['edadDesde'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':po_edad_hasta', 'value'=>&$result['edadHasta'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':po_edad_c_modo', 'value'=>&$result['edadModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':po_lista_nacionalidad', 'value'=>&$result['nacionalidad'], 'type'=>SQLT_RSET, 'length'=>255),
	 		array('name'=>':po_lista_provincia', 'value'=>&$result['provincia'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':po_lista_localidad', 'value'=>&$result['localidad'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':po_twitter_c_modo', 'value'=>&$result['twitterModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':po_gtalk_c_modo', 'value'=>&$result['gtalkModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':po_sms_c_modo', 'value'=>&$result['smsModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_CV',$params);
		$result["nacionalidad"] = $this->oracledb->get_cursor_data(":po_lista_nacionalidad");
		$result["provincia"] = $this->oracledb->get_cursor_data(":po_lista_provincia");
		$result["localidad"] = $this->oracledb->get_cursor_data(":po_lista_localidad");
		return $result;
			
	}
	
	
	/** CONSULTA DE EDUCACION FORMAL DE UNA BUSQUEDA **/
	public function  getEducacionFormalDeBusqueda($idBusqueda){
		
		$result['educacionFormal'] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_edu_formal', 'value'=>&$result['educacionFormal'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_EDU_FORMAL',$params);
		$result["educacionFormal"] = $this->oracledb->get_cursor_data(":po_edu_formal");
		return $result;

		
	}
		
		
	/** CONSULTO LAS INDUSTRIAS DE UNA  BUSQUEDA**/
	public function  getIndustriasBusqueda($idBusqueda) {
		$result["industrias"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_bus_industria', 'value'=>&$result["industrias"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_INDUSTRIA',$params);
		$result["industrias"] = $this->oracledb->get_cursor_data(":po_bus_industria");
		return $result;
			
	}
	
	
	/** CONSULTO LAS HERRAMIENTAS DE UNA BUSQUEDA **/
	public function  getHerramientasBusqueda($idBusqueda){
		$result["herramientas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_lista_herramienta', 'value'=>&$result["herramientas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_HERRAMIENTA',$params);
		$result["herramientas"] = $this->oracledb->get_cursor_data(":po_lista_herramienta");
		return $result;
			
	}
	
	
	/** CONSULTO LAS HABILIDADES BLANDAS DE UNA BUSUQEDA **/
	public function  getHabilidadesBlandasBusqueda($idBusqueda){
		$result["habilidadesBlandas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':pi_id_busqueda', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_hab_blanda', 'value'=>&$result["habilidadesBlandas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_HABILIDADES_BLANDAS',$params);
		$result["habilidadesBlandas"] = $this->oracledb->get_cursor_data(":po_hab_blanda");
		return $result;
			
	}
	
	
	/** CONSULTO LAS HABILIDADES BLANDAS DE UNA BUSQUEDA **/
	public function  getBusquedasDeUsuario($idUsuario){
		$result["busquedasActivas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_BUSQUEDAS_ACTIVAS', 'value'=>&$result["busquedasActivas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUSQUEDAS_X_USUARIO',$params);
		$result["busquedasActivas"] = $this->oracledb->get_cursor_data(":PO_BUSQUEDAS_ACTIVAS");
		/*$dbRegistros = $this->oracledb->get_cursor_data();
		$dbRegistros = $this->decodeCursorData($dbRegistros);
		
		//convert db data to model data.
		$respuesta = array();
		foreach ($dbRegistros as $i => $dbRegistro){
			$respuesta[$i]->idIndustria = $dbRegistro->id_industria;
			$respuesta[$i]->descripcionIndustria = $dbRegistro->d_industria; 
			$respuesta[$i]->puntos = $dbRegistro->valoracion;
		}*/
		return $result;
			
	}
	
	/** EXTIENDO FECHA DE LA BUSQUEDA **/
	public function  extenderBusqueda($idBusqueda,$idUsuario,$idTicket){
		$result["fechaHasta"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["fechaHasta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_EXTENDER_BUSQUEDA',$params);
		
		return $result;
			
	}
	
	/** EXTIENDO FECHA DE LA BUSQUEDA **/
	public function  getBusquedasAVencer($idUsuario,$dias){
		//Si días es 0 trae las búsquedas activas
		$result["busquedasActivas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_DIAS', 'value'=>$dias, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_BUSQUEDAS_ACTIVAS', 'value'=>&$result["busquedasActivas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUSQUEDAS_PROX_VENCER',$params);
		$result["busquedasActivas"] = $this->oracledb->get_cursor_data(":PO_BUSQUEDAS_ACTIVAS");
		return $result;
			
	}
}