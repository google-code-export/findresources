<?php
class Usuario_model extends FR_Model {
	
	function Usuario_model() 
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
		array('name'=>':pi_razon_social', 'value'=>$usuario->razonSocial, 'type'=>SQLT_CHR, 'length'=>-1),
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
			return $rta;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error in crearNuevoUsuario ('. var_export($usuario) .') message in : ' . $n2);
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
        	throw new Exception('Oracle error in bajaUsuario('. $idUsuario .') message: ' . $n2);
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
        	throw new Exception('Oracle error in modificarUsuario(' . var_export($usuario) . ') message: ' . $n2);
		}		
		
	}	
	
	/**
	 * @param  $usuario (email del usuario)
	 * @param  $clave (contrasenia ya encodeada)
	 * @return respuesta boolean true: tiene acceso false: no tiene acceso.
	 * */
	public function  canLogin($usuario, $clave){
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$usuario, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_clave', 'value'=>$clave, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','fu_ingreso',$params);
		
		if ($n1 == 0){
			//////HARD CODEDDDD //////////////////
			//////HARD CODEDDDD //////////////////
			//////HARD CODEDDDD //////////////////
			//////HARD CODEDDDD //////////////////
			$rta = 0;
			//////HARD CODEDDDD //////////////////
			//////HARD CODEDDDD //////////////////
			//////HARD CODEDDDD //////////////////
			//////HARD CODEDDDD //////////////////
			
			///0 -> Tiene acceso  1 -> no tiene acceso
			if($rta == 0){
				return true;
			} else{
				return false;
			}
			
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error in canLogin(' . $usuario . ',' .  $clave . ') message: ' . $n2);
		}		
		
	}	
	
	/**
	 * Busca en la db la data sobre el usaurio.
	 * @author martin.fox
	 * @param $idUsuario id usuario
	 * @return {nombre, apellido,  razonSocial, idTipoDocumento, descripcionTipoDocumento
	 * 				numeroDocumento, telefono, idPais, descripcionPais, idTipoUsuario,
	 * 				descripcionUsuario}
	 * */
	public function  getUsuario($idUsuario){
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
			array('name'=>':pi_usuario', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_usuario', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
			array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_util','pr_consulta_usuario',$params);
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			$dbRegistro = $dbRegistros[0];
			
			if($dbRegistro != null){
	        	throw new Exception('User not found: getUsuario('. $idUsuario .')' . $n2);
			}
			
			$response->nombre  = $dbRegistro->nombre;
			$response->apellido  = $dbRegistro->apellido; 
			$response->razonSocial  = $dbRegistro->razon_social; 
			$response->idTipoDocumento = $dbRegistro->tipo_documento;
			$response->descripcionTipoDocumento  = $dbRegistro->dtipo_documento;
			$response->numeroDocumento  = $dbRegistro->numero_documento;
			$response->telefono  = $dbRegistro->telefono;
			$response->idPais  = $dbRegistro->pais;
			$response->descripcionPais  = $dbRegistro->dpais;
			$response->idTipoUsuario = $dbRegistro->t_usuario;
			$response->descripcionUsuario  = $dbRegistro->d_t_usuario;
			
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error in getUsuario(' . $idUsuario  . ') message: ' . $n2);
		}
	}
	
	
	/**
	 * Esta funcion activa un usuario
	 * @param  $codigoAutenticacion
	 * @return true si fue activado.
	 * */
	public function  activarUsuario($codigoAutenticacion){
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_id_autentificacion', 'value'=>$codigoAutenticacion, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','pr_autentica_usuario',$params);
		if ($n1 == 0){
			return true;
		}
		else{
			//TODO exception managment.
        	throw new Exception('Oracle error in activarUsuario(' . $codigoAutenticacion . ') message: ' . $n2);
		}		
		
	}	

	
	/**
	 * Esta funcion activa un usuario
	 * @param  $idUsuario (email del usuario)
	 * @return boolean true> existe el usuario  false>no existe.
	 * */
	public function  getExisteUsuario($idUsuario){
		
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$idUsuario, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_usuario','existe_usuario',$params);
		
		if ($n1 == 0){
			$rta = ($rta != 0); ///0 -> No existe usuario con ese email 1 -> Existe usuario con ese email!.
			return $rta;
		}
		else{
			//TODO exception managment.
        	throw new Exception('Oracle error in activarUsuario(' . $idUsuario . ',' .  $codigoAutenticacion . ') message: ' . $n2);
		}		
		
	}	
	
	

	
}

?>
