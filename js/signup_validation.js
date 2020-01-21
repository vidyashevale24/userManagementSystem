$(document).ready(function(){
$("#singnupFrom").validate({
		rules:{
			name:{
				required: true,
			},
			address:{
				required: true,
				character_num_underscore_dash: true,
			},
			password:{
				required:true,				
				minlength:6,
				maxlength:16,
				strong_pass:true,
			},
		},
		messages:{
			name:{
				required: "Enter your full name.",
			},
			address:{
				required: "Enter address.",
				character_num_underscore_dash: "Username can contain characters, numbers, underscore or hyphen.",				
			},
			password: 
			{
				required: "Enter your password.",
				minlength:"Password should be at least 6 characters long.",
				maxlength:"Password is too long.",
				strong_pass: "Password must be a combination of character, number and symbol.",				
			},
			conf_password: 
			{
				required: "Enter your password",
				minlength:"Password should be at least 8 characters long.",
				maxlength:"Password is too long.",
				strong_pass: "Password must be a combination of character, number and symbol.",
				equalTo: "Password does not match.",
			},
		},
	});
					
	$('#singnupFrom').submit(function(){ 	
	});
});