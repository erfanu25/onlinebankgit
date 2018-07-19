
<?php require_once 'header_link.php';
$obj = new cls_func();
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

                    <a class="brand" href="#">Online Banking</a>
                    <div class=" collapse">
                        
                        <ul class="nav pull-right">
                            <li class="dropdown">
                               <p style="margin-top:10px;">Time:  <b> <script src="time.js" type="text/javascript"></script></b></p> 
                             </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $user;?> </a>
                            </li>
                        </ul>
                        
                   </div>
            </div>
        </div>
		</div>
        
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav  collapse">
                       
                        <li><a></a></li>
					    <li class="active"><a href="dashboard.php"> Dashboard</a></li>
                        <li><a href="cbalance.php">Current Balance</a></li>
                        <li><a href="dmoney.php">Deposit Money</a></li>
                        <li><a href="tfund.php">Transfer Fund</a></li>
                        <li><a href="opayment.php">Online Payment</a></li>
                        <li><a href="../logout.php"> Log Out</a></li>
						
                        <li><a></a></li>


					</ul>
                </div>
                
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left" >Deposit Money</div>
                            </div>
                            <div class="block-content collapse in">
                               
								            <center>
              <div class="card " style="width: 30%;">
                <div class="body ">
                  <form id="deposite" method="POST">

                    
                    <div class="input-group">
                      <span class="input-group-addon">
                        <!--<i class="material-icons">lock</i>-->
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control" name="amount" placeholder="Deposite Amount" required>
                      </div>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <!--<i class="material-icons">person</i>-->
                      </span>
                      <div class="form-line">
                        <input type="text" class="form-control" name="T_id" placeholder="Transection ID" required autofocus>
                      </div>
                    </div>
                    <div class="input-group">
                      


                    </div>
                    <input class="btn btn-info submit" type="submit" name="deposite" value="Deposite" background-color="red" style="align-right: true;">

                  </form>
                </div>
              </div>
            </center>
								
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
        <script src="../assets/js/jquery-1.9.1.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
    </body>
</html>
<?php

if(isset($_POST['deposite'])){
$ac_no = $_SESSION['account_number'];
$amount = $_POST['amount'];
$T_id = $_POST['T_id'];
$type = 'Deposite';

$done=$obj->deposit($ac_no,$T_id,$amount,$type,$type);

//balance







if ($done) {

    $result=$obj->check_balance($ac_no);
$row = $result->fetch_assoc();

$balance = $row['balance']+$amount;


$result1=$obj->dbalanceupdate($balance,$ac_no);


   echo "<center>";
   
        echo "<h2 style='color:#AE0B0B;'>Operation Successfull</h2>".'</br>';
       
                                        echo "</center>";
          exit();
}else {
  echo "<center>";
        echo "<h2 style='color:#AE0B0B;'>Check Transection ID</h2>".'</br>';
       
                                        echo "</center>";
          exit();

}


//mysqli_query($con,"INSERT INTO `transaction`(`account_number`, `transaction_id`, `amount`, `type`,`description`) VALUES ('$ac_no','$T_id','$amount','$type','$type')");
//echo "<script> document.location.href='manage_dealers.php';</script>";

}




  ?>