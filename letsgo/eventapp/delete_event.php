<?php

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		require'../eventdata/eventdata.php';
		
		$eid=$_GET['eid'];
		
		if(delete_event($eid)==1){
			
			echo "done";
			
		}
		
		else{
			
			echo "error";
			
		}
		
	}
	
	else{
		
		echo "Its POST,you can't do it from here";
	}

?>