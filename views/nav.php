<?php
require_once __DIR__."/../config.php";
      if(!isset($_SESSION)) {   session_start();  } 
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
      <li class="active"><a href="../../controllers/dashboard">Home</a></li>
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
