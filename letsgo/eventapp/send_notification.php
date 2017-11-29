<?php

	require '../eventdata/eventdata.php';
	
	if(isset($_GET['publisher'])){
		
		$name=$_GET['publisher'];
		
		$type=$_GET['type'];
		
		if($type=="comment_notification"){
			
			$result=count_comment_notification_publisher($name);
			
		}
	}
		
	if(isset($_GET['client'])){
		
		$name=$_GET['client'];
		
		$type=$_GET['type'];
		
		if($type=="comment_notification"){
			
			$result=count_comment_notification_client($name);
			
		}
		
	}
		
	
		
	$row=mysqli_fetch_row($result);
			
			if($row[0]!=0)
				echo ($row[0]);
		
	


?>