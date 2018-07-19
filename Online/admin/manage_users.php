<?php 
require_once 'header_link.php';                           
$obj = new cls_func();
  
?>

<!DOCTYPE html>
<html class="no-js">
    <head>
        <title>Online Banking</title>
        <link href="../assets/css/customizedstyle.css" rel="stylesheet" media="screen">
        <link href="../assets/css/myresponsivestyle.css" rel="stylesheet" media="screen">
        <link href="../assets/css/styles.css" rel="stylesheet" media="screen">

 		<script src="../assets/js/jquery.min.js"></script>
		<link href="../assets/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../assets/facebox/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		  jQuery(document).ready(function($) {
		    $('a[rel*=facebox]').facebox({
		      loadingImage : '../assets/facebox/loading.gif',
		      closeImage   : '../assets/facebox/closelabel.png'
		    })
		  })
		</script>

    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">

                    <a class="brand" href="#">Online Banking </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">  <?php echo $user;?> </a>
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
                                <div class="muted pull-left" >Pending List</div>
                              
                            </div>
                            <div class="block-content collapse in">
                               
                        
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">

  <thead>
    <tr class="headings">
      <th>ID</th>
      <th>Name </th>
      <th>Account Type</th>
      <th>Gender</th>
      <th>NID</th>
      <th>Date of Birth</th>
      <th>Address</th>
      <th>Phone Number</th>
      <th>Email</th>
      <th>Action</th>

    </th>
  </tr>
</thead>

<tbody>
  <?php
  


  $qry=$obj->getUsers();
  $i=0; 
 
 
  while($row1=$qry->fetch_assoc() ){


    ?>
    <tr class="item">
      <td class=" "><?php echo $row1['id'];?></td>
      <td class=" "><?php echo $row1['username'];?></td>
      <td class=" "><?php echo $row1['ac_type'];?></td>
      <td class=" "><?php echo $row1['gender'];?></td>
      <td class=" "><?php echo $row1['nid'];?></td>
      <td class=" "><?php echo $row1['dob'];?></td>
      <td class=" "><?php echo $row1['address'];?></td>
      <td class=" "><?php echo $row1['phone'];?></td>
      <td class=" "><?php echo $row1['email'];?></td>
      <form method="post">
        <input type="hidden"  name="id" value="<?php echo $row1['id'];?>" >
        <td class=" ">
          <button type="submit" name="validate" class="btn btn-primary m-t-15 waves-effect" onclick="window.location.reload()">Approve</button>
          <!--<button type="submit" name="edit" class="btn btn-success m-t-15 waves-effect">Edit </button>-->
          <button type="submit" name="delete" class="btn btn-danger m-t-15 waves-effect">Delete </button></td>
        </form>



      </tr>
      <?php $i++;}  ?>
    </tbody>
  </table>
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
        <script src="assets/js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>

  <?php

if(isset($_POST['validate'])){


$id = $_POST['id'];
$done=$obj->valid($id);
//$done= mysqli_query(, "UPDATE `accounts` SET `status`='Active' WHERE id='$id' ");


}

if(isset($_POST['delete'])){


$id = $_POST['id'];
$done=$obj->delete($id);
//$done= mysqli_query( $con, "DELETE FROM `accounts` WHERE id='$id' ");

if ($done) {
  echo "<script> document.location.href='manage_users.php';</script>";
}
//else {
  //echo "<script> document.location.href='hoynai.php';</script>";

//}
}

?>