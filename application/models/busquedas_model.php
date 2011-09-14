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
			array('name'=>':PI_ID_EDUCACION_FORMAL_CV', 'value'=>$educacionFormal['id'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_ENTIDAD_EDUCATIVA', 'value'=>$educacionFormal['idEntidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_D_ENTIDAD', 'value'=>$educacionFormal['descripcionEntidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_ENTIDAD', 'value'=>$educacionFormal['modoEntidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_TITULO', 'value'=>$educacionFormal['titulo'], 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':PI_C_MODO_TITULO', 'value'=>$educacionFormal['modoTitulo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_NIVEL_EDUCACION', 'value'=>$educacionFormal['idNivelEducacion'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_NIVEL_EDUCACION', 'value'=>$educacionFormal['modoNivelEducacion'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_AREA', 'value'=>$educacionFormal['idArea'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_AREA', 'value'=>$educacionFormal['modoArea'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ESTADO', 'value'=>$educacionFormal['estado'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_ESTADO', 'value'=>$educacionFormal['modoEstado'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_PROMEDIO_DESDE', 'value'=>$educacionFormal['promedioDesde'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_PROMEDIO_HASTA', 'value'=>$educacionFormal['promedioHasta'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_PROMEDIO', 'value'=>$educacionFormal['modoPromedio'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_BAJA', 'value'=>$educacionFormal['baja'], 'type'=>SQLT_CHR, 'length'=>-1),
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
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_EDAD_DESDE', 'value'=>$cv['edadDesde'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_EDAD_HASTA', 'value'=>$cv['edadHasta'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_EDAD_C_MODO', 'value'=>$cv['edadModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_NACIONALIDAD', 'value'=>$cv['nacionalidad'], 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':PI_PROVINCIA', 'value'=>$cv['provincia'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_LOCALIDAD', 'value'=>$cv['localidad'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_TWITTER_C_MODO', 'value'=>$cv['twitterModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_GTALK_C_MODO', 'value'=>$cv['gtalkModo'], 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_SMS_C_MODO', 'value'=>$cv['smsModo'], 'type'=>SQLT_CHR, 'length'=>-1),
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
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_BUS_INDUSTRIA', 'value'=>$industrias, 'type'=>SQLT_CHR, 'length'=>-1),
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
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_BUS_HERRAMIENTA', 'value'=>$herramientas, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HERRAMIENTA',$params);
		
		return $result;
			
	}
	
	
	/** CREO O MODIFICO LAS INDUSTRIAS A BUSCAR **/
	public function  setHabilidadesBlandasBusqueda($idBusqueda, $habilidadesBlandas){

		$habilidadesBlandas =  implode($this->sep,json_decode($habilidadesBlandas));
		$result["error"] = NULL;
		$result["desc"] = NULL;

		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_BUS_HAB_BLANDA', 'value'=>$habilidadesBlandas, 'type'=>SQLT_CHR, 'length'=>-1),
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
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
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
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_EDAD_DESDE', 'value'=>&$result['edadDesde'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_EDAD_HASTA', 'value'=>&$result['edadHasta'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_EDAD_C_MODO', 'value'=>&$result['edadModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_LISTA_NACIONALIDAD', 'value'=>&$result['nacionalidad'], 'type'=>SQLT_RSET, 'length'=>255),
	 		array('name'=>':PO_LISTA_PROVINCIA', 'value'=>&$result['provincia'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_LISTA_LOCALIDAD', 'value'=>&$result['localidad'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_TWITTER_C_MODO', 'value'=>&$result['twitterModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_GTALK_C_MODO', 'value'=>&$result['gtalkModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_SMS_C_MODO', 'value'=>&$result['smsModo'], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_CV',$params);
		$result["nacionalidad"] = $this->oracledb->get_cursor_data(":PO_LISTA_NACIONALIDAD");
		$result["provincia"] = $this->oracledb->get_cursor_data(":PO_LISTA_PROVINCIA");
		$result["localidad"] = $this->oracledb->get_cursor_data(":PO_LISTA_LOCALIDAD");
		return $result;
			
	}
	
	
	/** CONSULTA DE EDUCACION FORMAL DE UNA BUSQUEDA **/
	public function  getEducacionFormalDeBusqueda($idBusqueda){
		
		$result['educacionFormal'] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_EDU_FORMAL', 'value'=>&$result['educacionFormal'], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_EDU_FORMAL',$params);
		$result["educacionFormal"] = $this->oracledb->get_cursor_data(":PO_EDU_FORMAL");
		return $result;

		
	}
		
		
	/** CONSULTO LAS INDUSTRIAS DE UNA  BUSQUEDA**/
	public function  getIndustriasBusqueda($idBusqueda) {
		$result["industrias"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_BUS_INDUSTRIA', 'value'=>&$result["industrias"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_INDUSTRIA',$params);
		$result["industrias"] = $this->oracledb->get_cursor_data(":PO_BUS_INDUSTRIA");
		return $result;
			
	}
	
	
	/** CONSULTO LAS HERRAMIENTAS DE UNA BUSQUEDA **/
	public function  getHerramientasBusqueda($idBusqueda){
		$result["herramientas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_LISTA_HERRAMIENTA', 'value'=>&$result["herramientas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_HERRAMIENTA',$params);
		$result["herramientas"] = $this->oracledb->get_cursor_data(":PO_LISTA_HERRAMIENTA");
		return $result;
			
	}
	
	
	/** CONSULTO LAS HABILIDADES BLANDAS DE UNA BUSUQEDA **/
	public function  getHabilidadesBlandasBusqueda($idBusqueda){
		$result["habilidadesBlandas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_HAB_BLANDA', 'value'=>&$result["habilidadesBlandas"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_HABILIDADES_BLANDAS',$params);
		$result["habilidadesBlandas"] = $this->oracledb->get_cursor_data(":PO_HAB_BLANDA");
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
	
	/** OBTENGO TODOS LOS DATOS DE UNA BUSQUEDA **/
	public function  getOpcionesDeBusqueda($idBusqueda){
		
		$temp1 = $this->getEducacionFormalDeBusqueda($idBusqueda);
		$result["educacionFormal"] = $temp1["educacionFormal"];
		$temp2 = $this->getHabilidadesBlandasBusqueda($idBusqueda);
		$result["habilidadesBlandas"] = $temp2["habilidadesBlandas"];
		$temp3 = $this->getHerramientasBusqueda($idBusqueda);
		$result["herramientas"] = $temp3["herramientas"];
		$temp4 = $this->getIndustriasBusqueda($idBusqueda);
		$result["industrias"] = $temp4["industrias"];
		$temp5 = $this->getRecursoBusqueda($idBusqueda);
		$result["recurso"] = $temp5;
		$error = $temp1["error"] + $temp2["error"] + $temp3["error"] + $temp4["error"] + $temp5["error"];
		
		if ($error == 0) {
			$result["error"] = 0;
			$result["desc"] = NULL;
		} else {
			$result["error"] = 1;
			$result["desc"] = "Error al obtener información de las búsqueda.";
		}
		return $result;
			
	}

	
	/** OBTENGO ESTADO DE BUSQUEDA **/
	public function  getEstadoBusqueda($idBusqueda){
		
		$result["descBusqueda"] = NULL;
		$result["cantRecursos"] = NULL;
		$result["fechaAlta"] = NULL;
		$result["fechaHasta"] = NULL;
		$result["estado"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_USUARIO', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_D_BUSQUEDA', 'value'=>&$result["descBusqueda"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_CANTIDAD_RECURSOS', 'value'=>&$result["cantRecursos"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_F_HASTA', 'value'=>&$result["fechaAlta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_F_ALTA', 'value'=>&$result["fechaHasta"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_D_ESTADO', 'value'=>&$result["estado"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_ESTADO_BUSQUEDA',$params);

		return $result;
			
	}

	/** SETEO HISTORIA LABORAL EN BUSQUEDA **/
	public function  setHistoriaLaboral($idBusqueda,$idHistoriaLaboral,$compania,$companiaModo,$industria,$industriaModo,$pais,$paisModo, $anos, $anosModo, $titulo,$tituloModo,$fechaBaja){
		$result["idHistoriaLaboral"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_HISTORIA_LABORAL', 'value'=>$idHistoriaLaboral, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_D_COMPANIA', 'value'=>$compania, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_COMPANIA', 'value'=>$companiaModo, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ID_INDUSTRIA', 'value'=>$industria, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_INDUSTRIA', 'value'=>$industriaModo, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_PAIS', 'value'=>$pais, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_PAIS', 'value'=>$paisModo, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_ANOS', 'value'=>$anos, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_ANOS', 'value'=>$anosModo, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_D_TITULO', 'value'=>$titulo, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_MODO_TITULO', 'value'=>$tituloModo, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PI_C_BAJA', 'value'=>$fechaBaja, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_ID_HISTORIA_LABORAL', 'value'=>&$result["idHistoriaLaboral"], 'type'=>SQLT_CHR, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_BUS_HISTORIA_LABORAL',$params);

		return $result;
			
	}
	

	/** OBTENGO HISTORIA LABORAL EN BUSQUEDA **/
	public function  getHistoriaLaboral($idBusqueda){
		$result["historiaLaboral"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
			array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':PO_LISTA_HISTORIA_LABORAL', 'value'=>&$result["historiaLaboral"], 'type'=>SQLT_RSET, 'length'=>255),
			array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDAS','PR_CONS_BUS_HISTORIA_LABORAL',$params);
		$result["historiaLaboral"] = $this->oracledb->get_cursor_data(":PO_LISTA_HISTORIA_LABORAL");
		return $result;
			
	}
	
}