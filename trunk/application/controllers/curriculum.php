<?php 
class Curriculum extends CI_Controller {
	
	public function Curriculum(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		$usuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$usuario){
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			$usuario = "juan@juan.com";
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			//redirect('login');
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
		}
		
		$idCurriculum  = $this->Curriculum_model->getCurriculumUser($usuario);
		
		$curriculumData = $this->Curriculum_model->getCurriculum($idCurriculum);

		$_SESSION[SESSION_CV_EDITANDO] = $curriculumData;
		
		$data['curriculumData'] = $curriculumData;
		$data['usuarioData'] = $this->Usuario_model->getUsuario($usuario);
		$data['habilidadesIndustriasDelCV'] = $this->Curriculum_model->getHabilidadesIndustriasDelCV($curriculumData->id);
		$data['habilidadesAreasDelCV'] = $this->Curriculum_model->getHabilidadesAreasDelCV($curriculumData->id);
		$data['experienciaLaboralDelCv'] = $this->Curriculum_model->getExperienciaLaboralDelCv($curriculumData->id);
		$data['educacionFormalDelCv'] = $this->Curriculum_model->getEducacionFormalDelCv($curriculumData->id);
		$data['educacionNoFormalDelCv'] = $this->Curriculum_model->getEducacionNoFormalDelCv($curriculumData->id);
		
		$data['estadosCiviles'] = $this->Util_model->getEstadosCiviles();
		$data['paises'] = $response = $this->Util_model->getPaises();
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['areasDisponibles'] = $this->Util_model->getAreasDisponibles();
		$data['nivelesDeEducacion'] = $this->Util_model->getNivelesDeEducacion();
		$data['entidadesEducativas'] = $this->Util_model->getEntidadesEducativas();
		$data['tiposDeEducacionNoFormal'] = $this->Util_model->getTiposDeEducacionNoFormal();
		$data['provinciasDisponibles'] = $this->Util_model->getProvincias();
		
