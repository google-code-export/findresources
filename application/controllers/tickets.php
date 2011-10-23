<?php 
class Tickets extends CI_Controller {
	
	public function Curriculum(){
		parent::__construct();
	}
	
	public function index(){
		$usuario = @$_SESSION[SESSION_ID_USUARIO];
		if(!$usuario){
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			$usuario = "leandrominio@gmail.com";
			$_SESSION[SESSION_ID_USUARIO] = $usuario;
			/////////////HARDCODED//////////////////////////
			/////////////HARDCODED//////////////////////////
			
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			//redirect('login');
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
			///////////DEVELOPING//UNCOMMENT//THIS////////////////
		}
		
		$info_tickets = $this->Ticket_model->consultarSaldoTicketEmpresa($usuario);
		$data["tickets"] = $info_tickets["ticket_saldo"];
		$this->load->view('view_tickets', $data);
		
	}
	public function add(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		
		$ticket = $this->input->post('ticket');
		
		$ticket = json_decode_into_array(utf8_decode($ticket));
		$ticket_valor_tmp = $this->Ticket_model->getValorTicket($ticket["duracion"],$ticket["unidades"]);
		
		$ticket["valor"]= $ticket_valor_tmp["valor"];
		$response = $this->Ticket_model->asociarTicket($idUsuario,$ticket["duracion"],$ticket["unidades"],$ticket["valor"]);
		
		echo json_encode($response);
		
	}
	
	public function getValor(){
		$ticket = $this->input->post('ticket');
		$ticket = json_decode_into_array(utf8_decode($ticket));
		try {
			$ticket_valor_tmp = $this->Ticket_model->getValorTicket($ticket["duracion"],$ticket["unidades"]);	
		} catch (Exception $e) {
			$ticket["valor"] = "0";
			echo json_encode($ticket);
		}
		$ticket["valor"] = $ticket_valor_tmp["valor"];
		echo json_encode($ticket);
	}
	
	public function consumir(){
		$idUsuario = @$_SESSION[SESSION_ID_USUARIO];
		$ticket_valor_tmp = $this->Ticket_model->consumirTicket($idUsuario,"122","1");
		print_r($ticket_valor_tmp);
	}
}

?>

