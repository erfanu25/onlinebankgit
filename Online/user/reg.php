
<?php
require_once('../tools/dbconfig.php');              
    require_once('../tools/functions.php');                     
    $obj = new cls_func();
  
  
    if (isset($_POST['submit']))
    {
        if((addslashes("$_POST[email]")==addslashes("$_POST[email2]")) && (addslashes("$_POST[pass]")==addslashes("$_POST[vpass]"))){



        $username = addslashes("$_POST[username]");
        $pass = md5("$_POST[pass]");
        $phone = addslashes("$_POST[phone]");
        $email = addslashes("$_POST[email]");
        $address = addslashes("$_POST[address]");
        $dob = addslashes("$_POST[dob]");
        $gender = addslashes("$_POST[gender]");
        $nid = addslashes("$_POST[nid]");
        $nationality = addslashes("$_POST[nationality]");
    $ac_type = addslashes("$_POST[ac_type]");

    $first=rand(1010, 2020);
$middle=rand(1100, 9010);
if ($ac_type=='Savings') {
  $last= 101;
}elseif ($ac_type=='Current') {
  $last= 201;
}

$account_number= $first."".$middle."".$last;

    $qry = $obj->cust_insert($account_number,$username,$pass,$address,$ac_type,$nid,$dob,$email,$phone,$gender,$nationality);

    
      if ($qry>0){

        echo "<center>";
        echo "<h2 style='color:#AE0B0B;'>Information Successfully Inserted wait for Admin approval</h2>".'</br>';
        echo "<a href='../index.php' class='btn btn-primary '>Home</a>";
                                        echo "</center>";
          exit();
      }
      else{
        echo "<center>";
                                        echo "<h2 style='color:#AE0B0B;'>Invalid Entry or you already register Please Try Again</h2>";
                                        echo "<br />";
                                        echo "<br />";
                                        echo "<a href='reg.php' class='btn btn-primary '>Try Again</a>";
                                        echo "</center>";
        }   

        


        }
        else
        {
            echo "<center><h2 style='color:#AE0B0B;'>Check email and Password. Not match!!</h2></center>";
        }



     
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Online Banking</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
       
        <link href="../assets/css/default.css" rel="stylesheet" media="screen">
        <style type="text/css">
       
           a {
                color: #636b6f;
                padding: 0 35px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>


        <form action="" class="register" method="post" >
            <h1>Online Registration</h1>
            <fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input required type="text" name="email"/>
                    <label>Repeat email *
                    </label>
                    <input required name="email2" type="text"/>
                </p>
                <p>
                    <label>Password*
                    </label>
                    <input required type="Password" name="pass"/>
                    <label>Repeat Password*
                    </label>
                    <input required type="Password" name="vpass"/>
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
                <p>
                    <label>Account Type *
                    </label>
                    <select required name="ac_type">
                        <option value="">
                        </option>
                        <option value="Current" name="ac_type">Current
                        </option>
                        <option value="Savings" name="ac_type">Savings
                        </option>
                    </select>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>Name *
                    </label>
                    <input required type="text" class="long" name="username"/>
                </p>
                <p>
                    <label>Phone *
                    </label>
                    <input required type="text" maxlength="10" name="phone"/>
                </p>
               
                <p>
                    <label>Address *
                    </label>
                    <input required type="text" class="long" name="address"/>
                </p>
            
                <p>
                    <label class="required">NID
                    </label>
                    <input required class="long" type="text" name="nid"/>

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
                <p>
                    <div><label>Gender *</label></div>
                    <div class="demo-radio-button">
                               
                              <label for="radio_1">Male</label>
                            <input required name="gender" type="radio" id="radio_1" value="Male" />
                              <label for="radio_2">Female</label>
                              <input required name="gender" type="radio" id="radio_2" value="Female" />
                              



                          </div>
                    
                </p>
                  

                <p>
                    <label>Birthdate *
                    </label>
                  <input required type="date" name="dob">
                </p>

                <p>
                    <label>Nationality *
                    </label>
                    <select required name="nationality">
                        <option value="">
                        </option>
                        <option value="Bangladeshi">Bangladeshi
                        </option>
                        <option value="Other">Other
                        </option>
                    </select>
                </p>
               
                <div class="infobox"><h4>Helpful Information</h4>
                    <p>All information should have to be correct. After successfull online registration user have to wait for Admin validation.</p>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input required type="checkbox" value=""/>
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
              
            </fieldset>
            <div><button class="button" type="submit" name="submit">Register</button></div>
        </form>
        <center><a href='../index.php'>Home</a></center>
        
    </body>
</html>





