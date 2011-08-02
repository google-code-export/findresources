<?php 
class Curriculum extends CI_Controller {
	
	public function Curriculum(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		//$usuario = $this->session->userdata('ID_USUARIO');
		$usuario  = "juan@juan.com";
		$idCurriculum  = $this->Curriculum_model->getCurriculumUser($usuario);
		if($idCurriculum == null || $idCurriculum == ""){
			$idCurriculum  = $this->Curriculum_model->createCurriculumUser($usuario);
		}
		
		$curriculumData = $this->Curriculum_model->getCurriculum($idCurriculum);
		$this->session->set_userdata('CV_EDITANDO', $curriculumData);

		$data['curriculumData'] = $curriculumData;

		$data['habilidadesDelCV'] = $this->Curriculum_model->getHabilidadesDelCV($curriculumData->id);
		$data['experienciaLaboralDelCv'] = $this->Curriculum_model->getExperienciaLaboralDelCv($curriculumData->id);
		$data['educacionFormalDelCv'] = $this->Curriculum_model->getEducacionFormalDelCv($curriculumData->id);
		$data['educacionNoFormalDelCv'] = $this->Curriculum_model->getEducacionNoFormalDelCv($curriculumData->id);
		
		$data['estadosCiviles'] = $this->Util_model->getEstadosCiviles();
		$data['paises'] = $response = $this->Util_model->getPaises();
		//$data['industriasDisponibles'] = $response = $this->Util_model->getListadoDeIndustriasDisponibles();
		$data['rubrosDisponibles'] = $this->Util_model->getRubrosDisponibles();
		$data['areasDisponibles'] = $this->Util_model->getAreasDisponibles();
		$data['nivelesDeEducacion'] = $this->Util_model->getNivelesDeEducacion();
		
		
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
		
		$currentCurriculum = $this->session->userdata('CV_EDITANDO');
		$unCurriculum = $this->input->post('curriculum');
		$unCurriculum = json_decode($unCurriculum);
		$unCurriculum->id = $currentCurriculum->id;
		$response = $this->Curriculum_model->setCurriculum($unCurriculum);
		
		if($response == 0){
			//oK set the new curriculum in session.
			$this->session->set_userdata('CV_EDITANDO', $unCurriculum);
		}
		
		echo json_encode($response);
	}	
	
	/**
	 * input: null
	 * output: las habilidades del cv mostrando.
	 *  json array > [{tipoHabilidad (0>industria/rubro 1>herramienta),
	 *  	   	idHabilidad(idIndustria / idHerramienta ), puntaje}]
	 * */
	public function  getHabilidadesDelCV(){
		// Process their input and login the user
		$unCurriculum = $this->session->userdata('CV_EDITANDO');
		$unCurriculum->id;
		$respuesta = $this->Curriculum_model->getHabilidadesDelCV($unCurriculum->id);
		echo json_encode($respuesta);
	}

	/**
	 * input: 'habilidades' json string array > [{tipoHabilidad (0>industria/rubro 1>herramienta),
	 *  	   	idHabilidad(idRubro / idHerramienta ), puntaje}]
	 * output: 0 is oK.
	 * */
	public function  setHabilidadesDelCV(){
		$currentCurriculum = $this->session->userdata('CV_EDITANDO');
		$habilidades = $this->input->post('habilidades');
		$habilidades = json_decode($habilidades);
		$respuesta = $this->Curriculum_model->setHabilidadesDelCV($currentCurriculum->id, $habilidades);
		echo json_encode($respuesta);
	}
	
	/**
	 * input: null
	 * output: json array > [{id, compania, idRubro, idPais, fechaDesde, fechaHasta, logro}].
	 * */	
	public function  getExperienciaLaboralDelCv(){
		// Process their input and login the user
		$unCurriculum = $this->session->userdata('CV_EDITANDO');
		$unCurriculum->id;
		$respuesta = $this->Curriculum_model->getExperienciaLaboralDelCv($unCurriculum->id);
		echo json_encode($respuesta);
	}

	/**
	 * input: 'experienciaLaboral' json string > {id, compania, idRubro, idPais, fechaDesde, fechaHasta, logro}
	 * 						para nuevo registro, $experienciaLaboral->id debe ser null.
	 * output: retorna el idEducacionFormal.
	 * */
	public function  setExperienciaLaboral(){
		$currentCurriculum = $this->session->userdata('CV_EDITANDO');
		$experienciaLaboral = $this->input->post('experienciaLaboral');
		$experienciaLaboral = json_decode($experienciaLaboral);
		$respuesta = $this->Curriculum_model->setExperienciaLaboral($currentCurriculum->id, $experienciaLaboral);
		echo json_encode($respuesta);
	}

	/**
	 * input: null
	 * output: json array > [{id, idEntidad, descripcionEntidad, titulo, idNivelEducacion, idArea, 
	 * 			estado: "T" terminado "A" abandobado "C" en curso 
	 * 			fechaInicio: "01/01/1900", fechaFinalizacion, promedio: 6.89
	 * 			}].
	 * */
	public function  getEducacionFormalDelCv(){
		// Process their input and login the user
		$unCurriculum = $this->session->userdata('CV_EDITANDO');
		$respuesta = $this->Curriculum_model->getEducacionFormalDelCv($unCurriculum->id);
		echo json_encode($respuesta);
	}

	
	/**
	 * input: 'educacionFormal' json > {id, idEntidad, descripcionEntidad, titulo, idNivelEducacion, idArea, 
	 * 			estado: "T" terminado "A" abandobado "C" en curso 
	 * 			fechaInicio: "01/01/1900", fechaFinalizacion, promedio: 6.89
	 * 			}
	 * 			para nuevo registro, $experienciaLaboral->id debe ser nulo.
	 * output: retorna el idEducacionFormal.
	 * */
	public function  setEducacionFormal(){
		$currentCurriculum = $this->session->userdata('CV_EDITANDO');
		$educacionFormal = $this->input->post('educacionFormal');
		$educacionFormal = json_decode($educacionFormal);
		$respuesta = $this->Curriculum_model->setEducacionFormal($currentCurriculum->id, $educacionFormal);
		echo json_encode($respuesta);
	}
	
	
	/**
	 * NOT COMPLEATY DEFINED YET
	 * input: null
	 * output: json array > [{id, entidad, pais, fechaDesde, fechaHasta, logro, estado : T terminado, A abandobado, C en curso}].
	 * */
	public function  getEducacionNoFormalDelCv(){
		// Process their input and login the user
		$unCurriculum = $this->session->userdata('CV_EDITANDO');
		$unCurriculum->id;
		$respuesta = $this->Curriculum_model->getEducacionNoFormalDelCv($unCurriculum->id);
		echo json_encode($respuesta);
	}

	/**
	 * NOT COMPLEATY DEFINED YET
	 * input: 'educacionNoFormal' json > {id, entidad, idPais, fechaDesde, fechaHasta, logro, estado : T terminado, A abandobado, C en curso}.
	 * output: retorna el idEducacionFormal.
	 * */
	public function  setEducacionNoFormal(){
		$currentCurriculum = $this->session->userdata('CV_EDITANDO');
		$educacionNoFormal = $this->input->post('educacionNoFormal');
		$educacionNoFormal = json_decode($educacionNoFormal);
		$respuesta = $this->Curriculum_model->setEducacionNoFormal($currentCurriculum->id, $educacionNoFormal);
		echo json_encode($respuesta);
	}
}

?>

