<?php 
/**
 * Este archivo pertenece a la vista del feedback resultados.
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
<script type="text/javascript" src=" <?php echo site_url('js/src/view_feedback_resultados.js')?>"></script>

<style type="text/css">
	#candidatosGridPopUp .inside{
		height: 580px;
	}
	
	#candidatosGridPopUp .in {
		 height: 600px;
		 width: 800px;
	}
	
	.label{
		width: 200px;
	}

	#candidateReportPopUp .in {
		width: 1020px;
		min-height: 170px;
	}
	#candidateReportIframe{
		width: 950px;
	}
	
	#candidateReportLoading{
		color: white;
		background-color: black;
	    opacity: 0.8;
	    display: block;
	    padding: 20px;
	}
	
	#candidateReportLoading img{
		padding-bottom:5px;
	}


</style>


<title>FindResources </title>
</head>
<body>

<?php include("toolbar.php"); ?>
	<div class="body_container">
		
		<!-- CONTENT -->
		<div class="content">
			<h1>Informes finales</h1>	
	
			<div class="CL">
				<div class="info clearfix block">
					<div id="searchFields">

						<div class="field clearfix">
							<div class="label">Nombre de la búsqueda:</div>
							<input type="text" id="busquedasSearchName"/>
						</div>
						<div class="field clearfix">
							<div class="label">Nombre de la empresa:</div>
							<input type="text" id="busquedasCompanyName"/>
						</div>
						<div class="field clearfix">
							<div class="label">Mail de la empresa:</div>
							<input type="text" id="busquedasCompanyMail"/>
						</div>
						<div class="buttonsPopUp">
							<a href="javascript:getBusquedas();" class="button save">Consultar</a>
						</div>

					</div>
					<div id="busquedasGridContainer" class="gridContent" style="float:left; margin-left: 7px; margin-top: 20px;">
						<table id="busquedasGrid"  class="grid">	</table>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>

<div class="popup" id="candidatosGridPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Candidatos de la búsqueda </div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
				<div id="candidatosGridContainer" class="gridContent" style="float:left">
					<table id="candidatosGrid"  class="grid">	</table>
				</div>
			</div>
		</div>
	</td></tr>
	</table>
</div>

<div class="popup" id="candidateReportPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
				<iframe id="candidateReportIframe" src="" scrolling="no" frameborder="0">
				</iframe>
				<div id="candidateReportLoading">
					<img src="/images/src/55_cycle_ten_24.gif"/>
					<div> Cargando ...</div>
				</div>
				
			</div>
		</div>
	</td></tr>
	</table>
</div>


</body>
</html>

