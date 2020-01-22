<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>

    <?php 
        //Include header file to load css and js
        include('header.php');
        require_once __DIR__."/../config.php";
    ?>
  </head>
    <body>
    <div class="signin-form">
        <div class="container">
            <form class="form-signin" method="post" id="forgot-form">
                <h2 class="form-signin-heading">Forgot Password</h2>
                <hr />
                <div id="error"></div>

                <div class="form-group">
                    <label class="label_color">Email</label>
                    <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
                    <span id="check-e"></span>
                </div>

                <input type ="hidden" name="base_url" id="base_url" value="<?=base_url?>" >
                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-default"  name="forgot" value="Forgot password" id="btn-forgot">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Send Email</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
    