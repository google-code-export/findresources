<?php
class Curriculum_model extends FR_Model {
	
	function Curriculum_model() 
	{
		parent::__construct();
	}
	
	/**
	 * retorna el cv del usuaro, proximamente la lista de cvs del usuario
	 * @param idUsuario
	 * @return idCurriculum.
	 * */
	public function getCurriculumUser($idUsuario){
		return 0; //not working yet.		
		
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_id_curriculum', 'value'=>&$rta, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_obtengo_id_curriculum',$params);
		
		if ($n1 == 0){
			return $rta;
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
		
	}
	
	/**
	 * retorna el cv del usuaro, proximamente la lista de cvs del usuario
	 * @param idUsuario
	 * @return idCurriculum.
	 * */
	public function createCurriculumUser($idUsuario){
		return 0; //not working yet.		
		
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_usuario', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_id_curriculum', 'value'=>&$rta, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_crea_cv',$params);
		
		if ($n1 == 0){
			return $rta;
		}else{
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
		
	}	
	
	/**
	 * @param idCurriculum
	 * @return {'gtalk', 'usuario', 'estadoCivil', 'fechaNacimiento':"1998/05/31:12:00:00AM",
	 *      'idPais','idProvincia','partido','calle',
	 *      'numero','piso','departamento','codigoPostal',
	 *      'telefono1','horarioContactoDesde1','horarioContactoHasta1','telefono2',
	 *      'horarioContactoDesde2','horarioContactoHasta2','idPaisNacionalidad','twitter','gtalk','sms'
	 *      }
	 * **/
	public function  getCurriculum($idCurriculum){


		$unCurriculumn->id = 0;
		$unCurriculumn->usuario = "unmail@unserver.com";
		$unCurriculumn->estadoCivil = 0;
		//$unCurriculumn->cantidadHijos = 0;
		$unCurriculumn->fechaNacimiento = "15/05/1966";
		$unCurriculumn->idPais = "Argentina";
		$unCurriculumn->idProvincia = "CABA";
		$unCurriculumn->partido = "Ramos Mejia";
		$unCurriculumn->calle = "Calle Falsa";
		$unCurriculumn->numero = "2222";
		$unCurriculumn->piso = "3";
		$unCurriculumn->departamento = "A";
		$unCurriculumn->codigoPostal = "CWI1417C";
		$unCurriculumn->telefono1 = "4554-1235";
		$unCurriculumn->horarioContactoDesde1 = "9";
		$unCurriculumn->horarioContactoHasta1 = "18";
		$unCurriculumn->telefono2 = "4554-1235";
		$unCurriculumn->horarioContactoDesde2 = "";
		$unCurriculumn->horarioContactoHasta2 = "";
		$unCurriculumn->idPaisNacionalidad = 0;
		$unCurriculumn->twitter = "@twitteruser";
		$unCurriculumn->gtalk = "usuario@gmail.com";
		$unCurriculumn->sms = "15-3838-4994";
		
		return $unCurriculumn;		
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_id_curriculm', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_cv', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_consulta_cv',$params);
		echo $n1;
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
//				$response[$i]->id  = $dbRegistro->ESTADO_CIVIL;
//				$response[$i]->descripcion  = $dbRegistro->D_ESTADO_CIVIL;
				$response->id = $idCurriculum;
				$response->usuario = $dbRegistros[0]->usuario;
				$response->estadoCivil = $dbRegistros[0]->estado_civil;
				//$response->cantidadHijos = 0;
				$response->fechaNacimiento = $dbRegistros[0]->fecha_nacimiento;
				$response->idPais = $dbRegistros[0]->pais;
				$response->idProvincia = $dbRegistros[0]->provincia;
				$response->partido = $dbRegistros[0]->partido;
				$response->calle = $dbRegistros[0]->calle;
				$response->numero = $dbRegistros[0]->numero;
				$response->piso = $dbRegistros[0]->piso;
				$response->departamento = $dbRegistros[0]->departamento;
				$response->codigoPostal = $dbRegistros[0]->codigo_postal;
				$response->telefono1 = $dbRegistros[0]->telefono_contacto1;
				$response->horarioContactoDesde1 = $dbRegistros[0]->horario_contacto_desde1;
				$response->horarioContactoHasta1 = $dbRegistros[0]->HORARIO_CONTACTO_HASTA1;
				$response->telefono2 = $dbRegistros[0]->TELEFONO_CONTACTO2;
				$response->horarioContactoDesde2 = $dbRegistros[0]->HORARIO_CONTACTO_DESDE2;
				$response->horarioContactoHasta2 = $dbRegistros[0]->HORARIO_CONTACTO_HASTA2;
				$response->nacionalidad = $dbRegistros[0]->NACIONALIDAD;
				$response->twitter = $dbRegistros[0]->TWITTER;
				$response->gtalk = $dbRegistros[0]->GTALK;
				$response->sms = $dbRegistros[0]->SMS;
//			}
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}		
		
	}