		/** IMPORTANTE SETEAR PERFIL PARA MOSTRAR LOS LINKS DE EDICION **/
		$data['perfil'] = "usuario";
		$this->load->view('view_curriculum', $data);
		
	}
	
	public function userBusqueda(){
		//$usuario = $this->input->post("datos");
		$usuario = $this->input->get("usuario");
		if(!$usuario){
			echo "No se seleccionó un usuario";
			exit;
		}
		
		$idCurriculum  = $this->Curriculum_model->getCurriculumUser($usuario);
		
		$curriculumData = $this->Curriculum_model->getCurriculum($idCurriculum);

		//$_SESSION[SESSION_CV_EDITANDO] = $curriculumData;
		
		$data['curriculumData'] = $curriculumData;
		$data['usuarioData'] = $this->Usuario_model->getUsuario($usuario);
		
		$data['habilidadesIndustriasDelCV'] = $this->Curriculum_model->getHabilidadesIndustriasDelCV($curriculumData->id);
		$data['habilidadesAreasDelCV'] = $this->Curriculum_model->getHabilidadesAreasDelCV($curriculumData->id);
		$data['experienciaLaboralDelCv'] = $this->Curriculum_model->getExperienciaLaboralDelCv($curriculumData->id);
		$data['educacionFormalDelCv'] = $this->Curriculum_model->getEducacionFormalDelCv($curriculumData->id);
		$data['educacionNoFormalDelCv'] = $this->Curriculum_model->getEducacionNoFormalDelCv($curriculumData->id);
		
		$data['estadosCiviles'] = $this->Util_model->getEstadosCiviles();
		$data['paises'] = $response = $this->Util_model->getPaises();
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['areasDisponibles'] = $this->Util_model->getAreasDisponibles();
		$data['nivelesDeEducacion'] = $this->Util_model->getNivelesDeEducacion();
		$data['entidadesEducativas'] = $this->Util_model->getEntidadesEducativas();
		$data['tiposDeEducacionNoFormal'] = $this->Util_model->getTiposDeEducacionNoFormal();
		$data['provinciasDisponibles'] = $this->Util_model->getProvincias();
		
		/** IMPORTANTE SETEAR EL TIPO DE PERFIL PARA NO MOSTRAR LOS LINKS DE EDICION **/
		$data['perfil'] = "empresa";
		$this->load->view('view_curriculum', $data);
		
	}
	
	/**
	 * input: 
	 * 	'curriculum' : json string
	 *      {'gtalk', 'usuario', 'estadoCivil', 'fechaNacimiento':"1998/05/31:12:00:00AM",
	 *      'idPais','idProvincia','partido','calle',
	 *      'numero','piso','departamento','codigoPostal',
	 *      'telefono1','horarioContactoDesde1','horarioContactoHasta1','telefono2',
	 *      'horarioContactoDesde2','horarioContactoHasta2','idPaisNacionalidad','twitter','sms'
	 *      }
	 * output idCurriculum.
	 * */
	public function  setCurriculum(){
		//TODO VALIDATE if the user have access to edit the cv
		
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$unCurriculum = $this->input->post('curriculum');
		$unCurriculum = json_decode_into_array(utf8_decode($unCurriculum));
		$unCurriculum["id"] = $currentCurriculum->id;
		$response = $this->Curriculum_model->setCurriculum($unCurriculum);
		
		if($response == 0){
			//oK set the new curriculum in session.
			$_SESSION[SESSION_CV_EDITANDO] = $unCurriculum;
		}
		
		echo json_encode($response);
	}	

	public function  upload(){
		// Process their input and login the user
		$unCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		//$unCurriculum->id;
		//if ($unCurriculum != "") {
			// Script Que copia el archivo temporal subido al servidor en un directorio.
			$tipo = substr($_FILES['photo']['type'], 0, 5);
			// Definimos Directorio donde se guarda el archivo
			$dir = 'images/cv/';
			// Intentamos Subir Archivo
			// (1) Comprovamos que existe el nombre temporal del archivo
			if (isset($_FILES['photo']['tmp_name'])) {
			// (2) - Comprovamos que se trata de un archivo de imágen
			if ($tipo == 'image') {
			// (3) Por ultimo se intenta copiar el archivo al servidor.
			if (!copy($_FILES['photo']['tmp_name'], $dir.md5($this->input->post('usr')).".jpg"))
					echo 'error';
			}
			}
			//}
			

	}
	
	/**
	 * input: null
	 * output: las habilidades del cv mostrando.
	 *  json array > [{idIndustria, puntos}]
	 * */
	public function  getHabilidadesIndustriasDelCV(){
		// Process their input and login the user
		$unCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$unCurriculum->id;
		$respuesta = $this->Curriculum_model->getHabilidadesIndustriasDelCV($unCurriculum->id);
		echo json_encode($respuesta);
	}

	/**
	 * input: 'habilidadesIndustrias' json string array > [{idIndustria, puntos}]
	 * output: 0 is oK.
	 * */
	public function  setHabilidadesIndustriasDelCV(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$habilidades = $this->input->post('habilidadesIndustrias');
		$habilidades = json_decode($habilidades);
		$respuesta = $this->Curriculum_model->setHabilidadesIndustriasDelCV($currentCurriculum->id, $habilidades);
		echo json_encode($respuesta);
	}
	
	
	/**
	 * input: null
	 * output: las habilidades del cv mostrando.
	 *  json array > [{idArea, idHerramienta, puntos}]
	 * */
	public function  getHabilidadesAreasDelCV(){
		// Process their input and login the user
		$unCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$respuesta = $this->Curriculum_model->getHabilidadesAreasDelCV($unCurriculum->id);
		echo json_encode($respuesta);
	}
	
	/**
	 * input: 'habilidadesAreas' json string array > [{idArea, idHerramienta, puntos}]
	 * output: 0 is oK.
	 * */
	public function  setHabilidadesAreasDelCV(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$habilidades = $this->input->post('habilidadesAreas');
		$habilidades = json_decode($habilidades);
		$respuesta = $this->Curriculum_model->setHabilidadesAreasDelCV($currentCurriculum->id, $habilidades);
		echo json_encode($respuesta);
	}
	
	/**
	 * input: 'habilidadesIndustrias' json string array > [{idIndustria, puntos}]
	 * 		  'habilidadesAreas' json string array > [{idArea, idHerramienta, puntos}]
	 * output: 0 is oK.
	 * */
	public function  setHabilidadesDelCV(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		
		$habilidadesAreas = $this->input->post('habilidadesAreas');
		$habilidadesAreas = json_decode($habilidadesAreas);
		$respuesta = $this->Curriculum_model->setHabilidadesAreasDelCV($currentCurriculum->id, $habilidadesAreas);

		$habilidadesIndustrias = $this->input->post('habilidadesIndustrias');
		$habilidadesIndustrias = json_decode($habilidadesIndustrias);
		$respuesta = $respuesta + $this->Curriculum_model->setHabilidadesIndustriasDelCV($currentCurriculum->id, $habilidadesIndustrias);

		echo json_encode($respuesta);
	}
	
	
	/**
	 * input: null
	 * output: json array[id] > [{compania, idIndustria, idPais, fechaDesde, fechaHasta, logro, descripcion, titulo}].
	 * */	
	public function  getExperienciaLaboralDelCv(){
		// Process their input and login the user
		$unCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$unCurriculum->id;
		$respuesta = $this->Curriculum_model->getExperienciaLaboralDelCv($unCurriculum->id);
		echo json_encode($respuesta);
	}

	/**
	 * input: 'experienciaLaboral' json string > {id, compania, idIndustria, idPais, fechaDesde, fechaHasta, logro, descripcion, titulo}
	 * 						para nuevo registro, $experienciaLaboral->id debe ser null.
	 * output: retorna el idEducacionFormal.
	 * */
	public function  setExperienciaLaboral(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$experienciaLaboral = $this->input->post('experienciaLaboral');
		$experienciaLaboral = json_decode_into_array(utf8_decode($experienciaLaboral));
		$respuesta = $this->Curriculum_model->setExperienciaLaboral($currentCurriculum->id, $experienciaLaboral);
		echo json_encode($respuesta);
	}

	/**
	 * input: null
	 * output: json array[id] > [{idEntidad, descripcionEntidad, titulo, idNivelEducacion, idArea, 
	 * 			estado: "T" terminado "A" abandobado "C" en curso 
	 * 			fechaInicio: "01/01/1900", fechaFinalizacion, promedio: 6.89
	 * 			}].
	 * */
	public function  getEducacionFormalDelCv(){
		// Process their input and login the user
		$unCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$respuesta = $this->Curriculum_model->getEducacionFormalDelCv($unCurriculum->id);
		echo json_encode($respuesta);
	}

	
	/**
	 * input: 'educacionFormal' json > {id, idEntidad, 
	 * 			descripcionEntidad (en caso de no existir la entidad en la lista de entidades la describe aqui.), 
	 * 			titulo, idNivelEducacion, idArea, 
	 * 			estado: "T" terminado "A" abandobado "C" en curso 
	 * 			fechaInicio: "01/01/1900", fechaFinalizacion, promedio: 6.89
	 * 			}
	 * 			para nuevo registro, $experienciaLaboral->id debe ser nulo.
	 * output: retorna el idEducacionFormal.
	 * */
	public function  setEducacionFormal(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$educacionFormal = $this->input->post('educacionFormal');
		$educacionFormal = json_decode_into_array(utf8_decode($educacionFormal));
		$respuesta = $this->Curriculum_model->setEducacionFormal($currentCurriculum->id, $educacionFormal);
		echo json_encode($respuesta);
	}
	
	
	/**
	 * input: null
	 * output: json array[id] > [{idTipoEducacionNoFormal, descripcion, duracion}].
	 * */
	public function  getEducacionNoFormalDelCv(){
		// Process their input and login the user
		$unCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$unCurriculum->id;
		$respuesta = $this->Curriculum_model->getEducacionNoFormalDelCv($unCurriculum->id);
		echo json_encode($respuesta);
	}

	/**
	 * input: 'educacionNoFormal' json > {id, idTipoEducacionNoFormal, descripcion, duracion}.
	 * output: retorna el idEducacionFormal.
	 * */
	public function  setEducacionNoFormal(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$educacionNoFormal = $this->input->post('educacionNoFormal');
		$educacionNoFormal = json_decode_into_array(utf8_decode($educacionNoFormal));
		$respuesta = $this->Curriculum_model->setEducacionNoFormal($currentCurriculum->id, $educacionNoFormal);
		echo json_encode($respuesta);
	}
	
	public function  bajaExperienciaLaboral(){
		$id = $this->input->post('id');
		$respuesta = $this->Curriculum_model->bajaExperienciaLaboral($id);
		echo json_encode($respuesta);
	}
	
	public function  bajaEducacionNoFormal(){
		$id = $this->input->post('id');
		$respuesta = $this->Curriculum_model->bajaEducacionNoFormal($id);
		echo json_encode($respuesta);
	}
	
	public function  bajaEducacionFormal(){
		$id = $this->input->post('id');
		$respuesta = $this->Curriculum_model->bajaEducacionFormal($id);
		echo json_encode($respuesta);
	}
	
}

?>

