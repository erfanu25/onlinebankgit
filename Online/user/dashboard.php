
<?php require_once 'header_link.php';
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
                                <div class="muted pull-left" >Dashboard</div>
                            </div>
                            <div class="block-content collapse in">
                               
								<br >
								<h1>Welcome To User Panel.</h1>
								<br ><br >
								
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