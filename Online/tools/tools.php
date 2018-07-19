
<?php 

 

function developer(){

	echo "<p align='center'> Developed by <b>Hungry Birds Team</b></p>";
	

}
 

function invoiceCompanyTitle(){
	return "Online Bank";
}

function invoiceCompanyaddress(){
	return "Dhaka, Bangladesh ";
}

function invoiceCompanyPhone(){
	return "Phone: 01521438868 ";
}

function invoiceCompanyEmail(){
	return "Email: mderfan2@gmail.com";
}




function invoiceHeader(){

	echo "<h3>Online Bank</h3>";
	echo "<p style='margin-top:-14px;margin-bottom:-14px;'>
		Dhaka Bangladesh<br>
		phone: 0521438868<br>
		Email: mderfan2@gmail.com</p>";
}

function invoiceHeaderExport(){

	return "<center>
<p><span style='font-size:25px;'><b>Online Bank ltd</b></span><br />Dhak,Bangladesh
<br />
Phone: 01521438868 
<br />
Email: mderfan2@gmail.com
</p> </center>";
}



?>