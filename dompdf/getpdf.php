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
			<script type="text/php">
				
				if ( isset(\$pdf) ) {
				
				  // Open the object: all drawing commands will
				  // go to the object instead of the current page
				  \$footer = \$pdf->open_object();
				
				  \$w = \$pdf->get_width();
				  \$h = \$pdf->get_height();
				
				  // Add a logo
				  \$img_w = 2 * 72; // 2 inches, in points
				  \$img_h = 1 * 72; // 1 inch, in points -- change these as required
				  \$pdf->image("../images/src/logofr.png", "png", (\$w - \$img_w) / 2.0, \$y - \$img_h, \$img_w, \$img_h);
				
				  // Close the object (stop capture)
				  \$pdf->close_object();
				
				  // Add the object to every page. You can
				  // also specify "odd" or "even"
				  \$pdf->add_object(\$footer, "all");
				}
				</script>


				<style type="text/css">
					$flexGridStyles
				</style>			
				
				<style type="text/css">
					.title {
						margin-left: 200px;
					}
					.header {
						clear: both;
						border-bottom: solid 1px gray;
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
					<div class="title"> <b>$title</b> </div>
				</div>
				<div class="content flexigrid">
					$contentHtml
				</div>
				</body>
		</html>
EOF;
}


?>
