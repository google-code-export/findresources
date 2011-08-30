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
	
	public function nuevaBusqueda($idEmpresa,$caracteristicasDuras,$caracteristicasBlandas,$descripcion,$otrosCriterios){
		$result["idBusqueda"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CARDURAS', 'value'=>$catacteristicasDuras, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_CARBLANDAS', 'value'=>$catacteristicasBlandas, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_DESCRIPCION', 'value'=>$descripcion, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_OTROSCRITERIOS', 'value'=>$otrosCriterios, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_BUSQUEDA', 'value'=>&$result["idBusqueda"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_NUEVABUSQUEDA',$params);
			
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
	
	public function setBusqueda($idEmpresa,$idBusqueda){
		$result["idEmpresa"] = NULL;
		$result["idBusqueda"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_C_EMPRESA', 'value'=>$idEmpresa, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_C_BUSQUEDA', 'value'=>$idBusqueda, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_CARDURAS', 'value'=>&$result["catacteristicasDuras"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_CARBLANDAS', 'value'=>&$result["catacteristicasBlandas"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_DESCRIPCION', 'value'=>&$result["descripcion"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_OTROSCRITERIOS', 'value'=>&$result["otrosCriterios"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_BUSQUEDADS','PR_SETBUSQUEDA',$params);
			
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