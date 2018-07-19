<link rel="icon" href="../assets/ico.png" type="png/x-icon">
<?php
require_once ('../config/configure.php');
require_once('../tools/dbconfig.php');       
  require_once('../tools/functions.php');            
  $obj = new cls_func();

  
  if (isset($_POST['submit']))
  {
    
    $username = $_POST['username'];
    $password = md5($_POST['pass']);


      $result=$obj->check_user($username,$password);
      $count = $result->num_rows;
      $row = $result->fetch_array();
    
    
 if ($count == 1){
     
      $first=rand(1010, 2020);
      $middle=rand(1100, 9010);


$t_number= $first."".$middle;

      $userid = $row['account_number'];
      $userFullName = $row['username'];

      $_SESSION['userAccess']="login_success"; 
      $_SESSION['userFullName']=$userFullName;
      $_SESSION['account_number']=$userid;
      $_SESSION['t_number']=$t_number;
      $_SESSION['email']=$username;
     

       $chk=$obj->token($username,$t_number); 
       if($chk)
       {
            echo "<script> document.location.href='send_email.php';</script>";
           
       }
       else
       {
            echo "try Again";
       }    
      
      
      }
      else
      {
       echo '<font color="red"><center>Invalid Username or Password</center></font>';
        ;
        
      }
    }

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>login form</title>
 
  <link href="../assets/css/style.css" rel="stylesheet" media="screen">


 

</head>

<body>

   <div class="wrapper">
  <form action = "" class="login" method="POST">

    <p class="title">User Log in</p>
    <input type="text" required name="username" placeholder="Email" autofocus/>
    
    <i class="fa fa-user"></i>
    <input type="password" required name="pass" placeholder="Password" />
  <!--   
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a> -->
    <button type="submit" name="submit">
      <i class="spinner"></i>
      <span class="state" >Log in</span>
    </button>
  </form>
  <footer><a target="blank" href="../index.php">Home</a></footer>
  </p>
</div>


  




</body>

</html>
