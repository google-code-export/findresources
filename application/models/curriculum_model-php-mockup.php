<?php
class Curriculum_model extends CI_Model {
	
	function Curriculum_model() 
	{
		parent::__construct();
	}

	/**
	 * Devuelve el cv
	 * **/
	public function  getCurriculum($usuario){
		
		$unCurriculumn->id = 999;
		$unCurriculumn->usuario = "unmail@unserver.com";
		$unCurriculumn->estadoCivil = 0;
		//$unCurriculumn->cantidadHijos = 0;
		$unCurriculumn->fechaNacimiento = "1998/05/31:12:00:00AM";
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
		$unCurriculumn->nacionalidad = "Argentino";
		$unCurriculumn->twitter = "@twitteruser";
		$unCurriculumn->gtalk = "usuario@gmail.com";
		$unCurriculumn->sms = "15-3838-4994";
		
		return $unCurriculumn;
	}

	/**
	 * 
	 * */
	public function  setCurriculum($unCurriculum){
		return 0;
	}
	
	public function  getEstadosCiviles(){
		$respuesta[0]->id = 0; 
		$respuesta[0]->descripcion = "Soltero";
		$respuesta[1]->id = 1; 
		$respuesta[1]->descripcion = "Casado";
		$respuesta[2]->id = 2; 
		$respuesta[2]->descripcion = "Convivencia";
		return $respuesta;
	}
	
	public function  getPaises(){
		$respuesta[0]->id = 0; 
		$respuesta[0]->descripcion = "Argentina";
		$respuesta[1]->id = 1; 
		$respuesta[1]->descripcion = "Francia";
		return $respuesta;
	}
	
	public function  getProvincias($idPais){
		$respuesta[0]->id = 0; 
		$respuesta[0]->descripcion = "CABA";
		$respuesta[1]->id = 1; 
		$respuesta[1]->descripcion = "Jujuy";
		return $respuesta;
	}

	/**
	 * Devuelve las habilidades diponibles para seleccionar.
	 * */
	public function  getListadoDeIndustriasDisponibles(){
		$respuesta[0]->id = 0; 
		$respuesta[0]->descripcion = "Petrolera";
		$respuesta[1]->id = 1; 
		$respuesta[1]->descripcion = "Banca";
		$respuesta[2]->id = 1; 
		$respuesta[2]->descripcion = "Gobierno";
		return $respuesta;
	}

	/**
	 * Devuelve las habilidades diponibles para seleccionar.
	 * */
	public function  getRubrosDisponibles(){
		$respuesta[0]->id = 0; 
		$respuesta[0]->descripcion = "Informatica";
		$respuesta[1]->id = 1; 
		$respuesta[1]->descripcion = "Finanzas";
		return $respuesta;
	}

	/**
	 * Devuelve las herramientas de un determinado rubro.
	 * Recibe por post el rubro correspondiente.
	 * */
	public function  getHerramientasPorRubro(){
		$respuesta[0]->id = 1; 
		$respuesta[0]->descripcion = "Java";
		$respuesta[1]->id = 2; 
		$respuesta[1]->descripcion = ".Net";
		$respuesta[2]->id = 3; 
		$respuesta[2]->descripcion = "Oracle";
		return $respuesta;
	}
	
	/**
	 * Devuelve las habilidades del cv mostrando.
	 * */
	public function  getHabilidadesDelCV(){
		$respuesta[0]->tipo = 0; //Industria
		$respuesta[0]->id = 0;
		$respuesta[0]->puntaje = 5;
		
		$respuesta[1]->tipo = 1;
		$respuesta[1]->id = 0;
		$respuesta[1]->puntaje = 2;
				
		return $respuesta;
	}

	/**
	 * Ingresar la lista de habilidades.
	 * */
	public function  setHabilidadesDelCV($idCurriculum, $habilidades){
		$parametro = "";
		foreach ($habilidades as $habilidad){
			if($parametro != ""){
				//Its not the first need add ;
				$parametro = $parametro . ';'; 
			}
			$parametro = $parametro . $habilidad->tipoHabilidad . ';' . $habilidad->idHabilidad . ';' . $habilidad->puntajeHabilidad;
		}
		return 0;
	}	
	
	
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
	}

	public function  setExperienciaLaboral($idCurriculum, $experienciaLaboral){
	
	}
	
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
	}
	
	public function  editarEducacionFormal($idCurriculum, $educacionFormal){
	
	}
	
	
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
	}
	
	public function  editarEducacionNoFormal(){
	
	}
	
	
}

?>