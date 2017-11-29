<?php

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		session_start();
		
		$_SESSION['activeas']=$_POST['activeas'];
		
		
	}

?>