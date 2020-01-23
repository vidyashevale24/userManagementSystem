<?php 
if(!empty($_GET['userData'])){
    $title    =     "Edit User";
    $formID   =     "editUser-form";
    $formName =     "editUser";
    $btnID    =     "btn-editUser";
    $name     =     $_GET['userData']['name'];
    $email    =     $_GET['userData']['email'];
    $address  =     $_GET['userData']['address'];
    $role     =     $_GET['userData']['role'];
    $userID   =     $_GET['userData']['userID'];

  }else{
    $title    =     'Add User';
    $formID   =     "addUser-form";
    $formName =     "addUser";
    $btnID    =     "btn-addUser";
    $name     =     "";
    $email    =     "";
    $address  =     "";
    $role     =     "";
  }

?>
<!DOCTYPE html>
<html>
    <head>
    <title>$title</title>

    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <link href="../../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

    <script type="text/javascript" src="../../js/jquery-1.11.3-jquery.min.js"></script>

    <script type="text/javascript" src="../../js/validation.min.js"></script>

    <link href="../../css/style.css" rel="stylesheet" type="text/css" media="screen">

    <script type="text/javascript" src="../../js/script.js"></script>

    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php   if(!isset($_SESSION)) {   session_start();  } 
              if(isset($_SESSION['name'])){
                  $session_user_name = $_SESSION['name'];
                ?>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="../../controllers/dashboard">User Management System</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                <li ><a href="../../controllers/dashboard">Home</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                       <span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $session_user_name; ?>&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li> -->
                    <li><a href="../controllers/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
<?php }?>
        <div class="signin-form">
            <div class="container">
                <form class="form-signin" method="post" id="<?=$formID?>">
                    <h2 class="form-signin-heading"><?=$title?></h2>
                    <hr />
                    <div id="error"></div>

                    <div class="form-group">
                         <label class="label_color">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="<?=$name?>"/>
                    </div>

                    <div class="form-group">
                        <label class="label_color">Email</label>
                        <input type="email" class="form-control" placeholder="Email address" name="email" id="email" value="<?=$email?>" />
                        <span id="check-e"></span>
                    </div>

                    <?php if(empty($_GET['userData'])){ ?>
                    <div class="form-group">
                        <label class="label_color">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"  />
                    </div>
                    <?php }else{ ?>
                           <input type="hidden" class="form-control" name="userID" id="userID" value="<?=$userID?>" />
                    <?php } ?>
                    <div class="form-group">
                        <label class="label_color">Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" id="address"  value="<?=$address?>" />
                    </div>

                    <div class="form-group">
                      <label  class="label_color" for="sel1">Select Role:</label>
                      <select class="form-control" id="sel1" name="role" id="role">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                    
                    <hr />

                    <div class="form-group">
                        <button type="submit" class="btn btn-default" name="<?=$formName?>" value="<?=$title?>"  id="<?=$btnID?>">
                        <span class="glyphicon glyphicon-log-in"></span> &nbsp;<?=$title?></button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
    