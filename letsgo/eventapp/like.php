<?php
	
		
		if(isset($_GET['name'])and isset($_GET['eid'])and isset($_GET['publisher']) and isset($_GET['notification_type'])){
			
			
			$name=$_GET['name'];
		
			$eid=$_GET['eid'];
			
			$publisher=$_GET['publisher'];
			
			$type = $_GET['notification_type'];
			
			$text="";
			
			require'../eventdata/eventdata.php';
		
			$ename = select_event_name($eid);
		
			$ename = mysqli_fetch_row($ename);
		
			$ename = $ename[0];
			
			$text="";
			
			if($type == "anonymous_like"){
				
				$text = "Anonymous " . $name . " liked on your post " . $ename;
				
			}
			
			if($type == "client_like"){
				
				$text = "Client " . $name . "liked on your post " . $ename;
				
			}
			
			$result=checkLikedBefore($eid,$name,$type);
			
			$row=mysqli_fetch_row($result);
			
			if($row[2] != $name){
					
				insert_notification($eid,$name,$text,$publisher,$type);
				
				insert_like($eid);
				
			}
			
			$result=select_like($eid);
			
			$likes=mysqli_fetch_row($result);
			
			echo $likes[0];
			
		}
		
		else{
			
			
			$eid=$_GET['eid'];
			
			require'../eventdata/eventdata.php';
			
			$result=select_like($eid);
			
			$likes=mysqli_fetch_row($result);
			
			echo $likes[0];
			
		}
		
	


?>