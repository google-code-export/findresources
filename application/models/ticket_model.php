<?php
class Ticket_model extends CI_Model {

	function Ticket_model()
	{
		parent::__construct();
		/** SETEO SEPARADOR **/
		$query = $this->db->query('SELECT PKG_UTIL.FU_OBTIENE_SEPARADOR_SPLIT() SEPARADOR FROM DUAL');
		$row = $query->row_array();
		$this->sep = $row["SEPARADOR"];
	}
	
	
	
	
	/** ASOCIA TICKET A EMPRESA **/
	public function asociarTicket($idUsuario,$duracion,$unidades){
		$result["id_ticket"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_DURACION', 'value'=>$duracion, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_Q_UNIDADES', 'value'=>$unidades, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_ID_TICKET', 'value'=>&$result["id_ticket"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TICKETS_EMPRESAS','PR_ASOCIA_TICKETS_EMPRESAS',$params);
			
		return $result;

	}	
	
	/** CONSUMO TICKET **/
	public function consumirTicket($idUsuario,$idTicket,$unidades){
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PI_Q_UNIDADES', 'value'=>$unidades, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TICKETS_EMPRESAS','PR_CONSUME_TICKET_EMPRESA',$params);
			
		return $result;

	}	
	
	/** CONSULTO SALDO DE TICKET **/
	public function consultarSaldoTicket($idTicket){
		$result["q_saldo"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_ID_TICKET', 'value'=>$idTicket, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_Q_SALDO', 'value'=>&$result["q_saldo"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TICKETS_EMPRESAS','PR_CONSULTA_SALDO_TICKET',$params);
			
		return $result;

	}	
	
	/** ASOCIA TICKET A EMPRESA **/
	public function consultarSaldoTicketEmpresa($idUsuario){
		$result["ticket_saldo"] = NULL;
		$result["error"] = NULL;
		$result["desc"] = NULL;
		
		$params = array(
		array('name'=>':PI_USUARIO', 'value'=>$idUsuario, 'type'=>SQLT_CHR , 'length'=>-1),
		array('name'=>':PO_TICKET_SALDO', 'value'=>&$result["ticket_saldo"], 'type'=>SQLT_RSET , 'length'=>255),
		array('name'=>':PO_C_ERROR', 'value'=>&$result["error"], 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':PO_D_ERROR', 'value'=>&$result["desc"], 'type'=>SQLT_CHR, 'length'=>255)
		);
		$this->oracledb->stored_procedure($this->db->conn_id,'PKG_TICKETS_EMPRESAS','PR_CONS_TICKET_SALDO_EMPRESA',$params);
		$result["ticket_saldo"] = $this->oracledb->get_cursor_data(":PO_TICKET_SALDO");
		return $result;

	}	

}
?>