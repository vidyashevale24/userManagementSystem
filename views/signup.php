<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <?php include('header.php');?>
  </head>
  <body>
    <div class="container mt-2 mb-4">
    <div class="row justify-content-md-center">
        <div class="col-sm-4 border border-primary shadow rounded pt-2">
            <div class="text-center"><h3>Sign Up</h3></div>
            <div class="col-sm-12">
                <form method="post" id="singnupFrom" onSubmit="return validateForm();">
                    <div id="next-form">
                        <div class="form-group">
                            <label class="font-weight-bold">Name <small class="text-danger"></small></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your Name">
                            <span  class="form_errors" id="name_error"></span>                 
                        </div>
                        <div class="form-group">
                          <label class="font-weight-bold">Email</label>
                          <div class="input-group">
                              <input type="email" name="email" id="email" class="form-control" placeholder="Enter valid email" onClick="return emailCheck();">
                          </div>
                        </div>
                         <div class="form-group">
                            <label class="font-weight-bold">Address <small class="text-danger"></small></label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter your Address">
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                        </div>

                        <!-- <div class="form-group">
                            <label><input type="checkbox" name="condition" id="condition"> I agree with the <a href="javascript:;">Terms &amp; Conditions</a> for Registration.</label>
                        </div> -->
                        <div class="form-group">
                            <input type="button" name="submit" value="Sign Up" class="btn btn-block btn-danger">
                        </div>
                    </div> <!--/.next-form-->
                </form>
            </div>
        </div>
    </div>
</div>
</html>