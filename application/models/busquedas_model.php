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
	
}