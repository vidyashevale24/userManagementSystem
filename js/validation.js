    function emailCheck(){
        if($("#email").val()==""){
            $("#email").addClass('is-invalid');
            return false;
        }else{
            var regMail     =   /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
            if(regMail.test($("#email").val()) == false){
                $("#email").addClass('is-invalid');
                return false;
            }else{
                $("#email").removeClass('is-invalid');
                //$('#next-form').collapse('show');
            }
 
        }
    }
    function validateForm(){
        var valid = true;
          var regMail     =   /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
            if(regMail.test($("#email").val()) == false){
                $("#email").addClass('is-invalid');
                valid = false;
            }else{
                $("#email").removeClass('is-invalid');
                valid = true;
                //$('#next-form').collapse('show');
            }
           
            if($("#name").val()==""){
                $("#name").addClass('is-invalid');
                valid = false;
            }else{
                $("#name").removeClass('is-invalid');
                valid = true;
            }

            if($("#address").val()==""){
                $("#address").addClass('is-invalid');
                valid = false;
            }else{
                $("#address").removeClass('is-invalid');
                valid = true;
            }

            if($("#password").val()==""){
                $("#password").addClass('is-invalid');
                valid = false;
           }else{
                $("#password").removeClass('is-invalid');
                valid = true;
            }
            return valid;
   }
    $(document).ready(function(e) {
        $('#email').blur(function(){       
            var regMail     =   /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
            if(regMail.test($("#email").val()) == false){
                $("#email").addClass('is-invalid');
                return false;
            }else{
                $("#email").removeClass('is-invalid');
                //$('#next-form').collapse('show');
            }
            
        });
     
        $("#singnupFrom").on("click",function(){
            
            var valid; 
            valid = validateForm();
            if($valid == true){
                alert ("here");
            }else{
                alert("no");
            }
            console.log(valid);
        });
                
    });
