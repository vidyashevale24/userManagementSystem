<!DOCTYPE html>
<html>
  <head>
    <title>Sign In</title>

    <?php 
        //Include header file to load css and js
        include('header.php');
        require_once __DIR__."/../config.php";
    ?>
  </head>
    <body>
    <div class="signin-form">
        <div class="container">
            <form class="form-signin" method="post" id="login-form">
                <h2 class="form-signin-heading">Sign In</h2>
                <hr />
                <div id="error"></div>

                <div class="form-group">
                    <label class="label_color">Email</label>
                    <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
                    <span id="check-e"></span>
                </div>

                <div class="form-group">
                    <label class="label_color">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                </div>
                <input type ="hidden" name="base_url" id="base_url" value="<?=base_url?>" >
                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-default"  name="login" value="Sign In" id="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In</button>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6">
                           Don't have an account? <a href="../controllers/signup" name="signup" >Sign Up</a>
                        </div>
                        <div class="col-xs-6" style="text-align:right">
                             <a class="text-align:right" href="../controllers/forgot" name="forgot" >Forgot password</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
    