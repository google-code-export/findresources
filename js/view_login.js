/**
	TABS CODE:
**/
$(document).ready(function() {  
	  
	//Cuando el sitio carga...  
	  
	$(".tab_content").hide(); //Esconde todo el contenido  
	  
	$("ul.tabs li:first").addClass("active").show(); //Activa la primera tab  
	  
	$(".tab_content:first").show(); //Muestra el contenido de la primera tab  
	  
	//On Click Event  
	  
	$("ul.tabs li").click(function() {  
	  
	$("ul.tabs li").removeClass("active"); //Elimina las clases activas  
	  
	$(this).addClass("active"); //Agrega la clase activa a la tab seleccionada  
	  
	$(".tab_content").hide(); //Esconde todo el contenido de la tab  
	  
	var activeTab = $(this).find("a").attr("href"); //Encuentra el valor del atributo href para identificar la tab activa + el contenido  
	  
	$(activeTab).fadeIn(); //Agrega efecto de transición (fade) en el contenido activo  
	  
	return false;  
	  
	});  
	  
});  

$(function(){
	$('#chequeaNombreDeUsuario').click(function(){
		var usuario = "unmail6@unserver.com";
		$.post("login/getExisteUsuario", {
			'usuario': usuario
		},
		function(response){
			alert(response);
		},
		"json");
				
	});
	
	
	$('#do_register_button').click(function(){
		
		var userType = $('#register_type_select').val();
		var isCandidate = userType == "C";
		
		var idNumber = (isCandidate)? $('#register_id_number_input').val() : $('#register_company_id_input').val();
		idNumber = idNumber.trim();
		idNumber = idNumber.replace(/-/gi,"");
		idNumber = idNumber.replace(/./gi,"");
		
		var usuario = {
			'email':$('#register_email_input').val(),
			'clave': $('#register_password_input').val(),
			'tipoUsuario': userType,
			'nombre':(isCandidate)? $('#register_firstname_input').val() : "",
			'apellido':(isCandidate)? $('#register_lastname_input').val() : "",
			'razonSocial':(!isCandidate)? $('#register_companyname_input').val() : "",
			'idIndustria':(!isCandidate)? $('#register_id_type_select').val() : "",
			'idTipoDocumento':(isCandidate)? $('#register_id_number_input').val() : "CUIT",
			'numeroDocumento':idNumber,
			'telefono':(isCandidate)? $('#register_phone_number_input').val() : $('#register_company_phone_input').val(),
			'idPais':(isCandidate)? $('#register_phone_number_input').val() : $('#register_company_phone_input').val()
		};
		
		$.post("login/crearNuevoUsuario", {
				'usuario': JSON.stringify(usuario)
			},
		function(response){
			debugger;
			//response == 0 is ok
			
		},
		"json");
		
	});
	
	$('#do_login_button').click(function(){
		/**TODO Esta llamada debe ser segura, hay que investigar eso!**/
		var usuario = {
			'email': $('#login_email_input').val(),
			'clave': $('#login_password_input').val()
		};
		
		$.post("login/doLogin", {
				'usuario': JSON.stringify(usuario)
			},
		function(response){
			if(response == true){
				window.location="home";
			}else{
				alert("usuario invalido");
			}
		},
		"json");
		
	});
	
	$('#register_type_select').change(function(){
		var value = $('#register_type_select').val();
		if(value == "-1"){
			$('#user_data').css('display','none');
		}else {
			$('#user_data').css('display','inline');
			if(value == "C"){
				$('#cadidate_fields').css('display','inline');
				$('#copany_fields').css('display','none');
			
			}else if(value == "E"){
				$('#cadidate_fields').css('display','none');
				$('#copany_fields').css('display','inline');
			}
		}
		
	});
	
	return false;
});

