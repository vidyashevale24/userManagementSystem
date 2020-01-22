$('document').ready(function()
{ 
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			password: {
			required: true,
			},
			email: {
	            required: true,
	            email: true
            },
	   },
       messages:
	   {
            password:{
                      required: "please enter your password"
                    },
            email: "please enter your email address",
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
	   		var data = $("#login-form").serialize();

			$.ajax({
			type : 'POST',
			url  : '../controllers/login.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {			
			  	console.log(response);
					if(response['status']=="Success"){
						$("#btn-login").html('<img src="../images/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
						setTimeout(' window.location.href = "dashboard.php"; ',2000);
					}
					else if(response['status']=="Fail"){
						$("#error").fadeIn(1000, function(){						
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
							$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
						});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});