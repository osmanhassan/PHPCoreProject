<?php

	require'../eventdata/eventdata.php';
	
	if(isset($_GET['publisher'])){
		
		$publisher=$_GET['publisher'];
		
		$result = show_publisher_notification($publisher);
		
		while($row=mysqli_fetch_assoc($result)){
			
			echo 
			
			
			'
			<table style="width:90%;margin:auto">
			
			<tr>
			
			<td style="border-bottom:solid gray;background-color:#fff;color:#000;padding:10px;">
			
				'; echo $row['text'];
				
			echo'
			
			</td>
			<tr>
			</table>
			';
		}
	
	}
	
	
	if(isset($_GET['client'])){
		
		$publisher=$_GET['client'];
		
		$result = show_client_notification($publisher);
		
		while($row=mysqli_fetch_assoc($result)){
			
			echo 
			
			
			'
			<table style="width:90%;margin:auto">
			
			<tr>
			
			<td style="border-bottom:solid gray;background-color:#fff;color:#000;padding:10px;">
			
				'; echo $row['text'];
				
			echo'
			
			</td>
			<tr>
			</table>
			';
		}
	
	}


?>