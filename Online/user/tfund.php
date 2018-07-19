
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
                                <div class="muted pull-left" >Transfer Fund</div>
                            </div>
                            <div class="block-content collapse in">
                               
								<center>
  <div class="card " style="width: 80%;">
    <div class="body ">
      <form id="Transfer" method="POST">

        <div class="row clearfix">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Reciever's Bank Name</label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="recievers_bank_name" class="form-control"  placeholder="Enter Reciever's Bank Name">
              </div>
            </div>
          </div>
        </div>

        <div class="row clearfix">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Reciever's Name</label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="recievers_name" class="form-control"  placeholder="Enter Reciever's Name">
              </div>
            </div>
          </div>
        </div>

        <div class="row clearfix">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Reciever's A/C No.</label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="recievers_ac_no" class="form-control"  placeholder="Enter Reciever's A/C No.">
              </div>
            </div>
          </div>
        </div>


        <div class="row clearfix">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Transfer Amount</label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="amount" class="form-control"  placeholder="Enter Transfer Amount">
              </div>
            </div>
          </div>
        </div>

        <div class="row clearfix">
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Transfer Note</label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="transfer_note" class="form-control"  placeholder="Enter Transfer Note">
              </div>
            </div>
          </div>
        </div>

        <div class="input-group">

        </div>
        <input class="btn btn-info submit" type="submit" name="Transfer" value="Transfer" background-color="red" style="align-right: true;">

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



if(isset($_POST['Transfer'])){
$recievers_bank_name = $_POST['recievers_bank_name'];
$recievers_name = $_POST['recievers_name'];
$recievers_ac_no = $_POST['recievers_ac_no'];
$sender_name = $_SESSION['userFullName'];
$sender_ac_no = $_SESSION['account_number'];
$amount = $_POST['amount'];
$transfer_note = $_POST['transfer_note'];



$in= "Transfer In From ".$sender_ac_no;
$out= "Transfer to ".$recievers_bank_name." ".$recievers_ac_no;



//after transfer
$result=$obj->check_balance($sender_ac_no);
$row = $result->fetch_assoc();

$balance = $row['balance']-$amount;
$done=0;
if($balance>0){
  $done=$obj->tfund($recievers_bank_name,$recievers_name,$recievers_ac_no,$sender_name,$sender_ac_no,$amount,$transfer_note);
  $obj->tin($sender_ac_no,$amount,$in);
  $obj->tout($recievers_ac_no,$amount,$out);
  $result1=$obj->dbalanceupdate($balance,$sender_ac_no);

}
else
{
  echo "<center>";
   
        echo "<h2 style='color:#AE0B0B;'>Insufficient Balance</h2>".'</br>';
       
  echo "</center>";
}

if ($done) {
  
  echo "<center>";
   
        echo "<h2 style='color:#AE0B0B;'>Operation Successfull</h2>".'</br>';
       
  echo "</center>";
          
}

}


  ?>
