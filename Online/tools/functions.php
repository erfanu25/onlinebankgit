<?php
class cls_func{
	
	public function con(){
		$connect = new dbconfig();
		return $connect->connection();
	}
	
    


    ////////user////
    
	//function for checking token
	public function check_token($email,$token){
		$result = $this->con()->query("SELECT * FROM `verification` WHERE email='$email' and token='$token'");
		return $result;
	}

    //function for storing token
	public function token($email,$token){
		$result = $this->con()->query("INSERT INTO `verification`(`email`, `token`) VALUES ('$email','$token')");
		return $result;
	}

    //function for user registration
    public function cust_insert($account_number,$username,$pass,$address,$ac_type,$nid,$dob,$email,$phone,$gender,$nationality){

		$result = $this->con()->query("INSERT INTO `accounts`(`account_number`, `username`, `pass`, `address`, `ac_type`, `nid`, `dob`, `email`, `phone`, `gender`, `nationality`) VALUES ('$account_number','$username','$pass','$address','$ac_type','$nid','$dob','$email','$phone','$gender','$nationality')");
		return $result;
	} 

	//function for user login
	public function check_user($username,$password){
		$result = $this->con()->query("SELECT * FROM `accounts` WHERE email='$username' and pass='$password' and status='Active'");
		return $result;
	}

	
    //function for deposit
	public function deposit($ac_no,$T_id,$amount,$type,$type){
		$result = $this->con()->query("INSERT INTO `transaction`(`account_number`, `transaction_id`, `amount`, `type`,`description`) VALUES ('$ac_no','$T_id','$amount','$type','$type')");
		return $result;
	}
    public function check_balance($ac_no){
		$result = $this->con()->query("SELECT * FROM `accounts` WHERE `account_number` = '$ac_no'");
		return $result;
	}
	public function dbalanceupdate($balance,$ac_no){
		$result = $this->con()->query("UPDATE `accounts` SET `balance` = '$balance' WHERE `account_number` = '$ac_no'");
		return $result;
	}

   //function for transfer fund
	public function tfund($recievers_bank_name,$recievers_name,$recievers_ac_no,$sender_name,$sender_ac_no,$amount,$transfer_note){
		$result = $this->con()->query("INSERT INTO `fund_transfer` (`reciever_bank`, `reciever_name`, `reciever_ac_no`, `sender_name`, `sender_ac_no`,  `amount`, `note`)
VALUES ('$recievers_bank_name','$recievers_name','$recievers_ac_no','$sender_name','$sender_ac_no','$amount','$transfer_note')");
		return $result;
	}
    
    public function tin($sender_ac_no,$amount,$in){
		$result = $this->con()->query("INSERT INTO `transaction`(`account_number`, `amount`, `type`, `description`) VALUES ('$sender_ac_no','$amount','Withdraw','$in')");
		return $result;
	}

	public function tout($recievers_ac_no,$amount,$out){
		$result = $this->con()->query("INSERT INTO `transaction`(`account_number`, `amount`, `type`,`description`) VALUES ('$recievers_ac_no','$amount','Deposite','$out')");
		return $result;
	}

	//online payment
	 public function opay($ac,$amount,$type,$t_number){
		$result = $this->con()->query("INSERT INTO `transaction`(`account_number`, `amount`, `type`,`description`,`transaction_id`) VALUES ('$ac','$amount','Bill','$type','$t_number')");
		return $result;
	} 







    /////admin///////
    // select from to tranaction
    
     public function selectran($account,$fromdate,$todate){
		$result = $this->con()->query("SELECT * FROM transaction WHERE account_number='$account' && date BETWEEN '$fromdate' AND '$todate'");
		return $result;
	}
   //search transaction
	public function stransaction($account){
		$result = $this->con()->query("SELECT * from transaction where account_number='$account'");
		return $result;
	}
    //function for admin login
	public function check_admin($username,$password){
		$result = $this->con()->query("SELECT * FROM `employee` WHERE username='$username' and password='$password' ");
		return $result;
	}

    //watch all transaction
	public function alltransaction(){
		$result = $this->con()->query("SELECT * from transaction");
		return $result;
	}
    //watch pending list
    
	public function getusers(){
		$result = $this->con()->query("SELECT * from accounts where status='Pending'");
		return $result;
	}
    //watch active user
	public function getactiveusers(){
		$result = $this->con()->query("SELECT * from accounts where status='Active'");
		return $result;
	}

	//watch block user
	public function getblockusers(){
		$result = $this->con()->query("SELECT * from accounts where status='Block'");
		return $result;
	}
    //approve id
	public function valid($id){
		$result = $this->con()->query("UPDATE `accounts` SET `status`='Active' WHERE id='$id'");
		return $result;
	}
    
    //delete id
	public function delete($id){
		$result = $this->con()->query("DELETE FROM `accounts` WHERE id='$id' ");
		return $result;
	}

	//block id
    public function block($id){
		$result = $this->con()->query("UPDATE `accounts` SET `status`='Block' WHERE id='$id'");
		return $result;
	}

	//unblock id
    public function unblock($id){
		$result = $this->con()->query("UPDATE `accounts` SET `status`='Active' WHERE id='$id'");
		return $result;
	}


	}
	?>