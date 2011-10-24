<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/view_login.js')?>"></script>

<title>Find Resources</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/tabs.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/view_login.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=98516639154";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php include("toolbar.php"); ?>
<div class="body_container">
	
	<!--h1>&nbsp;&nbsp;Donde no encontrás un trabajo, encontrás el tuyo...</h1><br /-->
	<div id="login_body">
		<div id="login_wellcome">
			<div id="login_wellcome_text"/>
				<br />
				 <div style="font-size:15px;">
					Sitio Web que brinda servicios<br />
					para búsqueda y selección de personal<br />
					evaluando conocimientos y personalidad<br /><br />
				 </div>
				 <img src="/images/src/find_tilde_s-p.png" alt="&#10004;" />
				 Ranking de postulantes<br />
				 <img src="/images/src/find_tilde_s-p.png" alt="&#10004;" />
				 Psicotécnicos Online<br />
				<img src="/images/src/find_tilde_s-p.png" alt="&#10004;" />
				Informe de habilidades<br />
				<img src="/images/src/find_tilde_s-p.png" alt="&#10004;" />
				Seguimiento detallado del proceso de selección<br /><br />
			 </div>
			 <center id="video_container"><iframe width="336" height="189" src="http://www.youtube.com/embed/SdZWF8DJOfk" frameborder="0" allowfullscreen></iframe></center>
			 <br /><br /><div class="fb-like" data-href="https://www.facebook.com/pages/FindResources/198212693580643" data-send="false" data-width="450" data-show-faces="false" data-font="lucida grande"></div>
		</div>
		<div id="login_tabs">
			<ul class="tabs">  
			    <li><a href="#tab1">Ingresar</a></li>  
			    <li><a href="#tab2">Registrate</a></li>  
			</ul>  
			  
			<div class="tab_container">  
			    <div id="tab1" class="tab_content">  
			        <div class="field clearfix">
			        	<div class="label">Email</div>
			        	<div class="control">
			        			<input type="text" id="login_email_input" name="email" value="unmail7@unserver.com"/>
						</div>
			        </div>
					<div class="field clearfix">
			        	<div class="label">Contraseña</div>
			        	<div class="control">
			        			<input type="password" id="login_password_input" name="email" value="1234567890"/>
						</div>
			        </div>
			        <div id="login_button_div">
				        <a href="#" id="do_login_button" class="button" >Ingresar</a>
			        </div>
			        
			    </div>  
			    <div id="tab2" class="tab_content">  
			        <div class="field">
			        	<div class="label">Email</div>
			        	<div class="control">
			        			<input type="text" id="register_email_input" name="email" />
						</div>
			        </div>
					<div id="login_error_msg" class="field error_msg" style="display:none">
						*El usuario ya existe 
					</div>
			        <div class="field">
			        	<div class="label">Contraseña</div>
			        	<div class="control">
			        			<input type="password" id="register_password_input" name="email" />
						</div>
			        </div>
			        <div class="field">
			        	<div class="label">Tipo</div>
			        	<div class="control">
							<select id="register_type_select"> 
							   <option value="-1" selected="selected"> - tipo de usuario - </option> 
							   <option value="C">Candidato</option> 
							   <option value="E">Empresa</option> 
							</select>
 						</div>
			        </div>
			        
			        <div id="user_data" style="display:none;"> 
				      	<div id="cadidate_fields">
					        <div class="field">
					        	<div class="label">Nombre</div>
					        	<div class="control">
					        			<input type="text" id="register_firstname_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Apellido</div>
					        	<div class="control">
					        			<input type="text" id="register_lastname_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Documento:</div>
					        	<div class="control">
									<select id="register_id_type_select"> 
									   <?php foreach ($tiposDeDocumentos as $id => $tipo){ ?>
									   			<option value="<?php echo $id?>">
													<?php echo $id?>
												</option> 
									   <?php } ?>
									</select>
					        		<input type="text" id="register_id_number_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Telefono:</div>
					        	<div class="control">
					        		<input type="text" id="register_phone_number_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Pais:</div>
					        	<div class="control">
									<select id="register_country_select"> 
									   <?php  
									   		foreach ($paises as $id => $pais){
									   ?>
									   			<option value="<?php echo $id?>">
													<?php echo $pais?>
												</option> 
									   <?php  
									   		}
									   ?>
									</select>
								</div>
					        </div>
				      	</div>
				      	<div id="company_fields">
					        <div class="field">
					        	<div class="label">Razon social</div>
					        	<div class="control">
					        			<input type="text" id="register_companyname_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Industria:</div>
					        	<div class="control">
									<select id="register_industry_select"> 
									   <?php foreach ($industriasDisponibles as $id => $unaIndustria){?>
									   			<option value="<?php echo $id?>">
													<?php echo $unaIndustria?>
												</option> 
									   <?php } ?>
									</select>
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">CUIT</div>
					        	<div class="control">
					        			<input type="text" id="register_company_id_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Telefono</div>
					        	<div class="control">
					        			<input type="text" id="register_company_phone_input" />
								</div>
					        </div>
					        <div class="field">
					        	<div class="label">Pais:</div>
					        	<div class="control">
									<select id="register_company_country_select"> 
									   <?php foreach ($paises as $id => $pais){ ?>
									   			<option value="<?php echo $id?>">
													<?php echo $pais?>
												</option> 
									   <?php } ?>
									</select>
								</div>
					        </div>
				      	
				      	</div>
				        <div id="login_button_div">
					        <input type="submit" value="Registrarse" id="do_register_button" disabled="disabled"/>
				        </div>
				      	
			        </div>
			    </div>  
			</div>  
		</div>
	</div>
	<div id="login_footer">
		<?php include("footer.php"); ?>
	</div>
	

</body>
</html>