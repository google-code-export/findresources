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
	$('#tab1 input').keypress(function(event){
	  if ( event.which == 13 ) {
	     doLogin();
	   }
	}); 
	
	$('#do_register_button').click(function(){
		
		var userType = $('#register_type_select').val();
		var isCandidate = userType == "C";
		
		var idNumber = (isCandidate)? $('#register_id_number_input').val() : $('#register_company_id_input').val();
		idNumber = idNumber.replace(/ /gi,"");
		idNumber = idNumber.replace(/-/gi,"");
		//idNumber = idNumber.replace(/./gi,"");
		
		var usuario = {
			'email':$('#register_email_input').val(),
			'clave': $('#register_password_input').val(),
			'tipoUsuario': userType,
			'nombre':(isCandidate)? $('#register_firstname_input').val() : "",
			'apellido':(isCandidate)? $('#register_lastname_input').val() : "",
			'razonSocial':(!isCandidate)? $('#register_companyname_input').val() : "",
			'idIndustria':(!isCandidate)? $('#register_industry_select').val() : "",
			'idTipoDocumento':(isCandidate)? $('#register_id_type_select').val() : "CUIT",
			'numeroDocumento':idNumber,
			'telefono':(isCandidate)? $('#register_phone_number_input').val() : $('#register_company_phone_input').val(),
			'idPais':(isCandidate)? $('#register_country_select').val() : $('#register_company_country_select').val()
		};
		
		showPopUp("#waitingActionPopUp");
		$.ajax({
		      url: "login/crearNuevoUsuario",
		      global: false,
		      type: "POST",
		      data: {
				'usuario': JSON.stringify(usuario)
			  },
		      dataType: "json",
		      async:true,
		      success: function(response){
		      		hidePopUp();
		      		alert("Un mail fue enviado a su casilla para autenticar su usuario.");
		      		window.location.reload();
			  },
			  error: function(response){
		      		hidePopUp();
				  	processError(response);
			  }
		   }
		);
		
		
	});
	
	$('#do_login_button').click(function(){
		doLogin();
	});
	
	$('#register_type_select').change(function(){
		var value = $('#register_type_select').val();
		if(value == "-1"){
			$('#user_data').css('display','none');
		}else {
			$('#user_data').css('display','inline');
			if(value == "C"){
				$('#cadidate_fields').css('display','inline');
				$('#company_fields').css('display','none');
			
			}else if(value == "E"){
				$('#cadidate_fields').css('display','none');
				$('#company_fields').css('display','inline');
			}
		}
		
	});
	
	$('#register_email_input').blur(function(){
		/*
		var usuario = $('#login_email_input').val();
		$.post("", {
			'usuario': usuario
		},
		"json");*/
		$('#do_register_button').attr("disabled", true);
		$('#login_error_msg').css("display", "none");
		
		var usuario = $('#register_email_input').val();
		
		$.ajax({
		      url: "login/getExisteUsuario",
		      global: false,
		      type: "POST",
		      data: {
					'usuario': usuario
			  },
		      dataType: "json",
		      async:true,
		      success: function(existe){
					$('#do_register_button').attr("disabled", existe == true);
					$('#login_error_msg').css("display", (existe == true)?"inline":"none");
			  },
			  error: function(response){
				  processError(response);
			  }
		   }
		);
				
		
	});
	return false;
});

function doLogin(){
	/**TODO Esta llamada debe ser segura, hay que investigar eso!**/
	var usuario = {
		'email': $('#login_email_input').val(),
		'clave': $('#login_password_input').val()
	};
	
	showPopUp("#waitingActionPopUp");
	$.ajax({
	      url: "login/doLogin",
	      global: false,
	      type: "POST",
	      data: {
			'usuario': JSON.stringify(usuario)
		  },
	      dataType: "json",
	      async:true,
	      success: function(response){
				if(response == true){
					window.location="home";
				}else{
		      		hidePopUp();
					alert("usuario invalido");
				}
		  },
		  error: function(response){
      		  hidePopUp();
			  processError(response);
		  }
	   }
	);
}