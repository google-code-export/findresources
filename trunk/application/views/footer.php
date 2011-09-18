<div class="frFooter">
<a href="docs/sobrenosotros.html">Sobre nosotros</a>

- 

<?php 	
	
	$tipoUsuario = "";
	
	if(isset($dataUsuario) && $dataUsuario->idTipoUsuario){
		$tipoUsuario = $dataUsuario->idTipoUsuario;
	}
	

	switch ($tipoUsuario) {
	    case "E": //EMPRESA
?>

	<a href="docs/ayuda_empresas.html">Ayuda</a>

<?php 
        break;
	    case "P": //EXPERTO

?>
	<a href="docs/ayuda_expertos.html">Ayuda</a>

<?php 
		break;
		case "C": //CANDIDATO
		default:
?>
	<a href="docs/ayuda_candidatos.html">Ayuda</a>
<?php 
    		
	} //end switch
		
?>

- 
	<a href="docs/sugerencias.html">Sugerencias</a>
- 
	<a href="docs/terminos.html">Terminos</a>
	
	<div class="copyright">Derechos Reservados (c) 2011 - findResoruces </div>	
	
</div>

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

	