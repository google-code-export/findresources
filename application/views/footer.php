<div class="frFooter">
<a href="<?php echo site_url('docs/sobrenosotros.html')?>">Sobre nosotros</a>

- 

<?php 	
	
	$tipoUsuario = "";
	
	if(isset($dataUsuario) && $dataUsuario->idTipoUsuario){
		$tipoUsuario = $dataUsuario->idTipoUsuario;
	}
	

	switch ($tipoUsuario) {
	    case "E": //EMPRESA
?>

	<a href="<?php echo site_url('docs/ayuda_empresas.html')?>">Ayuda</a>

<?php 
        break;
	    case "P": //EXPERTO

?>
	<a href="<?php echo site_url('docs/ayuda_expertos.html')?>">Ayuda</a>

<?php 
		break;
		case "C": //CANDIDATO
		default:
?>
	<a href="<?php echo site_url('docs/ayuda_candidatos.html')?>">Ayuda</a>
<?php 
    		
	} //end switch
		
?>

- 
	<a href="<?php echo site_url('docs/sugerencias.html')?>">Sugerencias</a>
- 
	<a href="<?php echo site_url('docs/terminos.html')?>">Términos</a>
	
	<div class="copyright">Derechos Reservados &copy; <?php echo date("Y");?> - FindResoruces </div>	
	
</div>
<div class="opacity" style="display:none;"></div>

<div class="popup" id="errorPopUp" style="display:none;">
		<table cellspacing="0" cellpadding="0" align="center">
		<tr><td>
			<div class="in">
				<div class="popuptitle">System Error</div>
				<a href="#" class="closePopUp"></a>
				<div class="inside">
				</div>
			</div>
		</td></tr>
		</table>
</div>

<div class="popup" id="waitingActionPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center" style="background-color:black; padding:7px">
		<tbody>
		<tr><td>
				<img style="padding-left: 30px; padding-bottom:5px;" src="/images/src/55_cycle_ten_24.gif">
				<div style="color:white"> Cargando ...</div>
		</td></tr>
		</tbody>
	</table>		
</div>

	