<?php 
class Busquedas extends CI_Controller {
	
	public $sep = ";";
	
	public function Busquedas(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		/*
		$usuario = @$_SESSION[SESSION_ID_USUARIO];
		$usuario = "jonakup@hotmail.com";
		$data['usuarioData'] = $this->Usuario_model->getUsuario($usuario);
		*/
		/** SETEO SEPARADOR **/
		$query = $this->db->query('SELECT PKG_UTIL.FU_OBTIENE_SEPARADOR_SPLIT() SEPARADOR FROM DUAL');
		$row = $query->row_array();
		$this->sep = $row["SEPARADOR"];
		
		/** PRUEBA CREACION DE BUSQUEDA **/
		$idUsuario = "leandrominio@gmail.com";
		$descripcionBusqueda = "Esta es la descripcion de mi primera búsqueda";
		$fechaHasta = "03/10/2011";
		$cantidadRecursos = 2 ;
		$idBusqueda = 1; //NULL = nuevo
		$result  = $this->Busquedas_model->setBusqueda($idBusqueda, $idUsuario,$descripcionBusqueda,$fechaHasta,$cantidadRecursos);
		$busquedaACTUAL = $result["idBusqueda"];
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDA Búsqueda creada/modificada correctamente. ID : ".$busquedaACTUAL;
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDA ERROR : (".$result["error"].") :".$result["desc"];
		
		echo $data["result"]."<br />";

		/** PRUEBA CREACION DE EDUCACION FORMAL PARA LA BUSQUEDA **/
		$educacionFormal = array(
			"id" => 4, // NULL = nuevo
			"idEntidad" => 3,
			"descripcionEntidad" => "ENTIDAD", 
			"modoEntidad" => "R",
			"titulo" => "Ingeniero en Electrónica",
			"modoTitulo" => "R",
			"idNivelEducacion" => 1,
			"modoNivelEducacion" => "R",
			"idArea" => 1,
			"modoArea" => "R",
			"estado" => "C",
			"modoEstado" => "R", //REQUERIDO - PREFERIDO
			"promedioDesde" => 6,
			"promedioHasta"=> 8,
			"modoPromedio"=> "P",
			"baja" => "N" // SI LO QUIERO BORRAR PONGO "S"
		);
		
		$result = $this->Busquedas_model->setEducacionFormalDeBusqueda($busquedaACTUAL,$educacionFormal);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_EDUCACION_FORMAL EducacionFormal creada/modificada correctamente. ID : ".$result["idEducacionFormal"];
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_EDUCACION_FORMAL : ERROR (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE RECURSO PARA LA BUSQUEDA **/
		$recurso = array(
			"id" => 4, // Busqueda NULL = nuevo
			"edadDesde" => 20,
			"edadHasta" => 30, 
			"edadModo" => "R",
			"nacionalidad" => "ARG".$this->sep."R".$this->sep."BOL".$this->sep."P",
			"provincia" => "0".$this->sep."P", // 0 = CABA
			"localidad" => "", // VA el texto no el id
			"twitterModo" => "P",
			"gtalkModo" => "P",
			"smsModo" => "P" 
		);
		
		$result = $this->Busquedas_model->setRecursoBusqueda($busquedaACTUAL,$recurso);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_CV Recurso de Busqueda creada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_CV ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE INDUSTRIA PARA LA BUSQUEDA **/
		
		$industrias = "1".$this->sep."5".$this->sep."0,2".$this->sep."2".$this->sep."3".$this->sep."0,9";
		//ID+VALORACION+IMPORTANCIA
		$result = $this->Busquedas_model->setIndustriasBusqueda($busquedaACTUAL,$industrias);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_INDUSTRIA Industrias de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_INDUSTRIA ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE HERRAMIENTAS PARA LA BUSQUEDA **/
		$herramientas = "7".$this->sep."5".$this->sep."0,2".$this->sep."6".$this->sep."3".$this->sep."0,9";
		//ID+VALORACION+IMPORTANCIA
		$result = $this->Busquedas_model->setHerramientasBusqueda($busquedaACTUAL,$herramientas);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HERRAMIENTA Herramientas de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HERRAMIENTA ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE HABILIDADES BLANDAS PARA LA BUSQUEDA **/
		$habilidadesBlandas = "41".$this->sep."42".$this->sep."44".$this->sep."48".$this->sep."49".$this->sep."51";
		//ID+VALORACION+IMPORTANCIA
		$result = $this->Busquedas_model->setHabilidadesBlandasBusqueda($busquedaACTUAL,$habilidadesBlandas);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HABILIDADES_BLANDAS Habilidades Blandas de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HABILIDADES_BLANDAS ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CONSULTA DE BUSQUEDA **/

		$result  = $this->Busquedas_model->getBusqueda($busquedaACTUAL);

		if ($result["error"] == 0 ){
				$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDA Búsqueda consultada correctamente. ID : ".$busquedaACTUAL;
		}
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDA ERROR : (".$result["error"].") :".$result["desc"];
		
		echo $data["result"]."<br />";
		var_dump($result);
		echo "<br />";
		
		/** PRUEBA CONSULTA DE RECURSO DEBUSQUEDA **/
		$result = $this->Busquedas_model->getRecursoBusqueda($busquedaACTUAL);

		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_CONS_BUS_CV Recurso de Busqueda consultado correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_CONS_BUS_CV ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		var_dump($result);
		echo "<br />";
		
		

	
		/** PRUEBA CONSULTA DE EDUCACION FORMAL DE LA BUSQUEDA **/
		

		$result = $this->Busquedas_model->getEducacionFormalDeBusqueda($busquedaACTUAL);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_CONS_BUS_EDU_FORMAL Industrias de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_CONS_BUS_EDU_FORMAL ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		var_dump($result);
		echo "<br />";
		

	
		
		/** PRUEBA CONSULTA DE INDUSTRIA DE LA BUSQUEDA **/
		
		$result = $this->Busquedas_model->getIndustriasBusqueda($busquedaACTUAL);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_CONS_INDUSTRIA Industrias de Busqueda consultada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_CONS_INDUSTRIA ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		var_dump($result);
		echo "<br />";
		
		/** PRUEBA CONSULTA DE HERRAMIENTAS DE LA BUSQUEDA **/
		$result = $this->Busquedas_model->getHerramientasBusqueda($busquedaACTUAL);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_CONS_HERRAMIENTA Herramientas de Busqueda consultada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_CONS_HERRAMIENTA ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		var_dump($result);
		echo "<br />";
		
		
		/** CONSULTA DE HABILIDADES BLANDAS DE LA BUSQUEDA **/

		$result = $this->Busquedas_model->getHabilidadesBlandasBusqueda($busquedaACTUAL);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_CONS_HABILIDADES_BLANDAS Habilidades Blandas de Busqueda consultada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_CONS_HABILIDADES_BLANDAS ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		
		var_dump($result);
		echo "<br />";
		
		
		
		
		
		
		
		
		}
		
		
	/*public function  setEducacionFormal(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$educacionFormal = $this->input->post('educacionFormal');
		$educacionFormal = json_decode($educacionFormal);
		$respuesta = $this->Curriculum_model->setEducacionFormal($currentCurriculum->id, $educacionFormal);
		echo json_encode($respuesta);
	}*/
	

}?>

