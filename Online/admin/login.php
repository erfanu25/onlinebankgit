<link rel="icon" href="../assets/ico.png" type="png/x-icon">
<?php
    require_once '../config/configure.php';
    require_once('../tools/dbconfig.php');       
  require_once('../tools/functions.php');
  require_once('../tools/tools.php');

?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Online Banking</title>
        <link href="../assets/css/customizedstyle.css" rel="stylesheet" media="screen">
        <link href="../assets/css/myresponsivestyle.css" rel="stylesheet" media="screen">
        <link href="../assets/css/styles.css" rel="stylesheet" media="screen">
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">

                    <a class="brand" href="#">Online Banking </a>
                    <div class="nav-collapse collapse"></div>
            </div>
        </div>
		</div>
		
		
        
        <div class="container-fluid">
            <div class="row-fluid">
                
                <div class="span3" id="sidebar"></div>
                
                <div class="span6" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left" >Admin Login Area</div>
                            </div>
                            <div class="block-content collapse in">

                                <?php 
                                $obj = new cls_func();
                                if(isset($_POST['login'])){ 
                                    
                                   $username = $_POST['username'];
                                   $password = md5($_POST['pass']);

                                    $result=$obj->check_admin($username,$password);
                                    $count = $result->num_rows;
                                    $row = $result->fetch_array();
                             

                                    if($count>0){
                                   $adminid = $row['user_id'];
                                  $adminFullName = $row['username'];

                                  $_SESSION['adminAccess']="login_success"; 
                                  $_SESSION['adminFullName']=$adminFullName;
                                  $_SESSION['adminid']=$adminid;
                                  echo "<script> document.location.href='adashboard.php';</script>";

                                    }else{
                                        echo "<center>";
                                        echo "<h2 style='color:#AE0B0B;'>Invalid Username and Password</h2>";
                                        echo "<br />";
                                        echo "<br />";
                                        echo "<a href='login.php' class='btn btn-primary '>Try Again</a>";
                                        echo "</center>";

                                    }


                                ?>

                               
                               <?php }else{ ?>
                                    <form action="" method="POST">
                                            <table class="table">
                                                <tr>
                                                    <td width="20%">Username:</td>
                                                    <td><input  required autofocus name="username" placeholder="Insert Username Here" class="span10" type="text"  ></td>
                                                </tr>

                                                <tr>
                                                    <td>Password:</td>
                                                    <td><input type="password" required name="pass" placeholder="Insert Password Here"  class="span10" ></td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td><input type="submit" name="login" value="Login" class="btn btn-primary" ></td>
                                                    
                                                </tr>
                                            </table>
                                       </form>
                                       <a href='../index.php'>Home</a>
                               <?php  } ?>
								
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
				</div>
			</div>
            <hr>
            <footer>

                <?php
                     developer();
                ?>

            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="assets/js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>