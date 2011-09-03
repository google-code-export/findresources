<?php 
class Busquedas extends CI_Controller {
	
	public function Busquedas(){
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		
	}
	
	public function index(){
		//$usuario = @$_SESSION[SESSION_ID_USUARIO];
		$usuario = "jonakup@hotmail.com";
		$data['usuarioData'] = $this->Usuario_model->getUsuario($usuario);

		$data['busquedasDelUsuario'][0]->id = "0";
		$data['busquedasDelUsuario'][0]->nombre = "Contadores serios";
		$data['busquedasDelUsuario'][1]->id = "1";
		$data['busquedasDelUsuario'][1]->nombre = "Abogado Marketineros";
		$data['busquedasDelUsuario'][2]->id = "2";
		$data['busquedasDelUsuario'][2]->nombre = "Secretarias no sexies";
		$data['busquedasDelUsuario'][3]->id = "3";
		$data['busquedasDelUsuario'][3]->nombre = "Obrero que desea reubicacion";
		
		$idUsuario = "leandrominio@gmail.com";
		$descripcionBusqueda = "Esta es la descripcion de mi primera búsqueda";
		$fechaHasta = "03/10/2011";
		$cantidadRecursos = 2 ;
		$idBusqueda = 1;
		$result  = $this->Busquedas_model->setBusqueda($idBusqueda, $idUsuario,$descripcionBusqueda,$fechaHasta,$cantidadRecursos);
		
		if ($result["error"] == 0 )
				$data["result"] = "Búsqueda creada/modificada correctamente. ID : ".$result["idBusqueda"];
		else 			
			$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
		
		echo $data["result"];
		//$this->load->view('view_busquedas', $data);
		$educacionFormal = array(
			"id" => null, // null = nuevo
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
			"modoEstado" => "R",
			"promedioDesde" => 6,
			"promedioHasta"=> 8,
			"modoPromedio"=> "P",
			"baja" => "N" // SI LO QUIERO BORRAR PONGO "S"
		);
		
		$result = $this->Busquedas_model->setEducacionFormalDeBusqueda($result["idBusqueda"],$educacionFormal);
		
		if ($result["error"] == 0 )
				$data["result"] = "EducacionFormal creada/modificada correctamente. ID : ".$result["idEducacionFormal"];
		else 			
			$data["result"] = "ERROR (".$result["error"].") :".$result["desc"];
			
		print_r($result);
	}
	
	
	public function  setEducacionFormal(){
		$currentCurriculum = @$_SESSION[SESSION_CV_EDITANDO];
		$educacionFormal = $this->input->post('educacionFormal');
		$educacionFormal = json_decode($educacionFormal);
		$respuesta = $this->Curriculum_model->setEducacionFormal($currentCurriculum->id, $educacionFormal);
		echo json_encode($respuesta);
	}
	

}?>

