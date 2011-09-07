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
	