<?php
class Busquedas_model extends CI_Model {

	function Busquedas_model()
	{
		parent::__construct();
	}
	
	
	public function getSaldo($idEmpresa){
		$result["saldo"] = NULL;
		$result["estado"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_SALDO', 'value'=>&$result["saldo"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_ESTADO', 'value'=>&$result["estado"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETSALDO',$params);
			
		return $result;

	}
	/** CREA O MODIFICA BUSQUEDAS **/
	public function setBusqueda($idBusqueda,$idUsuario,$descripcionBusqueda,$fechaHasta,$cantidadRecursos){
		$result["idBusqueda"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_ID_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_D_BUSQUEDA', 'value'=>$descripcionBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_F_HASTA', 'value'=>$fechaHasta, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CANTIDAD_RECURSOS', 'value'=>$cantidadRecursos, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_ID_BUSQUEDA', 'value'=>&$result["idBusqueda"], 'type'=>SQLT_CHR , 'length'=>255),
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
	
	
	public function getBusquedas($idEmpresa){
		$result["idBusqueda"] = NULL;
		$result["estado"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_BUSQUEDA', 'value'=>&$result["idBusqueda"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_ESTADO', 'value'=>&$result["estadp"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETBUSQUEDAS',$params);
			
		return $result;

	}
	
	public function getBusquedaInfo($idEmpresa,$idBusqueda,$caracteristicasDuras,$caracteristicasBlandas,$descripcion,$otrosCriterios){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_C_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CARDURAS', 'value'=>catacteristicasDuras, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CARBLANDAS', 'value'=>catacteristicasBlandas, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_DESCRIPCION', 'value'=>descripcion, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_OTROSCRITERIOS', 'value'=>otrosCriterios, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETBUSQUEDAINFO',$params);
			
		return $result;

	}		
	
		
	
	
	public function getCandidatos($idEmpresa, $idBusqueda){
		$result["candidatos"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_C_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_CANDIDATOS', 'value'=>&$result["cadidatos"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETCANDIDATOS',$params);
			
		return $result;

	}	

	public function realizarTests($idEmpresa, $idBusqueda,$idCandidato){
		$idEmpresa = NULL;
		$idBusqueda = NULL;
		$candidato = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_C_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_CANDIDATO', 'value'=>$cadidato, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_REALIZARTESTS',$params);
			
		return $result;

	}	
	
	public function getCandidatosSeleccionados($idEmpresa, $idBusqueda){
		$idEmpresa = NULL;
		$idBusqueda = NULL;
		$result["candidatos"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_C_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_CANDIDATOS', 'value'=>$result["cadidatos"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETCANDIDATOSSEL',$params);
			
		return $result;

	}	

	public function getEperienciaLaboral(){
		
		$result["experiencia"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PO_EXPERIENCIA', 'value'=>&$result["experiencia"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETEXPERIENCIA',$params);
			
		return $result;

	}	


	public function getCaracteristicasDuras(){
		
		$result["caracteristicas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PO_CARACTERISTICAS', 'value'=>&$result["caracteristicas"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETCARASTERISTICASDURAS',$params);
			
		return $result;

	}	
	
		public function getCaracteristicasBlandas(){
		
		$result["caracteristicas"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PO_CARACTERISTICAS', 'value'=>&$result["caracteristicas"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_GETCARACTERISTICASBLANDAS',$params);
			
		return $result;

	}	

}