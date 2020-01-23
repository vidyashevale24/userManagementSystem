<?php 
      //Include header file to load css and js
     include('header.php');
     include('nav.php');
      $userList = $_GET['userList'];
      //print($userList);
      require_once __DIR__."/../config.php";
      if(!isset($_SESSION)) {   session_start();  } 
      if(isset($_SESSION['name'])){

       $session_user_name = $_SESSION['name'];
     ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dasboard</title>

   </head>

    <body>
    
           <div class="container">
              <div class="row"  style="margin-top:20;">
                    <div style="text-align:right">
                       <a href='../controllers/user/add'><button type='button' class='addUserBtn btn btn-sm btn-info' >Add User</button></a>
                    </div>
              </div>
              &nbsp;&nbsp;
              <div id="flash_message">            
                </div>
                <div id="showTable">
                  <table class="table table-striped" id="userListTable">
                        <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Role</th>
                          <th>Action</th>
                      </tr>
                 </table>
               </div>
                
              </div>
       
  </body>
</html>
<?php }else{
  header("Location:login");
}