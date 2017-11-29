<?php

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		$to=$_POST['to'];
		
		$from=$_POST['from'];
		
		$subject = $_POST['subject'];
		
		$text = $_POST['text'];
		
		require'../eventdata/userdata.php';
		
		require'../eventdata/eventdata.php';
		
		if(sizeof(explode('*',$to))>1){
			
			$result=select_user($to);
			
			$type="client_email";
		}
			
		else{
			
			$result=select_client($to);
			
			$type="publisher_email";
		}
		
		$row = mysqli_fetch_row($result);
		
		if($row[0]!=""){
			
			insertEmail($from, $to, $subject, $text);
			
			$eid=0;
			
			if($type=="publisher_email"){
				
				if(sizeof(explode('*',$from))>1)
					
					$text="You have new mail from publisher " . $from ;
					
				else
					
					$text="You have new mail from " . $from ;
			}
			
			if($type=="client_email"){
				
				$text="You have new mail from client " . $from ;
			}
			
			insert_notification($eid,$from,$text,$to,$type);
			
			echo "Your email is sent successfully";
		}
		else
			
			echo "No such receipant";
		
	}
	

?>