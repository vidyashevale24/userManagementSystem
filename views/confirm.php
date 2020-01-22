<!DOCTYPE html>
<html>
  <head>
    <title>COnfirm Password</title>

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
                <h2 class="form-signin-heading">Confirm Password</h2>
                <hr />
                <div id="error"></div>

                <div class="form-group">
                    <label class="label_color">Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" id="password" />
                </div>

                <div class="form-group">
                    <label class="label_color">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Enter confirm password" name="con_pass" id="con_pass" />
                </div>

                <input type ="hidden" name="base_url" id="base_url" value="<?=base_url?>" >
                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-default"  name="confirm" value="Confirm password" id="btn-confirm">
                    <span class="glyphicon glyphicon-log-in"></span> &nbsp; Reset</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>
    