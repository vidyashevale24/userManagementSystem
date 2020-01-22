<!DOCTYPE html>
<html>
    <head>
    <title>Sign Up</title>
    <?php 
        //Include header file to load css and js
        include('header.php');
        require_once __DIR__."/../config.php";
    ?>
    </head>
    <body>
        <div class="signin-form">
            <div class="container">
                <form class="form-signin" method="post" id="signup-form">
                    <h2 class="form-signin-heading">Sign Up</h2>
                    <hr />
                    <div id="error"></div>

                    <div class="form-group">
                         <label class="label_color">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" />
                    </div>

                    <div class="form-group">
                        <label class="label_color">Email</label>
                        <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
                        <span id="check-e"></span>
                    </div>

                    <div class="form-group">
                        <label class="label_color">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                    </div>

                    <div class="form-group">
                        <label class="label_color">Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" id="address" />
                    </div>
                    <input type ="hidden" name="base_url" id="base_url" value="<?=base_url?>" >
                    <hr />

                    <div class="form-group">
                        <button type="submit" class="btn btn-default" name="signup" value="Sign Up" id="btn-signup">
                        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign Up</button>
                    </div>

                    <div class="form-group">
                       Already have an account? <a href="../controllers/login" name="signin" >Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
    