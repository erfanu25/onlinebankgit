<link rel="icon" href="../assets/ico.png" type="png/x-icon">
<?php

$user= "Logged User : <b style='color:black;'>".$_SESSION['adminFullName']."</b>";
if($_SESSION['adminAccess']==NULL){
		    echo "<script> document.location.href='../index.php';</script>";
	}
	
?>