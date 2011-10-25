<?php 
class Busquedas extends CI_Controller {
	
	//public $sep = ";";
	
	public function Busquedas(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		/** SETEO SEPARADOR **/
		$query = $this->db->query('SELECT PKG_UTIL.FU_OBTIENE_SEPARADOR_SPLIT() SEPARADOR FROM DUAL');
		$row = $query->row_array();
		$this->sep = $row["SEPARADOR"];
		
	}
	
	public function index(){
		//$this->runTest();
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario){
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			$idUsuario = "leandrominio@gmail.com";
			$idBusqueda = "1";
			$_SESSION[SESSION_ID_USUARIO] = "leandrominio@gmail.com";
			
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////save in session where the user wanted to enter
			//redirect('login');
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
		}
		
		
		if(isset($_GET["busquedaId"])){
			$idBusqueda = $_GET["busquedaId"]; 
			////////REVISAR AQUI SI ESTA BUSQUEDA PERTENECE 
			////////A LAS QUE VINIERON ANTES A ESTE USUARIO
			////////SEGUN SU ID.
			//SET BUSQUEDA SELECCIONADA
			$_SESSION[SESSION_ID_BUSQUEDA_SELECCIONADA]= $idBusqueda;
			$data['busquedaSeleccionada'] = $this->Busquedas_model->getOpcionesDeBusqueda($idBusqueda);
			$data['estadoBusqueda'] = $this->Busquedas_model->getEstadoBusqueda($idBusqueda);
			//$data['resultadoBusqueda'] = $this->Busquedas_model->getResultadoBusqueda($idBusqueda);
			//var_dump($data['resultadoBusqueda']);
			//exit;
		}
		
		
		//$data['habilidadesBlandasDisponibles'] = $this->Busquedas_model->getHabilidadesBlandasBusqueda($idBusqueda);
		$data['busquedasDelUsuario'] = $this->Busquedas_model->getBusquedasDeUsuario($idUsuario);
		$data['busquedasDelUsuario'] = array_merge($data['busquedasDelUsuario']['busquedas_activas'], $data['busquedasDelUsuario']['busquedas_inactivas']);
		
		$idHabilidad = NULL;

		$data['habilidadesBlandasDisponibles'] = $this->Util_model->getHabilidadesBlandas($idHabilidad);
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['estadosCiviles'] = $this->Util_model->getEstadosCiviles();
		$data['paises'] = $response = $this->Util_model->getPaises();
		$data['industriasDisponibles'] = $this->Util_model->getIndustriasDisponibles();
		$data['areasDisponibles'] = $this->Util_model->getAreasDisponibles();
		$data['nivelesDeEducacion'] = $this->Util_model->getNivelesDeEducacion();
		$data['entidadesEducativas'] = $this->Util_model->getEntidadesEducativas();
		$data['tiposDeEducacionNoFormal'] = $this->Util_model->getTiposDeEducacionNoFormal();
		
		if(isset($_POST["educacionFormal"])){
			$educacionFormal =  json_decode_into_array($_POST["educacionFormal"]);
			$result = $this->Busquedas_model->setEducacionFormalDeBusqueda($idBusqueda,$educacionFormal);
		}
		if(isset($_POST["recurso"])){
			$cv =  json_decode_into_array($_POST["recurso"]);
			$result = $this->Busquedas_model->setRecursoBusqueda($idBusqueda,$recurso);
		}
		if(isset($_POST["habilidades"])){
			$habilidades =  implode($this->sep,json_decode($_POST["habilidades"],true)); 
			$result = $this->Busquedas_model->setHabilidadesBlandasBusqueda($idBusqueda,habilidades);
		}		
		
		$info_tickets = $this->Ticket_model->consultarSaldoTicketEmpresa($idUsuario);
		$data["tickets"] = $info_tickets["ticket_saldo"];
		
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

		
	public function setBusqueda(){
		$busqueda= $this->input->post('busqueda');
		$busqueda = json_decode_into_array(utf8_decode($busqueda));
		
		
		////////REVISAR AQUI SI ESTA BUSQUEDA PERTENECE 
		////////A LAS QUE VINIERON ANTES A ESTE USUARIO
		////////SEGUN SU ID.
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];

