<?php 
/**
 * Este archivo pertenece a la vista del curriculum.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$gridIndustria
 * 		$gridHerramientas
 **/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/jquery-ui-1.8.16.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/flexigrid/flexigrid.pack.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />

<script type="text/javascript">

	
</script>

<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-ui.min-1.8.16.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/exportPDF.js')?>"></script>

<script type="text/javascript" src=" <?php echo site_url('js/flexigrid/flexigrid.pack.js')?>"></script>	
<script type="text/javascript" src=" <?php echo site_url('js/src/view_informe_aspectos.js')?>"></script>

<title>FindResources </title>
</head>
<body>

<?php include("toolbar.php"); ?>
	<div class="layout">
		
		<!-- HEADER -->
		<div class="hd">
			
		</div>
		<!-- end HEADER -->
		
		<!-- CONTENT -->
		<div class="content">
			<h1>Informe de aspectos de la personalidad</h1>	
	
			<div class="CL">
				<div class="info clearfix block">

					<div id="aspectosGridContainer" style="float:left">
						<table id="aspectosGrid">	</table>
					</div>

				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>

<form method="post" enctype="multipart/form-data" action="<?php echo site_url('dompdf/getpdf.php')?>" id="exportToPdf" target="iframeUpload">
	
	<input id="contentHtml" name="contentHtml" type="hidden"/>
	<input id="filename" name="filename" type="hidden"/>
	<input id="pdfTitle" name="title" type="hidden"/>
	
	<iframe name="iframeUpload" style="display:none"></iframe>
</form>

</body>
</html>

