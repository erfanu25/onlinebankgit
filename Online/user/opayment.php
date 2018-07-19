
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
                                <div class="muted pull-left" >Online Payment</div>
                            </div>
                            <div class="block-content collapse in">
                               
							    <div class="row animated  " style="color:black;">
              <div class="col-md-12 "> <hr /> <hr />
                <center>
                  <div class="card " style="width: 50%;">
                    <div class="body ">
                      <form id="pay" method="POST">

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Account Number: <h4><?php echo $_SESSION['account_number'];?></h4></label>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Available Balance</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">

                              <h2> <?php  include 'balance.php'; echo number_format($balance); ?> Tk.</h2>

                            </div>
                          </div>
                        </div>

                        <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Amount</label>
                          </div>
                          <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                              <div class="form-line">
                               <input type="text" name="amount" class=" form-control"  placeholder="Amount to pay"> 

                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="row clearfix">
                          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2"></label>
                          </div><!--
                          <div class="demo-radio-button">
                            <input name="pay_time" type="radio" id="radio_1" value="pay" />
                            <label for="radio_1">Pay Now!</label>
                            <input name="pay_time" type="radio" id="radio_2" value="auto" />
                            <label for="radio_2">Auto Pay!</label>



                          </div> -->

                        </div>

                        <div class="input-group">

                        </div>
                        <input class="btn btn-info submit" type="submit" name="pay" value="pay" background-color="red" style="align-right: true;">
             
                    

                      </form>
                     
                    </div>
                  </div>
                </center>
              </div>
            </div>
								
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
if(isset($_POST['pay'])){
  $ac = $_SESSION['account_number'];

  
          $amount = $_POST['amount'];
          $type = 'Online Payment';

$first=rand(1010, 2020);
$middle=rand(1100, 9010);


$t_number= $first."".$middle;

$result=$obj->check_balance($ac);
$row = $result->fetch_assoc();

$balance = $row['balance']-$amount;



if($balance>0)
{
    

$obj->opay($ac,$amount,$type,$t_number);

$result1=$obj->dbalanceupdate($balance,$ac);

 echo "<center>";
   
        echo "<h2 style='color:#AE0B0B;'>Your Transaction ID :".$t_number."</h2>";
       
                                        echo "</center>";
                                    
}
else
{
     echo "<center>";
   
        echo "<h2 style='color:#AE0B0B;'>Insufficient Balance</h2>";
       
                                        echo "</center>";
}

        
}
  

?>