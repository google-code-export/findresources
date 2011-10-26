<?php 
/**
 * Este archivo pertenece a la vista del home.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$dataUsuario
 * */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/view_tickets.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/view_tickets.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
<title>Find Resources</title>
</head>
<body>
<?php include("toolbar.php"); ?>
<div id="ticketBody" class="clearfix">
<h1>Solicitud de Tickets</h1>
	<div id="ticketData">
		<div id="ticketDataBody" class="block">
			<h2>Tickets registrados: </h2>
			<div class="inblock">
			<?php 
			$cant = count($tickets);
			$i=0;
			foreach($tickets as $ticket) {
			$i++;?>
				<div class="clearfix">
					<div class="label" > Ticket ID: </div><div> <?php echo $ticket->id_ticket;?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Duración: </div><div> <?php echo $ticket->duracion." días";?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Saldo: </div><div> <?php echo $ticket->q_saldo;?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Valor: </div><div>$ <?php echo $ticket->valor;?></div>
				</div>
				<?php if ($cant != $i) echo "<hr />";?>
			<?php }?>
			</div>
		</div>
	</div>
	<div id="ticketLinks">
		<div id="addTicketLink" class="clearfix" align="center">
			<br /><br /><a href="/busquedas"><img src="/images/src/search.png" /></a>
			<br />BÚSQUEDAS<br />
			<br /><br />
			<a href="javascript:addTicket();" >
				<img src="/images/src/addticket.png" width="50px"/></a>
				<br />&nbsp;SOLICITAR TICKET
		</div>
	</div>
	<div class="opacity" style="display:none;"></div>	
	<div class="popup" id="ticketDataPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle">Solicitud de Tickets</div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
			
				<div class="field clearfix">
					<div class="label">Cantidad de Búsquedas:</div>
					<input type="text" id="ticketDataEditorQuantity" value="" onkeydown="javascript:getSaldo();" onkeyup="javascript:getSaldo();" maxlength="3" size="3" />
				</div>
				<div class="field clearfix">
					<div class="label">Duración:</div>
					<select id="ticketDataEditorDuration" onchange="javascript:getSaldo();">
					<option value="30">30 días</option>
					<option value="60">60 días</option>
					<option value="90">90 días</option>
					<option value="120">120 días</option>
					</select>
				</div>
				<div class="field clearfix">
					<div class="label"><b>PRECIO: </b></div>
					<input type="text" id="ticketDataEditorValue" value="" readonly=readonly />
				</div>
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" />
					<input type="submit" value="Cancelar" class="cancelPopUp" />
				</div>
			</div>
		</div>
	</td></tr>
	</table>
	</div>
</div>
<?php include("footer.php"); ?>

</body>
</html>