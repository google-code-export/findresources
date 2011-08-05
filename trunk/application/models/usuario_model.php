<?php
class Util_model extends FR_Model {
	
	function Util_model() 
	{
		parent::__construct();
	}
	
	/**
	 * @param usuario: {email, clave, nombre, apellido, razonSocial, idIndustria, idTipoDocumento, numeroDocumento, telefono, idPais, tipoUsuario: "E">empresa "C">candidato}
	 * @return codigoAutenticacion
	 * */
	public function  crearNuevoUsuario($usuario){
		
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$usuario->email, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_clave', 'value'=>$usuario->clave, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_nombre', 'value'=>$usuario->nombre, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_apellido', 'value'=>$usuario->apellido, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_id_rubro', 'value'=>$usuario->idIndustria, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_tipo_documento', 'value'=>$usuario->idTipoDocumento, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_numero_documento', 'value'=>$usuario->numeroDocumento, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_telefono', 'value'=>$usuario->telefono, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_pais', 'value'=>$usuario->idPais, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_t_usuario', 'value'=>$usuario->tipoUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_id_autentificacion', 'value'=>&$rta, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','pr_creacion_usuario',$params);
		
		if ($n1 == 0){
			return $po_id_autentificacion;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}		
		
	}	
	
	
	/**
	 * @param idUsuario
	 * @return 
	 * */
	public function  bajaUsuario($idUsuario){
		
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$usuario->email, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','pr_baja_usuario',$params);
		
		if ($n1 == 0){
			return 0;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
		
	}
	
	/**
	 * @param usuario: {email, clave, nombre, apellido, razonSocial, idIndustria, idTipoDocumento, numeroDocumento, telefono, idPais, tipoUsuario: "E">empresa "C">candidato}
	 * @return
	 * */
	public function  modificarUsuario($usuario){
		
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$usuario->email, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_clave', 'value'=>$usuario->clave, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_nombre', 'value'=>$usuario->nombre, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_apellido', 'value'=>$usuario->apellido, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_id_rubro', 'value'=>$usuario->idIndustria, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_tipo_documento', 'value'=>$usuario->idTipoDocumento, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_numero_documento', 'value'=>$usuario->numeroDocumento, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_telefono', 'value'=>$usuario->telefono, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_pais', 'value'=>$usuario->idPais, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_t_usuario', 'value'=>$usuario->email, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','pr_modificacion_usuario',$params);
		
		if ($n1 == 0){
			return 0;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}		
		
	}	
	
	/**
	 * @param  $usuario (email del usuario)
	 * @param  $clave (contrasenia ya encodeada)
	 * @return respuesta 0: tiene acceso 1: no tiene acceso.
	 * */
	public function  canLogin($usuario, $clave){
		
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$usuario, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_clave', 'value'=>$clave, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$rta, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','fu_ingreso',$params);
		
		if ($n1 == 0){
			return $rta;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}		
		
	}	

	
	
	pr_consulta_usuario
	pr_autentica_usuario
	
	
	
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
		array('name'=>':po_salida', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_util','pr_obtiene_estado_civil',$params);
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			$response = array();
			foreach ($dbRegistros as $i => $dbRegistro){
				$response[$i]->id  = $dbRegistro->estado_civil;
				$response[$i]->descripcion  = $dbRegistro->d_estado_civil;
			}
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: getEstadosCiviles()' . $n2);
		}
	}
	

}

?>
