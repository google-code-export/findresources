<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src="<?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/view_login.js')?>"></script>

<title>Find Resources</title>

<link rel=StyleSheet href="css/tabs.css"/>
<link rel=StyleSheet href="css/view_login.css"/>




</head>
<body>
<div id="home">
	<div id="home_header">
		<div id="home_fr_logo"></div>
		<div id="home_fr_company">
	    	<div id="home_fr_company_name">find resources</div>
	        <div id="home_fr_company_slogan">Donde encontrás el trabajo que te gusta </div>
		</div>
		<div id="home_fr_lenguage">
			English / Español
		</div>
	</div>
	<div id="home_body">
		<div id="home_wellcome">
			ACA VA EL WELLCOME
		</div>
		<div id="home_tabs">
			<ul class="tabs">  
			    <li><a href="#tab1">Ingresar</a></li>  
			    <li><a href="#tab2">Registrate</a></li>  
			</ul>  
			  
			<div class="tab_container">  
			    <div id="tab1" class="tab_content">  
			        <div class="field">
			        	<div class="label">Email</div>
			        	<div class="control">
			        			<input type="text" id="login_email_input" name="email" />
						</div>
			        </div>
			        <div class="field">
			        	<div class="label">Contraseña</div>
			        	<div class="control">
			        			<input type="password" id="login_password_input" name="email" />
						</div>
			        </div>
			        <div id="login_button_div">
				        <input type="submit" value="Ingresar" id="do_login_button"  />
			        </div>
			        
			    </div>  
			    <div id="tab2" class="tab_content">  
			        <div class="field">
			        	<div class="label">Email</div>
			        	<div class="control">
			        			<input type="text" id="register_email_input" name="email" />
						</div>
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
									   <option value="DNI">DNI</option> 
									   <option value="LC">LC</option> 
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
									   <option value="ARG">ARG</option> 
									   <option value="BRA">BRA</option> 
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
									   <option value="1">Tecnlogia</option> 
									   <option value="2">Petrolera</option> 
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
				      	
				      	</div>
				        <div id="login_button_div">
					        <input type="submit" value="Registrarse" id="do_register_button"  />
				        </div>
				      	
			        </div>
			    </div>  
			</div>  
		</div>
	</div>
	<div id="home_footer">
		<?php include("footer.php"); ?>
	</div>
	
</div>


<!-- h1>Bienvenido a FindResources</h1>
<div class="company_logo">
	<img src="images/argentina_soft_logo.png"/>
</div>

<p>Ingrese nombre de usuario y contraseña.</p>

	<H1>TIPOS DE INDUSTRIAS DISPONIBELES</H1>
<--?php 
	var_dump($industriasDisponibles);
?>

	<H1>TIPOS DE DOCUMENTOS DISPONIBELES</H1>
<--?php 
	var_dump($tiposDeDocumentos);
?>

<p/>
previmente a crear al chabon debimos haber comprobado que el email no existia
	<input type="submit" value="Chequear si usuario existe" id="chequeaNombreDeUsuario"  />
<p/>
EMAIL NUEVO USUARIO: 
<input type="text" id="email" name="email" value="unmail6@unserver.com"/>
	<input type="submit" value="CREAR USUARIO NUEVO" id="crearNuevoUsuario"  />
<p/>

<p>
	<input type="submit" value="HACE EL LOGIN CHABON" id="doLogin"  />
</p-->



</body>
</html>