	/**
	 * @param unCurriculum: {'gtalk', 'usuario', 'estadoCivil', 'fechaNacimiento':"1998/05/31:12:00:00AM",
	 *      'idPais','idProvincia','partido','calle',
	 *      'numero','piso','departamento','codigoPostal',
	 *      'telefono1','horarioContactoDesde1','horarioContactoHasta1','telefono2',
	 *      'horarioContactoDesde2','horarioContactoHasta2','idPaisNacionalidad','twitter', 'gtalk','sms'
	 *      }
	 * @return 0 is Ok
	 * */
	public function  setCurriculum($unCurriculum){
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_id_curriculm', 'value'=>$unCurriculum->id, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_estado_civil', 'value'=>$unCurriculum->estadoCivil, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_cantidad_hijos', 'value'=>0, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_fecha_nacimiento', 'value'=>$unCurriculum->fechaNacimiento, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_pais', 'value'=>$unCurriculum->idPais, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_provincia', 'value'=>$unCurriculum->idProvincia, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_partido', 'value'=>$unCurriculum->partido, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_calle', 'value'=>$unCurriculum->calle, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_numero', 'value'=>$unCurriculum->numero, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_piso', 'value'=>$unCurriculum->piso, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_departamento', 'value'=>$unCurriculum->departamento, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_codigo_postal', 'value'=>$unCurriculum->codigoPostal, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_telefono_contacto1', 'value'=>$unCurriculum->telefono1, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_horario_contacto1_desde1', 'value'=>$unCurriculum->horarioContactoDesde1, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_horario_contacto1_hasta1', 'value'=>$unCurriculum->horarioContactoHasta1, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_telefono_contacto2', 'value'=>$unCurriculum->telefono2, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_horario_contacto2_desde', 'value'=>$unCurriculum->horarioContactoDesde2, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_horario_contacto2_hasta', 'value'=>$unCurriculum->horarioContactoHasta2, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_nacionalidad', 'value'=>$unCurriculum->idPaisNacionalidad, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_twitter', 'value'=>$unCurriculum->twitter, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_gtalk', 'value'=>$unCurriculum->gtalk, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_sms', 'value'=>$unCurriculum->sms, 'type'=>SQLT_CHR, 'length'=>-1),	
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_actualiza_cv',$params);
		echo $n1;
		
