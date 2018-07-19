<?php
require_once 'header_link.php';
require_once ('../config/configure.php');
require_once('../tools/dbconfig.php');       
  require_once('../tools/functions.php');            
  $obj = new cls_func();



  if (isset($_POST['submit']))
  {
    
    $token_code = $_POST['code'];
    

      $result=$obj->check_token($email,$token_code);    //email comming from session 
      $count = $result->num_rows;
      $row = $result->fetch_assoc();
    
    
 if ($count == 1){
     
      $token_time = $row['created_at'];
     date_default_timezone_set("Asia/Dhaka");
      $date = date('Y-m-d H:i:s');
      $time = strtotime($token_time);
      $endTime = date("Y-m-d H:i:s", strtotime('+30 minutes', $time));
     
     if($date<$endTime)
     {
     
      echo "<script> document.location.href='dashboard.php';</script>";
     }
     else
     {
      echo '<font color="red"><center>Verification Code time expired</center></font>';
     }
     
      
      
      }
      else
      {
       echo '<font color="red"><center>Wrong Verification Code</center></font>';
        ;
        
      }
    }

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>verification form</title>
 
  <link href="../assets/css/style.css" rel="stylesheet" media="screen">


 

</head>

<body>
<?php  

echo '<br><font color="red"><center>please verify within 30 minutes</center></font>';
?>
   <div class="wrapper">
  <form class="login" method="POST">

    <p class="title">Verification</p>
    <p >Enter verification code</p>
    <input type="text" required name="code" placeholder="Verification Code" autofocus/>
    <i class="fa fa-user"></i>
    
  <!--   
    <i class="fa fa-key"></i>
    <a href="#">Forgot your password?</a> -->
    <button type="submit" name="submit">
      <i class="spinner"></i>
      <span class="state" >Confirm</span>
    </button>
  </form>
  <footer><a target="blank" href="../index.php">Home</a></footer>
  </p>
</div>


  




</body>

</html>
