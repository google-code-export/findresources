<?php 
class Busquedas extends CI_Controller {
	
	public $sep = ";";
	
	public function Busquedas(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		//$this->runTest();
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario){
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			$idUsuario = "jonakup@hotmail.com";
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			//redirect('login');
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
		}
		
		
		if(isset($_GET["busquedaId"])){
			$idBusqueda = $_GET["busquedaId"]; 
			//SET ID BUSQUEDA EN SESSION
			$data['busquedaSeleccionada'] = $this->Busquedas_model->getOpcionesDeBusqueda($idBusqueda);
		} else $idBusqueda = "1";
		
		//$data['habilidadesBlandasDisponibles'] = $this->Busquedas_model->getHabilidadesBlandasBusqueda($idBusqueda);
		echo "1";
		$data['busquedasDelUsuario'] = $this->Busquedas_model->getBusquedasDeUsuario($idUsuario);
		echo "2";
		$data['estadoBusqueda'] = $this->Busquedas_model->getEstadoBusqueda($idBusqueda);		
		echo "3";
		$idHabilidad = NULL;
		$data['habilidalesdesBlandasDisponibles'] = $this->Util_model->getHabilidadesBlandas($idHabilidad);
		
		var_dump($data);
		/*
		 * $b1->descripcion = "busqueda 1";
		$b1->fechaHasta = "05/03/2012";
		$b1->cantidadRecursos = 2;
		
		$b2->descripcion = "busqueda 2";
		$b2->fechaHasta = "04/04/2012";
		$b2->cantidadRecursos = 3;
		
		$b3->descripcion = "busqueda 3";
		$b3->fechaHasta = "04/01/2012";
		$b3->cantidadRecursos = 1;
		
		
		$data['busquedasDelUsuario'] = array(
			"1" => $b1,
			"2" => $b2,
			"3" => $b3);
		
		$data['habilidadesBlandasDisponibles'] = array(
			"41" => "habilidad blanda 1",
			"42" => "habilidad blanda 2",
			"43" => "habilidad blanda 3");
		*/

		
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['estadosCiviles'] = $this->Util_model->getEstadosCiviles();
		$data['paises'] = $response = $this->Util_model->getPaises();
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['areasDisponibles'] = $this->Util_model->getAreasDisponibles();
		$data['nivelesDeEducacion'] = $this->Util_model->getNivelesDeEducacion();
		$data['entidadesEducativas'] = $this->Util_model->getEntidadesEducativas();
		$data['tiposDeEducacionNoFormal'] = $this->Util_model->getTiposDeEducacionNoFormal();
		
	
		
		
		$this->load->view('view_busquedas', $data);
		
		
		
		
		}
		
		
	/*public function  setEducacionFormal(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$educacionFormal = $this->input->post('educacionFormal');
		$educacionFormal = json_decode($educacionFormal);
		$respuesta = $this->Curriculum_model->setEducacionFormal($currentCurriculum->id, $educacionFormal);
		echo json_encode($respuesta);
	}*/
	
			/*public function  setEducacionFormal(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$educacionFormal = $this->input->post('educacionFormal');
		$educacionFormal = json_decode($educacionFormal);
		$respuesta = $this->Curriculum_model->setEducacionFormal($currentCurriculum->id, $educacionFormal);
		echo json_encode($respuesta);
	}*/
	
	/**
	 * input: 'idBusquedaexperienciaLaboral'
	 * output: retorna las opciones de la busqueda.
	 * */
	private function  getOpcionesDeBusqueda($idBusqueda){
		
		$resultado->educacionFormal->idEntidad = null;
		$resultado->educacionFormal->descripcionEntidad = "ENTIDAD"; 
		$resultado->educacionFormal->modoEntidad = "R";
		$resultado->educacionFormal->titulo = "Ingeniero en Electrónica";
		$resultado->educacionFormal->modoTitulo = "R";
		$resultado->educacionFormal->idNivelEducacion = 1;
		$resultado->educacionFormal->modoNivelEducacion = "R";
		$resultado->educacionFormal->idArea = 1;
		$resultado->educacionFormal->modoArea = "R";
		$resultado->educacionFormal->estado = "C";
		$resultado->educacionFormal->modoEstado = "R";
		$resultado->educacionFormal->promedioDesde = 6;
		$resultado->educacionFormal->promedioHasta = 8;
		$resultado->educacionFormal->modoPromedio = "P";
		$resultado->educacionFormal->baja = "N";
		
		$resultado->recurso->edadDesde = 20;
		$resultado->recurso->edadHasta = 30;
		$resultado->recurso->edadModo = "R";
		$resultado->recurso->nacionalidad = array("ARG", "BOL");
		$resultado->recurso->provincia = array("0", "1");
		//$resultado->recurso->localidad = "R";" => "", // VA el texto no el id --- VA ESTO?
		$resultado->recurso->twitterModo = "P";
		$resultado->recurso->gtalkModo = "P";
		$resultado->recurso->smsModo = "R"; 
		
		
		/***********          HERRAMIENTAS      ***********/
		/**
		 * array[idHerramienta] {valor, importancia}
		 * */
		$i1->valor = 5;
		$i1->importancia = 100;
		$i1->descripcionArea = "Area 1";
		$i1->descripcionHerramienta = "Herramienta 1";
		
		$i2->valor = 3;
		$i2->importancia = 20;
		$i2->descripcionArea = "Area 2";
		$i2->descripcionHerramienta = "Herramienta 2";
		
		$i3->valor = 1;
		$i3->importancia = 77;
		$i3->descripcionArea = "Area 3";
		$i3->descripcionHerramienta = "Herramienta 3";
		
				
		$resultado->herramientas = array(
			"1" => $i1,
			"2" => $i2,
			"3" => $i3,
		);
		
		
		$resultado->habilidadesBlandas = array("41", "42", "43"); 
		
		
		/**
		 * array[idIndustria] {idArea, valor, importancia}
		 * */
		$i1->valor = 5;
		$i1->importancia = 31;
		
		
		
		$i2->valor = 3;
		$i2->importancia = 20;
		
		
		$i3->valor = 1;
		$i3->importancia = 77;
		
		
		$resultado->industrias = array(
			"1" => $i1,
			"2" => $i2,
			"3" => $i3,
		);
		
		return $resultado;
	}
	
	private function runTest(){
		
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
		$idTicket = 1;
		$result  = $this->Busquedas_model->setBusqueda($idBusqueda, $idUsuario,$descripcionBusqueda,$idTicket,$cantidadRecursos,$fechaHasta);
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
		
		$industrias = "1".$this->sep."5".$this->sep."20".$this->sep."2".$this->sep."3".$this->sep."90";
		//ID+VALORACION+IMPORTANCIA
		$result = $this->Busquedas_model->setIndustriasBusqueda($busquedaACTUAL,$industrias);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_INDUSTRIA Industrias de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_INDUSTRIA ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE HERRAMIENTAS PARA LA BUSQUEDA **/
		$herramientas = "7".$this->sep."5".$this->sep."20".$this->sep."6".$this->sep."3".$this->sep."90";
		//ID+VALORACION+IMPORTANCIA
		$result = $this->Busquedas_model->setHerramientasBusqueda($busquedaACTUAL,$herramientas);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HERRAMIENTA Herramientas de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HERRAMIENTA ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE HABILIDADES BLANDAS PARA LA BUSQUEDA **/
		//$habilidadesBlandas = "41".$this->sep."42".$this->sep."44".$this->sep."48".$this->sep."49".$this->sep."51";
		//ID+VALORACION+IMPORTANCIA
		$habilidadesBlandas =  array (41,42,44,48,49,51);
		$habilidadesBlandas = json_encode($habilidadesBlandas);
		$result = $this->Busquedas_model->setHabilidadesBlandasBusqueda($busquedaACTUAL,$habilidadesBlandas);

		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HABILIDADES_BLANDAS Habilidades Blandas de Busqueda creada/modificada correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_HABILIDADES_BLANDAS ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		/** PRUEBA CONSULTA DE BUSQUEDA **/

		$result  = $this->Busquedas_model->getBusqueda($busquedaACTUAL);

		if ($result["error"] == 0 ){
				$data["result"] = "PKG_BUSQUEDAS.PR_CONS_BUSQUEDA Búsqueda consultada correctamente. ID : ".$busquedaACTUAL;
		}
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_CONS_BUSQUEDA ERROR : (".$result["error"].") :".$result["desc"];
		
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
		
		/** CONSULTA DE BUSQUEDAS DE UN USUARIO **/

		$result = $this->Busquedas_model->getBusquedasDeUsuario($idUsuario);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDAS_X_USUARIO Busquedas de un usuario consultadas correctamente.";
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDAS_X_USUARIOS ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";

		/** CONSULTA TODOS LOS DATOS DE UNA BUSQUEDA **/
		$result = $this->Busquedas_model->getOpcionesDeBusqueda($idBusqueda);
		
		var_dump($result);

		/** ASOCIAR TICKET A BUSQUEDA **/

		$duracion = "2";
		$unidades = "999";
		$result["error"] = 0; //$result = $this->Ticket_model->asociarTicket($idUsuario,$duracion,$unidades);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_ASOCIA_TICKETS_EMPRESAS Ticket asociado correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.R_ASOCIA_TICKETS_EMPRESAS ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";

		/** CONSUMIR TICKET **/

		$idTicket = "4";
		$unidades = "1";
		$result = $this->Ticket_model->consumirTicket($idUsuario,$idTicket,$unidades);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONSUME_TICKET_EMPRESA Ticket asociado correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONSUME_TICKET_EMPRESA : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		
		/** CONSULTAR SALDO TICKET **/

		$idTicket = "4";
		$result = $this->Ticket_model->consultarSaldoTicket($idTicket);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONSULTA_SALDO_TICKET Ticket consultado correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONSULTA_SALDO_TICKET : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		/** CONSULTAR SALDO TICKET **/

		$result = $this->Ticket_model->consultarSaldoTicketEmpresa($idUsuario);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONS_TICKET_SALDO_EMPRESA Ticket consultado correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONS_TICKET_SALDO_EMPRESA : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		
		/** OBTENER HABILIDADES BLANDAS **/
		$idHabilidad = NULL;
		$result = $this->Util_model->getHabilidadesBlandas($idHabilidad); //SI LE PASO NULL DEVUELVE TODAS
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_UTIL.PR_OBTIENE_HAB_BLANDAS Habilidades blandas consultadas correctamente.";
		else 			
			$data["result"] = "PKG_UTIL.PR_OBTIENE_HAB_BLANDAS : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		/** CONSULTAR ESTADOBUSQUEDA**/

		$result = $this->Busquedas_model->getEstadoBusqueda($idBusqueda);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_ESTADO_BUSQUEDA Busqueda consultada correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_ESTADO_BUSQUEDA : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		/** SETEO LA HISTORIA LABORAL A UNA BUSQUEDA **/
		$idHistoriaLaboral = 1;
		$compania ="IBM";
		$companiaModo = "P";
		$industria = "1";
		$industriaModo = "P";
		$pais = "ARG";
		$paisModo = "P";
		$anos = "20";
		$anosModo = "P";
		$titulo = "Universitario";
		$tituloModo = "P";
		$fechaBaja = NULL;
		$result = $this->Busquedas_model->setHistoriaLaboral($idBusqueda,$idHistoriaLaboral,$compania,$companiaModo,$industria,$industriaModo,$pais,$paisModo, $anos, $anosModo, $titulo,$tituloModo,$fechaBaja);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_BUS_HISTORIA_LABORAL Historia laboral seteada correctamente. N º : ".$result["idHistoriaLaboral"];
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_BUS_HISTORIA_LABORAL : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		/** OBTENGO LA HISTORIA LABORAL A UNA BUSQUEDA **/

		$result = $this->Busquedas_model->getHistoriaLaboral($idBusqueda);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONS_BUS_HISTORIA_LABORAL Historia laboral consultada correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_CONS_BUS_HISTORIA_LABORAL : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		//////////**************HARD CODE DATA BY MFOX************//////////////
				
		
	}
		

}?>

