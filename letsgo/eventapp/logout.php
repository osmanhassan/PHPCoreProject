<?php
	
	session_start();
	
	if(isset($_SESSION['activeas'])){
		
		if($_SESSION['activeas']=="client"){
			
			unset($_SESSION['myc']);
			
		}
		
		if($_SESSION['activeas']=="user"){
			
			unset($_SESSION['my']);
			
		}
		
		//unset($_SESSION['activeas']);
		
		header("Location: card.php");
		
	}
	
	else {
		
		header("Location: card.php");
		
	}

?>