$(document).ready(function(e) {
    /*Sign Up form validation */
        $('form[id="singnupForm"]').validate({
            debug: true,
            errorElement: 'span',
            highlight: function(element, errorClass, validClass) {
              $(element).parents("div.control-group").addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
              $(element).parents(".is-invalid").removeClass('is-invalid');
            },
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
            },
            email:{
                required:true,              
                email: true
            }
        },
        messages:{
            name:{
                required: "Enter your full name.",
            },
            address:{
                required: "Please enter address.",
                character_num_underscore_dash: "Username can contain characters, numbers, underscore or hyphen.",               
            },
            password: {
                required: "Enter your password.",
                minlength:"Password should be at least 6 characters long.",
                maxlength:"Password is too long.",
            },
            email:{
                required: "Enter email address.",
            }
          },
          submitHandler: function(form) {
            form.submit();
          }
        });
    
        $('form[id="singnInForm"]').validate({
            debug: true,
            errorElement: 'span',
            highlight: function(element, errorClass, validClass) {
              $(element).parents("div.control-group").addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
              $(element).parents(".is-invalid").removeClass('is-invalid');
            },
            rules:{
                password:{
                    required:true,              
                    minlength:6,
                    maxlength:16,
                },
                email:{
                    required:true,              
                    email: true
                }
            },
            messages:{
            password: {
                required: "Enter your password.",
                minlength:"Password should be at least 6 characters long.",
                maxlength:"Password is too long.",
            },
            email:{
                required: "Email address is required.",
                email:"Enter valid email address"
            }
          },
          submitHandler: function(form) {
            form.submit();
          }
        });

    });
