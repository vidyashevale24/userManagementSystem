$('document').ready(function()
{ 
    $.ajax({
    	url: "../controllers/userList", 
  		success: function(result){
  			console.log(result);
    		var users = result.userList;
    		var checkIsEmpty = $.isEmptyObject(result.userList);
    		if(checkIsEmpty == false ){
    			
    			$("#showTable").show();
	    		var userListTable = $('#userListTable');
			    //userListTable.find("tbody tr").remove();
			    var counter=1;
			    users.forEach(function (user) {
			    	userListTable.append("<tr id='userRow"+ user.userID + "'><td>" + counter + "</td><td>" + user.name + "</td><td>" + user.email + "</td><td>" + user.address + "</td><td>"+user.role+"</td>"+
			        	"<td><a href='../controllers/edit?userID=" + user.userID + "'><button type='button' class='btn btn-sm '>Edit</button>"+
			        	"<a href='javascript:;'><button type='button' class='delUserBtn btn btn-sm btn-danger' userId='" + user.userID + "'>Delete</button></a></td></tr>");
			    	counter++;
				});
			}else{
				$("#flash_message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;<button class="close" data-dismiss="alert">&times;</button> '+result['message']+'</div>');
				$("#showTable").hide();
			}
  		} 
  	});

    /* validation  code for login*/
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
	   submitHandler: submitFormLogin	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitFormLogin()
	   {		
	   		var data = $("#login-form").serialize();

			$.ajax({
			type : 'POST',
			url  : '../controllers/login',
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
						$("#btn-login").html('<img src="../images/btn-ajax-loader.gif" /> &nbsp; Please wait ...');
						var users = response.userList;
			    		var userListTable = $('#userListTable');
					    userListTable.find("tbody tr").remove();
					    var counter=1;
					    users.forEach(function (user) {
					    	userListTable.append("<tr id='userRow"+ user.userID + "'><td>" + counter + "</td><td>" + user.name + "</td><td>" + user.email + "</td><td>" + user.address + "</td><td>"+user.role+"</td>"+
					        	"<td><a href='../controllers/edit?userID=" + user.userID + "'><button type='button' class='btn btn-sm '>Edit</button>"+
					        	"<a href='javascript:;'><button type='button' class='delUserBtn btn btn-sm btn-danger' userId='" + user.userID + "' data-toggle='modal' data-target='#deleteUserModal'>Delete</button></td></tr>");
					    	counter++;
					    	});
						setTimeout(' window.location.href = "../controllers/dashboard"; ',2000);
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

	/* validation  code for signup*/
	$("#signup-form").validate({
      rules:
	  {
	  		name: {
			required: true,
			},
			address: {
	            required: true,
	        },
			password: {
			required: true,
			},
			email: {
	            required: true,
	            email: true
            },
            role:{
            	required:true,
            }
	   },
       messages:
	   {
	   		email:{
                    required: "please enter your Email",
                    email:"enter valid Email "
                    },
            address: "please enter your Address",
            password:{
                      required: "please enter your Password"
                    },
            name: "please enter your Name",
            role: "please select user Role"
       },
	   submitHandler: submitFormSignup	
       });  
	   
	   /* signup submit */
	   function submitFormSignup()
	   {		
	   		var data = $("#signup-form").serialize();

			$.ajax({
			type : 'POST',
			url  : '../controllers/signup',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-signup").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {			
			  	console.log(response);
					if(response['status']=="Success"){
						$("#btn-signup").html('<img src="../images/btn-ajax-loader.gif" /> &nbsp; Please wait ...');
						setTimeout(' window.location.href = "../controllers/dashboard"; ',2000);
					}
					else if(response['status']=="Fail"){
						$("#error").fadeIn(1000, function(){						
							$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
							$("#btn-signup").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Up');
						});
					}
			  }
			});
				return false;
		}

		//Validation code for add user
		$("#addUser-form").validate({
	      rules:
		  {
		  		name: {
				required: true,
				},
				address: {
		            required: true,
		        },
				password: {
				required: true,
				},
				email: {
		            required: true,
		            email: true
	            },
	            role: {
				required: true,
				},
		   },
	       messages:
		   {
		   		email:{
	                    required: "please enter your Email",
	                    email:"enter valid Email "
	                    },
	            address: "please enter your Address",
	            password:{
	                      required: "please enter your Password"
	                    },
	            name: "please enter your Name",
	            role: "please select user Role",
	       },
		   submitHandler: submitFormAddUser
	       });  
		   
		   /* signup submit */
		   function submitFormAddUser()
		   {		
		   		var data = $("#addUser-form").serialize();

				$.ajax({
				type : 'POST',
				url  : '../../controllers/signup',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-addUser").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(response)
				   {			
				  	console.log(response);
						if(response['status']=="Success"){
							$("#btn-addUser").html('<img src="../../images/btn-ajax-loader.gif" /> &nbsp; Please wait ...');
							$("#flash_message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;<button class="close" data-dismiss="alert">&times;</button> '+response['message']+'</div>');
							setTimeout(' window.location.href = "../../controllers/dashboard"; ',2000);
						}
						else if(response['status']=="Fail"){
							$("#error").fadeIn(1000, function(){						
								$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
								$("#btn-addUser").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Add User');
							});
						}
				  }
				});
					return false;
			}
		
		//Validation code for edit user
		$("#editUser-form").validate({
	      rules:
		  {
		  		name: {
				required: true,
				},
				address: {
		            required: true,
		        },
				
				email: {
		            required: true,
		            email: true
	            },
	            role: {
				required: true,
				},
		   },
	       messages:
		   {
		   		email:{
	                    required: "please enter your Email",
	                    email:"enter valid Email "
	                    },
	            address: "please enter your Address",
	            name: "please enter your Name",
	            role: "please select user Role",
	       },
		   submitHandler: submitFormEditUser
	       });  
		   
		   /* edit submit */

		   function submitFormEditUser()
		   {		
		   		var data = $("#editUser-form").serialize();

				$.ajax({
				type : 'POST',
				url  : '../../controllers/update',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-editUser").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(response)
				   {			
				  	console.log(response);
						if(response['status']=="Success"){
							$("#btn-editUser").html('<img src="../../images/btn-ajax-loader.gif" /> &nbsp; Please wait ...');
							$("#flash_message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;<button class="close" data-dismiss="alert">&times;</button> '+response['message']+'</div>');
							setTimeout(' window.location.href = "../../controllers/dashboard"; ',2000);
						}
						else if(response['status']=="Fail"){
							$("#error").fadeIn(1000, function(){						
								$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
								$("#btn-editUser").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Edit User');
							});
						}
				  }
				});
					return false;
			}
	
	   /* Delete user*/
	   	$(document).on('click', '.delUserBtn', function(){
	   		var userID = $(this).attr('userId');
			var newID = userID.replace('userId', '');
			if (confirm("Are you sure you want to delete this record?")) {
		        $.ajax({
					type:'POST',
					dataType:'JSON',
					url: '../controllers/delete',
					data:
					{
						userID:newID,
					},
					success:function(response)
					{
						if(response['status'] == "Success"){
							$("#userRow"+newID).remove();
							$("#flash_message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;<button class="close" data-dismiss="alert">&times;</button> '+response['message']+'</div>');
			    			
			    		}else if(response['status']=="Fail"){
							$("#flash_message").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
			    		}
					},
				});  
		    }
		    return false;
		});

	   	/* Add new user*/
	 	$(document).on('click', '.addUserBtn', function(){
   		var userID = $(this).attr('userId');
		var newID = userID.replace('userId', '');
		if (confirm("Are you sure you want to delete this record?")) {
	        $.ajax({
				type:'POST',
				dataType:'JSON',
				url: '../controllers/delete',
				data:
				{
					userID:newID,
				},
				success:function(response)
				{
					if(response['status'] == "Success"){
						$("#userRow"+newID).remove();
						$("#flash_message").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp;<button class="close" data-dismiss="alert">&times;</button> '+response['message']+'</div>');
		    			
		    		}else if(response['status']=="Fail"){
						$("#flash_message").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
		    		}
				},
			});  
	    }
	    return false;
	});
	 //Validation for confirm password 
        $('#forgot-form').validate({
           rules:{
               email:{
                   required:true,
                   email:true
               }    
           },
           messages:{
               email:{
                   required:"<div class='text-danger'>Please enter registered mail id</div>",
                   email:"<div class='text-danger'>Please enter valid mail id</div>",
               }
           },
           submitHandler: submitForgotForm
	    }); 

		function submitForgotForm()
		{		
		   		var data = $("#forgot-form").serialize();

				$.ajax({
				type : 'POST',
				url  : 'controllers/forgot',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-editUser").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(response)
				   {			
				  	console.log(response);
						if(response['status']=="Success"){
							$("#btn-editUser").html('<img src="../../images/btn-ajax-loader.gif" /> &nbsp; Please wait ...');
						}
						else if(response['status']=="Fail"){
							$("#error").fadeIn(1000, function(){						
								$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
								$("#btn-editUser").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Edit User');
							});
						}
				  }
				});
					return false;
			}
	
       //Validation for  confirm password
       $('#confirm-form').validate({
           rules:{
               	password:{
                   required:true,
                },
                con_pass:{
                	required:true,
                	equalTo:'#password'
                }    
           },
           messages:{
               	password:{
                   required:"<div class='text-danger'>Please enter new password</div>",
                },
                con_pass:{
                	required:"<div class='text-danger'>Please enter password again</div>",
                	equalTo:"<div class='text-danger'>Password not matched</div>",
                } 
           },
           submitHandler: submitConfirmForm

       }); 
       function submitConfirmForm()
		{		
		   		var data = $("#confirm-form").serialize();

				$.ajax({
				type : 'POST',
				url  : '../../controllers/confirm',
				data : data,
				beforeSend: function()
				{	
					$("#error").fadeOut();
					$("#btn-editUser").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
				},
				success :  function(response)
				   {			
				  	console.log(response);
						if(response['status']=="Success"){
							$("#btn-editUser").html('<img src="../../images/btn-ajax-loader.gif" /> &nbsp; Please wait ...');
						}
						else if(response['status']=="Fail"){
							$("#error").fadeIn(1000, function(){						
								$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response['message']+'</div>');
								$("#btn-editUser").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Edit User');
							});
						}
				  }
				});
				return false;
			}
	   /* validation */
	   
});