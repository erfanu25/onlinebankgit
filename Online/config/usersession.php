<link rel="icon" href="../assets/ico.png" type="png/x-icon">
<?php
$user= "Logged User : <b style='color:rgba(63, 63, 63, 1);'>".$_SESSION['userFullName']."</b>";
$tnum=$_SESSION['t_number'];
      $email=$_SESSION['email'];
	if($_SESSION['userAccess']==NULL){
		    echo "<script> document.location.href='../index.php';</script>";
	}
?>