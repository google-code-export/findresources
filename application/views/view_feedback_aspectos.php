<?php 
/**
 * Este archivo pertenece a la vista del feedback aspectos.
 * 
 **/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/jquery-ui-1.8.16.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/flexigrid/flexigrid.pack.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />

<script type="text/javascript">

	
</script>

<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-ui.min-1.8.16.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/exportPDF.js')?>"></script>

<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>

<script type="text/javascript" src=" <?php echo site_url('js/flexigrid/flexigrid.pack.js')?>"></script>	
<script type="text/javascript" src=" <?php echo site_url('js/src/view_feedback_aspectos.js')?>"></script>

<style type="text/css">
	.field textarea {
		width: 350px;
		height: 200px;
	}
</style>


<title>FindResources </title>

<script type="text/javascript">

	var availableSoftSkills	= <?php echo json_encode_utf8($habilidadesBlandasDisponibles['lista_hab_blandas']); ?>;
	
</script>
</head>
<body>

<?php include("toolbar.php"); ?>
	<div class="body_container">
		
		<!-- CONTENT -->
		<div class="content">
			<h1>Informes finales</h1>	
	
			<div class="CL">
				<div class="info clearfix block">
					<div id="aspectosGridContainer" class="gridContent" style="float:left">
						<table id="aspectosGrid"  class="grid">	</table>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>

<div class="popup" id="softSkillPopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Modificación de Coloquio </div>
		<a href="javascript:;" class="closePopUp"></a>
		<div class="inside">
			<h4>Editando aspecto: <b><label id="softSkillEditorName"></label></b></h4>

			<div class="field clearfix">
				<div class="label">Coloquio:</div>
				<textarea id="softSkillEditorColoquio"></textarea>
			</div>
			<input type="hidden" id="softSkillEditorId"/>
			<div class="buttonsPopUp">
				<a href="javascript:setSoftSkill();" class="button save sendButton">Guardar</a>
				<a href="#" class="button cancelPopUp">Cancelar</a>
			</div>
		</div>
	</div>
</td></tr>
</table>
</div>

</body>
</html>