		$result  = $this->Busquedas_model->setBusqueda($idUsuario, $busqueda, $busqueda["id_ticket"]);

		echo json_encode($result);
	}
	
	public function setBajaBusqueda(){
		$busqueda= $this->input->post('busqueda');
		$busqueda = json_decode($busqueda);
		$result  = $this->Busquedas_model->setBajaBusqueda($busqueda->id_busqueda);

		echo json_encode($result);
	}
	
	public function setRecurso(){
			
		$idBusqueda = @$_SESSION[SESSION_ID_BUSQUEDA_SELECCIONADA];
		
		if(isset($_POST["recurso"])){
			$recurso =  json_decode_into_array($_POST["recurso"]);
			$result = $this->Busquedas_model->setRecursoBusqueda($idBusqueda,$recurso);
			echo json_encode($result);
		}
	}
	
	public function setHabilidadesDuras(){
			
		$idBusqueda = @$_SESSION[SESSION_ID_BUSQUEDA_SELECCIONADA];

		$result;
		if(isset($_POST["lista_herramienta"])){
			$herramientas= json_decode($_POST["lista_herramienta"],true);
			$result->herramientas = $this->Busquedas_model->setHerramientasBusqueda($idBusqueda,$herramientas);
		}
		
		if(isset($_POST["lista_industria"])){
			$industrias= json_decode($_POST["lista_industria"],true);
			$result->industrias = $this->Busquedas_model->setIndustriasBusqueda($idBusqueda,$industrias);
		}
		
		echo json_encode($result);
		
	}
	
	
	public function setEducacionFormal(){
			
		$idBusqueda = @$_SESSION[SESSION_ID_BUSQUEDA_SELECCIONADA];
		if(isset($_POST["edu_formal"])){
			$educacionFormal =  json_decode_into_array($_POST["edu_formal"]);
			//print_r($educacionFormal);
			$result = $this->Busquedas_model->setEducacionFormalDeBusqueda($idBusqueda,$educacionFormal);
			echo json_encode($result);
		}

	
	}
	
	
	public function setHabilidadesBlandas(){
			
		$idBusqueda = @$_SESSION[SESSION_ID_BUSQUEDA_SELECCIONADA];
		if(isset($_POST["hab_blandas"])){
			$habilidadesBlandas =  implode($this->sep,json_decode_into_array($_POST["hab_blandas"]));
			$result = $this->Busquedas_model->setHabilidadesBlandasBusqueda($idBusqueda,$habilidadesBlandas);
			echo json_encode($result);
		}

	
	}
	
	public function setHistoriaLaboral(){
			
		$idBusqueda = @$_SESSION[SESSION_ID_BUSQUEDA_SELECCIONADA];
		
		if(isset($_POST["lista_historia_laboral"])){
			$historiaLaboral =  json_decode_into_array($_POST["lista_historia_laboral"]);
			$result = $this->Busquedas_model->setHistoriaLaboral($idBusqueda,$historiaLaboral);
			echo json_encode($result);
		}
	}
	
	public function setGrid(){
		$idBusqueda = $this->uri->segment(3);
		$resultados_de_busqueda = $this->Busquedas_model->getResultadoBusqueda($idBusqueda,"S");
		//print_r($resultados_de_busqueda);
		$grid["page"] = 1;
		$grid["total"] = 6;
		$grid["rows"] = array();
		 
		$rc = false;
		$key = 1;
		foreach ($resultados_de_busqueda["resultado_busqueda"] as $resultado_busqueda) {
		
			/**************************************************************/
		 	/**TODO REEMPLAZAR POR pkg_util.pr_estado_contacto_busqueda  **/
			/**************************************************************/
			switch($resultado_busqueda->c_estado_contacto) { 
				case "EN":
					$s1 = "selected";
					$s2 ="";
					$s3 ="";
					$s4 ="";
					$s5 ="";
					break;
				case "SE":
					$s1 =""; 
					$s2 = "selected";
					$s3 ="";
					$s4 ="";
					$s5 ="";
				break;
				case "CO":
					$s1 =""; 
					$s2 = "";
					$s3 ="selected";
					$s4 ="";
					$s5 ="";
				break;
				case "RE":
					$s1 =""; 
					$s2 = "";
					$s3 ="";
					$s4 ="selected";
					$s5 ="";
				break;
				case "OE":
					$s1 =""; 
					$s2 = "";
					$s3 ="";
					$s4 ="";
					$s5 ="selected";
				break;
			}
			switch ($resultado_busqueda->estado_test){
				case "P":
					$estado = "Pendiente";
					$estado = "<img src='/images/src/delete.png' />";
					$informe_link = "<img src='/images/src/delete.png' />";
					break;
				case "R";
					$estado = "Realizado";
					$estado = "<img src='/images/src/ok.png' />";
					$informe_link = "<a href='javascript:document.informe$key.submit();' ><img src='/images/src/doc.png' /></a>";
					break;
				default:
					$estado = "Sin datos";
					$informe_link = "Sin datos";
			}
			$grid["rows"][$key]["id"] = $key;
			$grid["rows"][$key]["cell"] = array($resultado_busqueda->valor_ranking,
												$resultado_busqueda->nombre." ".$resultado_busqueda->apellido,
												$estado,
												"<form id='informe$key' name='informe$key' method=post action='test/informe' target='_blank'>
													<input type='hidden' name='informe_usuario' value='".$resultado_busqueda->usuario."' />
													".$informe_link."
												</form>",
												"<form id='datos$key' name='datos$key' method=post action='curriculum/userBusqueda' target='_blank'>
													<input type='hidden' name='datos' value='".$resultado_busqueda->usuario."'/>
													<a href='javascript:document.datos$key.submit();' ><img src='/images/src/cv.png' width='21px'/></a>
												</form>",
												"<form id='estado$key' name='estado$key' method=post >
												<input type='hidden' name='cv_busqueda' id='cv_busqueda' value='".$resultado_busqueda->id_res_busqueda."' />
													<select name='estado_cv_busqueda' id='estado_cv_busqueda'>
														<option value='EN' ".$s1." >Entrevistado</option>
														<option value='SE' ".$s2." >Sin Entrevistar</option>
														<option value='CO' ".$s3." >Contratado</option>
														<option value='RE' ".$s4." >Rechazado</option>
														<option value='RE' ".$s5." >Entrevista Solicitada</option>
													</select>&nbsp;&nbsp;
													<a href='javascript:setEstadoCVBusqueda(\"estado$key\");'><img src='".site_url("images/src/refresh.png")."' /></a>
												</form>"
												);

		$key++;
		}
		echo json_encode_utf8($grid);
		
	}
	
	/** SETEA EL ESTADO DE UN CV DE UNA BUSQUEDA **/
	public function setEstadoCVBusqueda(){
		if(isset($_POST["cv_bus"])){
			$cv_busqueda = json_decode_into_array($_POST["cv_bus"]);
			try {
				$result = $this->Busquedas_model->cambiarEstadoCVBusqueda($cv_busqueda["cv_busqueda"],$cv_busqueda["estado_cv_busqueda"],$cv_busqueda["observacion_cv_busqueda"]);
				echo json_encode($result);
			}
			catch (Exception $e) {
				echo "ERROR (".$e->getMessage().")";
			}
		}
	}
	
	
	
	/**************************************** TEST **********************************************/
	/**************************************** TEST **********************************************/
	/**************************************** TEST **********************************************/
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
		$idTicket = ""; //VACIO PARA CREAR UNA NUEVA BUSQUEDA
		$titulo = "Busqueda de prueba 2";
		$result  = $this->Busquedas_model->setBusqueda($idBusqueda, $idUsuario,$titulo, $descripcionBusqueda,$idTicket,$cantidadRecursos);
		$busquedaACTUAL = $result["id_busqueda"];
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDA Búsqueda creada/modificada correctamente. ID : ".$busquedaACTUAL;
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUSQUEDA ERROR : (".$result["error"].") :".$result["desc"];
		
		echo $data["result"]."<br />";
		

		/** PRUEBA CREACION DE EDUCACION FORMAL PARA LA BUSQUEDA **/
		$educacionFormal = array(
			"id_bus_edu_formal" => 4, // NULL = nuevo
			"id_entidad_educativa" => 3,
			"d_entidad" => "ENTIDAD", 
			"c_modo_entidad" => "R",
			"titulo" => "Ingeniero en Electrónica",
			"c_modo_titulo" => "R",
			"id_nivel_educacion" => 1,
			"c_modo_nivel_educacion" => "R",
			"id_area" => 1,
			"c_modo_area" => "R",
			"estado" => "C",
			"c_modo_estado" => "R", //REQUERIDO - PREFERIDO
			"promedio_desde" => 6,
			"promedio_hasta"=> 8,
			"c_modo_promedio"=> "P",
			"c_baja" => "N" // SI LO QUIERO BORRAR PONGO "S"
		);
		 
		$result = $this->Busquedas_model->setEducacionFormalDeBusqueda($busquedaACTUAL,$educacionFormal);
		
		if ($result["error"] == 0 )
				$data["result"] = "PKG_BUSQUEDAS.PR_BUS_EDUCACION_FORMAL EducacionFormal creada/modificada correctamente. ID : ".$result["id_bus_edu_formal"];
		else 			
			$data["result"] = "PKG_BUSQUEDAS.PR_BUS_EDUCACION_FORMAL : ERROR (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";
		
		
		/** PRUEBA CREACION DE RECURSO PARA LA BUSQUEDA **/
		$recurso = array(
			"id" => 4, // Busqueda NULL = nuevo
			"edad_desde" => 20,
			"edad_hasta" => 30, 
			"edad_c_modo" => "R",
			"nacionalidad" => "ARG".$this->sep."R".$this->sep."BOL".$this->sep."P",
			"provincia" => "0".$this->sep."P", // 0 = CABA
			"localidad" => "", // VA el texto no el id
			"twitter_c_modo" => "P",
			"gtalk_c_modo" => "P",
			"sms_c_modo" => "P" 
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
		$habilidadesBlandas = "41".$this->sep."42".$this->sep."44".$this->sep."48".$this->sep."49".$this->sep."51";
		//ID+VALORACION+IMPORTANCIA
		//$habilidadesBlandas =  array (41,42,44,48,49,51);
		//$habilidadesBlandas = json_encode($habilidadesBlandas);
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
		$result["error"] = 0; //
		/*$result = $this->Ticket_model->asociarTicket($idUsuario,$duracion,$unidades);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_ASOCIA_TICKETS_EMPRESAS Ticket asociado correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.R_ASOCIA_TICKETS_EMPRESAS ERROR : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
*/
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
		$historiaLaboral["id_historia_laboral"] = 1;
		$historiaLaboral["d_compania"] ="IBM";
		$historiaLaboral["c_modo_compania"] = "P";
		$historiaLaboral["id_industria"] = "1";
		$historiaLaboral["c_modo_industria"] = "P";
		$historiaLaboral["pais"] = "ARG";
		$historiaLaboral["c_modo_pais"] = "P";
		$historiaLaboral["anos"] = "20";
		$historiaLaboral["c_modo_anos"] = "P";
		$historiaLaboral["titulo"] = "Universitario";
		$historiaLaboral["c_modo_titulo"] = "P";
		$historiaLaboral["c_baja"] = NULL;
		
		$result = $this->Busquedas_model->setHistoriaLaboral($idBusqueda,$historiaLaboral);
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_BUS_HISTORIA_LABORAL Historia laboral seteada correctamente. N º : ".$result["id_historia_laboral"];
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
		/** OBTENGO LA HISTORIA LABORAL A UNA BUSQUEDA **/

		$result = $this->Busquedas_model->getResultadoBusqueda(1,"N");
		
		if ($result["error"] == 0 )
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_RESULTADO_BUSQUEDA Búsqueda consultada correctamente.";
		else 			
			$data["result"] = "PKG_TICKETS_EMPRESAS.PR_RESULTADO_BUSQUEDA : (".$result["error"].") :".$result["desc"];
			
		echo $data["result"]."<br />";		

		var_dump($result);
		echo "<br />";
		
		//////////**************HARD CODE DATA BY MFOX************//////////////
				
		
	}
		

}?>

