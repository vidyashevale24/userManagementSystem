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
            <div class="text-center"><h3>Sign In</h3></div>
            <div class="col-sm-12">
                <form method="post" id="singnInForm" >
                        <div class="form-group">
                         <label class="font-weight-bold">Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Enter valid email" >
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                        </div>
                        <div class="form-group">
                              <input type="submit" name="submit" value="Sign In" class="btn btn-block btn-danger">
                        </div>
                    </div> <!--/.next-form-->
                </form>
          </div>
    </div>
</div>
</html>