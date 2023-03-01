<?php 


	require_once "emailModelo.php";
	$ins_email = new emailModelo();

	/*------------- listar categoria -------------*/
	if(isset($_POST['milton_email_reg'])){
		echo $ins_email->email_milton();
	}



 ?>