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
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$idUsuario){
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			$idUsuario = "leandrominio@gmail.com";
			$idBusqueda = "1";
			$_SESSION[SESSION_ID_USUARIO] = "leandrominio@gmail.com";
			$_SESSION[SESSION_TIPO_USUARIO] = "E";
			
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////save in session where the user wanted to enter
			//redirect('login');
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
		}
		if(@$_SESSION[SESSION_TIPO_USUARIO] != "E") {
			echo "Usted no es un usuario Empresa.";
			exit;
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
			$data['busquedaId'] = $idBusqueda ;
			
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
		if(!empty($resultados_de_busqueda["correos"])) {
			$this->sendTestEmailsToUser($resultados_de_busqueda["correos"]);
		}
		if(!empty($resultados_de_busqueda["correos_recuerdo"])) {
			$this->sendTestEmailsReminderToUser($resultados_de_busqueda["correos_recuerdo"]);
		}
		//var_dump($resultados_de_busqueda);
		$grid["page"] = 1;
		$grid["total"] = 50;
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
													<select name='estado_cv_busqueda' id='estado_cv_busqueda' onchange='javascript:setEstadoCVBusqueda(\"estado$key\");'>
														<option value='EN' ".$s1." >Entrevistado</option>
														<option value='SE' ".$s2." >Sin Entrevistar</option>
														<option value='CO' ".$s3." >Contratado</option>
														<option value='RE' ".$s4." >Rechazado</option>
														<option value='RE' ".$s5." >Entrevista Solicitada</option>
													</select>
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
	

	private function sendTestEmailsToUser($emails){
			foreach ($emails["E_mail"] as $email) {
				$this->email->from("noreply@gmail.com", "FindResources");
				$this->email->to($email);
				$this->email->bcc ("leandro.minio@gmail.com");
				$this->email->subject(utf8_encode('FindResources - Realización de exámen psicotécnico online'));
				$this->email->message(utf8_encode('
				<b>FindResources - Realización de exámen psicotécnico online</b><br /><br />
				Estimado/a,<br />
				Queremos informarle que su curriculum apareció recientemente en un resultado de búsqueda realizado en FindResources.com.ar<br />
				Si usted está interesado en tener más posibilidades para que lo seleccionen para el puesto, le recomendamos realizar
				los exámenes psicotécnicos que le fueron asignados. <br />
				Para realizar el exámen deberá ingresar en <a href="http://findresources.dyndns.info/Test/inicio">este enlace</a><br /><br />
				Desde ya muchas gracias,<br /><br />
				El Staff de FindResources'));
				$emailSent = $this->email->send();
			}
	}
	private function sendTestEmailsReminderToUser($emails){
			foreach ($emails["E_mail"] as $email) {
				$this->email->from("noreply@gmail.com", "FindResources");
				$this->email->to($email);
				$this->email->bcc ("leandro.minio@gmail.com");
				$this->email->subject(utf8_encode('FindResources - Realización de exámen psicotécnico online'));
				$this->email->message(utf8_encode('
				<b>FindResources - Realización de exámen psicotécnico online</b><br /><br />
				Estimado/a,<br />
				Queremos recordarle que aún tiene pendiente la realización del exámen psicotécnico online. <br />
				Le recordamos que la realización del mismo le brindará más posibilidades para ser seleccionado en un puesto. <br />
				Para realizar el exámen deberá ingresar en <a href="http://findresources.dyndns.info/Test/inicio">este enlace</a><br /><br />
				Desde ya muchas gracias,<br /><br />
				El Staff de FindResources'));
				$emailSent = $this->email->send();
			}
	}		
	
	
		

}?>