		if ($n1 == 0){
			return 0;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}		
		
	}
	
	/**
	 * Ingresar la lista de habilidades.
	 * @param idCurriculum a editar
	 * @param habilidades [{idHabilidadDura, tipoHabilidad (0>industria/rubro 1>herramienta),
	 *  	   	idHabilidad(idRubro / idHerramienta ), puntaje}]
	 * */
	public function  getHabilidadesDelCV($idCurriculum){
		$respuesta[0]->id = 0;
		$respuesta[0]->tipo = 0; //Industria
		$respuesta[0]->idHabilidad = 0; 
		$respuesta[0]->puntaje = 5;
		
		$respuesta[1]->id = 0;
		$respuesta[1]->tipo = 1; //Herramienta
		$respuesta[1]->idHabilidad = 0;
		$respuesta[1]->puntaje = 2;
				
		return $respuesta;
	}

	/**
	 * Ingresar la lista de habilidades.
	 * @param idCurriculum a editar
	 * @param habilidades [{idHabilidadDura, tipoHabilidad (0>industria/rubro 1>herramienta),
	 *  	   	idHabilidad(idRubro / idHerramienta ), puntaje}]
	 * */
	public function  setHabilidadesDelCV($idCurriculum, $habilidades){
		$parametro = "";
		foreach ($habilidades as $habilidad){
			if($parametro != ""){
				//Its not the first need add ;
				$parametro = $parametro . ';'; 
			}
			$parametro = $parametro . $habilidad->idHabilidadDura . ';' . 
					$habilidad->tipoHabilidad . ';' . 
					$habilidad->idHabilidad . ';' . 
					$habilidad->puntaje;
		}
		
		return 0;
		
		
	}	
	
	/**
	 * @param: idCurriculum
	 * @return: array with [{id, compania, idRubro, idPais, fechaDesde, fechaHasta, logro}]
	 */
	public function  getExperienciaLaboralDelCv($idCurriculum){
		$respuesta[0]->id = 0;
		$respuesta[0]->compania = "netsol";
		$respuesta[0]->idRubro = 0;
		$respuesta[0]->idPais = 0;
		$respuesta[0]->fechaDesde = "01/01/1900";
		$respuesta[0]->fechaHasta = "01/01/1900";
		$respuesta[0]->logro = " un logro ";
		$respuesta[1]->id = 0;
		$respuesta[1]->compania = 0;
		$respuesta[1]->idRubro = 0;
		$respuesta[1]->idPais = 0;
		$respuesta[1]->fechaDesde = "01/01/1900";
		$respuesta[1]->fechaHasta = "01/01/1900";
		$respuesta[1]->logro = 0;
		return $respuesta;
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_id_curriculm', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_exp_laboral', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_consulta_exp_laboral',$params);
		echo $n1;
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			foreach ($dbRegistros as $i => $dbRegistro){
				$response[$i]->id  = $dbRegistro->id_historia_laboral_cv;
				$response[$i]->compania = $dbRegistro->d_compania;
				$response[$i]->idRubro = $dbRegistro->id_rubro;
				$response[$i]->idPais = $dbRegistro->pais;
				$response[$i]->fechaDesde = $dbRegistro->f_desde;//formato DD/MM/YYYY
				$response[$i]->fechaHasta = $dbRegistro->f_hasta; //formato DD/MM/YYYY
				$response[$i]->logro = $dbRegistro->d_logro;
			}
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}				
		
	}

	/**
	 * @param $idCurriculum
	 * @param $experienciaLaboral {id, compania, idRubro, idPais, fechaDesde, fechaHasta, logro}
 	 * para nuevo registro, $experienciaLaboral->id debe ser nulo.
	 * @return retorna el id de experiencia laboral.
	 * */
	public function  setExperienciaLaboral($idCurriculum, $experienciaLaboral){
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		
		
		$params = array(
		
		array('name'=>':pi_id_historia_laboral_cv', 'value'=>$experienciaLaboral->id, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_id_curriculm', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_d_compania', 'value'=>$experienciaLaboral->compania, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_id_rubro', 'value'=>$experienciaLaboral->idRubro, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_pais', 'value'=>$experienciaLaboral->idPais, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_f_desde', 'value'=>$experienciaLaboral->fechaDesde, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_f_hasta', 'value'=>$experienciaLaboral->fechaHasta, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':pi_d_logro', 'value'=>$experienciaLaboral->logro, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_id_historia_laboral_cv', 'value'=>&$rta, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_actualizo_exp_laboral',$params);
		
		if ($n1 == 0){
			return $rta;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}		
			
	}
	
	/**
	 * @param idCurriculum
	 * @return array of educacionFormal = [{id, idEntidad, descripcionEntidad, titulo, idNivelEducacion, idArea, 
	 * 			estado: "T" terminado "A" abandobado "C" en curso 
	 * 			fechaInicio: "01/01/1900", fechaFinalizacion, promedio: 6.89
	 * 			}]
	 * */
	public function  getEducacionFormalDelCv($idCurriculum){
		
		$respuesta[0]->id = 0;
		$respuesta[0]->idEntidad = 0;
		$respuesta[0]->descripcionEntidad = "en caso de otros";
		$respuesta[0]->titulo = "titulo";
		$respuesta[0]->idNivelEducacion = 0;
		$respuesta[0]->idArea = 0;
		$respuesta[0]->estado = "T";
		$respuesta[0]->fechaInicio = "01/01/1900";
		$respuesta[0]->fechaFinalizacion = "01/01/1900";
		$respuesta[0]->promedio = 6.89;
		
		$respuesta[1]->id = 0;
		$respuesta[1]->idEntidad = 0;
		$respuesta[1]->descripcionEntidad = "en caso de otros";
		$respuesta[1]->titulo = "titulo";
		$respuesta[1]->idNivelEducacion = 0;
		$respuesta[1]->idArea = 0;
		$respuesta[1]->estado = "T";
		$respuesta[1]->fechaInicio = "01/01/1900";
		$respuesta[1]->fechaFinalizacion = "01/01/1900";
		$respuesta[1]->promedio = 6.89;
		
		return $respuesta;
		
		$curs=NULL;
		$n1 = NULL;
		$n2 = NULL;
		$params = array(
		array('name'=>':pi_id_curriculum', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
		array('name'=>':po_educacion_formal', 'value'=>&$curs, 'type'=>SQLT_RSET , 'length'=>-1),
		array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
		array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_consulta_exp_laboral',$params);
		echo $n1;
		
		if ($n1 == 0){
			$dbRegistros = $this->oracledb->get_cursor_data();
			$dbRegistros = $this->decodeCursorData($dbRegistros);
			
			//convert db data to model data.
			foreach ($dbRegistros as $i => $dbRegistro){
				$respuesta[$i]->id = $dbRegistro->id_educacion_formal_cv;
				$respuesta[$i]->idEntidad = $dbRegistro->id_entidad_educativa;
				$respuesta[$i]->descripcionEntidad = $dbRegistro->d_entidad;
				$respuesta[$i]->titulo = $dbRegistro->titulo;
				$respuesta[$i]->idNivelEducacion = $dbRegistro->id_nivel_educacion;
				$respuesta[$i]->idArea = $dbRegistro->id_area;
				$respuesta[$i]->estado = $dbRegistro->estado;
				$respuesta[$i]->fechaInicio = $dbRegistro->f_inicio;
				$respuesta[$i]->fechaFinalizacion = $dbRegistro->f_finalizacion;
				$respuesta[$i]->promedio = $dbRegistro->promedio;
			}
			return $response;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}						
		
	}
	
	/**
	 * @param educacionFormal = [{id (null for new item), idEntidad, descripcionEntidad,
	 * 			 titulo, idNivelEducacion, idArea, 
	 * 			estado: "T" terminado "A" abandobado "C" en curso 
	 * 			fechaInicio: "01/01/1900", fechaFinalizacion, promedio: 6.89
	 * 			}]
	 * @return idEducacionFormal
	 * 		
	 * */
	public function  setEducacionFormal($idCurriculum, $educacionFormal){
		return 1;
		$rta=NULL;
		$n1 = NULL;
		$n2 = NULL;
		
		$params = array(
			array('name'=>':pi_id_educacion_formal_cv', 'value'=>$educacionFormal->id, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_curriculm', 'value'=>$idCurriculum, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_entidad_educativa', 'value'=>$educacionFormal->idEntidad, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_d_entidad', 'value'=>$educacionFormal->descripcionEntidad, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_titulo', 'value'=>$educacionFormal->titulo, 'type'=>SQLT_CHR, 'length'=>-1),
	 		array('name'=>':pi_id_nivel_educacion', 'value'=>$educacionFormal->idNivelEducacion, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_id_area', 'value'=>$educacionFormal->idArea, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_estado', 'value'=>$educacionFormal->estado, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_f_inicio', 'value'=>$educacionFormal->fechaInicio, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':pi_f_finalizacion', 'value'=>$educacionFormal->fechaFinalizacion, 'type'=>SQLT_CHR, 'length'=>-1), //DD/MM/YYYY
			array('name'=>':pi_promedio', 'value'=>$educacionFormal->promedio, 'type'=>SQLT_CHR, 'length'=>-1),
			array('name'=>':po_id_educacion_formal_cv', 'value'=>&$rta, 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':po_c_error', 'value'=>&$n1, 'type'=>SQLT_CHR , 'length'=>255),
			array('name'=>':po_d_error', 'value'=>&$n2, 'type'=>SQLT_CHR, 'length'=>255)
		);
		
		$this->oracledb->stored_procedure($this->db->conn_id,'pkg_cv','pr_actualizo_edu_formal',$params);
		
		if ($n1 == 0){
			return $rta;
		}
		else{
			
			//TODO exception managment.
        	throw new Exception('Oracle error message: ' . $n2);
		}
			
	}
	
	//TBD
	public function  getEducacionNoFormalDelCv(){
		$respuesta[0]->id = 0;
		$respuesta[0]->idEntidad = 0;
		$respuesta[0]->descripcionEntidad = "en caso de otros";
		$respuesta[0]->titulo = "titulo";
		$respuesta[0]->idNivelEducacion = 0;
		$respuesta[0]->idArea = 0;
		$respuesta[0]->estado = "T";
		$respuesta[0]->fechaInicio = "01/01/1900";
		$respuesta[0]->fechaFinalizacion = "01/01/1900";
		$respuesta[0]->promedio = 6.89;
		
		$respuesta[1]->id = 0;
		$respuesta[1]->idEntidad = 0;
		$respuesta[1]->descripcionEntidad = "en caso de otros";
		$respuesta[1]->titulo = "titulo";
		$respuesta[1]->idNivelEducacion = 0;
		$respuesta[1]->idArea = 0;
		$respuesta[1]->estado = "T";
		$respuesta[1]->fechaInicio = "01/01/1900";
		$respuesta[1]->fechaFinalizacion = "01/01/1900";
		$respuesta[1]->promedio = 6.89;
		
		return $respuesta;
		
	}
	
	//TBD
	public function  editarEducacionNoFormal(){
	
	}
	
	
}

?>