<?php 
/**
 * Este archivo dibuja la toolbar de los usuarios.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$dataUsuario
 * */
?>
<?php 	
	
	switch ($dataUsuario->idTipoUsuario) {
		case "C": //CANDIDATO
?>
	HOME - CURRICULUM - DATOS PERSONALES - COMPLETAR TEST PSICOTECNICO

<?php 	
        break;
	    case "E": //EMPRESA
?>

	HOME - TICKETS - BUSQUEDAS - DATOS DE LA EMPRESA

<?php 
        break;
	    case "P": //EXPERTO

?>
	HOME - Feedback Test  - Feedback Informe Final

<?php 
        break;
	    case "A": //ADMINISTRADOR

?>
	HOME - Alta de Usuario Experto
<?php 
		break;
    	default:
?>
			ERROR EN TIPO DE USUARIO.
<?php 
    		
	} //end switch
		
?>
