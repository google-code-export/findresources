<?php 	
		$tipoUsuario = @$_SESSION[SESSION_TIPO_USUARIO];
?>
<div class="frFooter">
	<a href="<?php echo site_url('/home/sobrenosotros')?>">Sobre nosotros</a>
- 
	<a href="<?php echo site_url('/home/ayuda?u='.$tipoUsuario)?>">Ayuda</a>
- 
	<a href="<?php echo site_url('/home/sugerencias')?>">Sugerencias</a>
- 
	<a href="<?php echo site_url('/home/terminos')?>">Términos</a>
	
	<div class="copyright">Derechos Reservados &copy; <?php echo date("Y");?> - FindResources </div>	
	
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
				<img style="padding-bottom:5px;width:80px" src="/images/src/loading.gif"/>
				<div style="color:white"> Cargando ...</div>
		</td></tr>
		</tbody>
	</table>		
</div>

	