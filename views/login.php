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
                    <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
                    <span id="check-e"></span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                </div>
                <input type ="hidden" name="base_url" id="base_url" value="<?=base_url?>" >
                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-default" name="login" id="btn-login">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
    