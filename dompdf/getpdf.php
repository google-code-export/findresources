<?php
require_once("dompdf_config.inc.php");
$html =
  '<html><body>'.
  '<p>Put your html here, or generate it with your favourite '.
  'templating system.</p>'.
  '</body></html>';

if(isset($_POST["contentHtml"])){
	
	$title = @$_POST["title"];
	
	$contentHtml = $_POST["contentHtml"];

	$html = getHtml($title,  $contentHtml);

}

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();

$filename = "sample.pdf";

if(isset($_POST["filename"])){
	$filename = $_POST["filename"];
}


$dompdf->stream($filename);

function getHtml($title,  $contentHtml){
	
	$flexGridStyles = file_get_contents('../css/flexigrid/flexigrid.pack.css');
	
	return <<<EOF
		<html>
			<head>

				<style type="text/css">
					$flexGridStyles
				</style>			
				
				<style type="text/css">
					.title {
						margin-top: 10px;
						
						margin-left: 200px;
						float: left;
					}
					.header {
						clear: both;
						border-bottom: solid 1px gray;
						background: url("/images/src/background_header.png") repeat-x scroll 0 0 #FCFCFC;	
						height: 60px;
						padding: 5px;					
						color: white;
					}
					
					.header div,
					.header img{
						float: left;
						padding-bottom: 10px;
					}
					.content {
						padding-top: 30px;
					}
					
					th {
						background-color: #CCCCCC;
					}
					
				</style>			
			</head>
			<body>
				<div class="header">
					<img src='../images/src/logofr.png'> </img>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donde no encontrás un trabajo, encontrás el tuyo.
				</div>
				
				<div class="title"> <b>$title</b> </div>
				
				<div class="content flexigrid">
					$contentHtml
				</div>
				</body>
		</html>
EOF;
}


?>
