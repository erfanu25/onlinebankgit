<?php 
require_once 'header_link.php';                           
$obj = new cls_func();
?>
<!DOCTYPE html>
<html class="no-js">
  <head>
    <title>Online Bank</title>
    <link href="../assets/css/customizedstyle.css" rel="stylesheet" media="screen">
    <link href="../assets/css/myresponsivestyle.css" rel="stylesheet" media="screen">
    <link href="../assets/css/styles.css" rel="stylesheet" media="screen">
    <script src="../assets/js/jquery.min.js"></script>
    <link href="../assets/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="../assets/facebox/facebox.js" type="text/javascript"></script>
    
  </head>
    
<body>
  <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
          <div class="container-fluid">
              <a class="brand" href="#">Online Bank </a>
              <div class="nav-collapse collapse">
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
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li><a></a></li>
              <li class="active"><a href="adashboard.php"> Dashboard</a></li>
                        <li><a href="manage_users.php">New User Verification</a></li>
                        <li><a href="aclist.php">Account List</a></li>
                        <li><a href="blist.php">Block Account List</a></li>
                        <li><a href="tran_list.php">Transaction</a></li>
                        <li><a href="report.php"> Report Generator</a></li>
                       
                        <li><a href="../logout.php"> Log Out</a></li>
                        <li><a></a></li>
                    </ul>
                </div>
           <div class="span9" id="content">
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left" >Transaction List</div>
          <div class="span10" id="content"  style="margin-top: 10px;" >
              <div class="row-fluid">
                      <div class="span12">
                             <table class="table-stripted table-hover" style="margin-top:05px;"  align="center">
                               <form action="" method="GET">
                                   <tr style="font-size:15px;">
                                      <td><b>Account No: </b></td>
                                     <td>
                                        <input name="ac_number" required autofocus type="text"  placeholder="Insert Account Number" style="margin-top:10px;" >
                                     </td>
                                     <td>
                                        <input name="search" class="btn btn-primary" type="submit" value="Search Invoice" >
                                     </td>
                                   </tr> 
                                  </form>
                              </table>
                              <hr>
                      </div>
                  </div>
 <div class="block-content collapse in">
                               
                        
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">

  <thead>
    <tr class="headings">
      <th>Transaction Date</th>
      <th>Account No </th>
      <th>Transaction ID</th>
      <th>Description</th>
      <th>Type</th>
      <th>Amount</th>
      

    </th>
  </tr>
</thead>

<tbody>
               <?php 
                  if(isset($_GET['search'])){
                  $account = $_GET['ac_number'];
                  
                   $i=0; 
                  
 
 $rslt = $obj->stransaction($account);
 if (!$rslt) {
    echo "no result";
}

  while($row1=$rslt->fetch_array()){

  
    ?>
    <tr class="item">
      <td class=" "><?php echo $row1['date'];?></td>
      <td class=" "><?php echo $row1['account_number'];?></td>
      <td class=" "><?php echo $row1['transaction_id'];?></td>
      <td class=" "><?php echo $row1['description'];?></td>
      <td class=" "><?php echo $row1['type'];?></td>
      <td class=" "><?php echo $row1['amount'];?></td>
    
     



      </tr>
      <?php $i++;} }



       ?>
                      </tbody>
  </table>
                                <br ><br >
                
                            </div>
                  </div>         
                </div>
          </div>
    </div>
  </div>
    <hr>
    <footer>

        <?php
             developer();
        ?>

    </footer>
  <!--/.fluid-container-->
  <script src="assets/js/jquery-1.9.1.min.js"></script>
  <script src="assets/js/scripts.js"></script>
</body>
</html>