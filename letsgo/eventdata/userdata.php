<?php

	function search_email($emailid){
		
		if(sizeof(explode('*',$emailid))>1)
			
			$xml=simplexml_load_file("data.xml");
		
		else
			
			$xml=simplexml_load_file("clientdata.xml");
		
		foreach($xml->user as $user){
			
			if($user['id']==$emailid){
	
				return $user->password;
				
			}
		}
								
		return false;
					
	}
	
	function select_first_name($email){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from user where email like '$email'";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
	}
	
	function select_user($email){
		
		if($con = mysqli_connect("127.0.0.1", "root", "", "project")){
				
			$query="select * from user where email like '$email'";
			
			$result=mysqli_query($con,$query);
			
			return $result;
			
		}
	}
	
	function select_user_pass($user){
		
		if($con = mysqli_connect("127.0.0.1", "root", "", "project")){
			
			$query="select password from user where email like '$user'";
			
			$result=mysqli_query($con,$query);
			
			return $result;
		
		}
		
	}
	function select_client($email){
		
		if($con = mysqli_connect("127.0.0.1", "root", "", "project")){
			
			$query="select * from client where email like '$email'";
			
			$result=mysqli_query($con,$query);
			
			return $result;
		
		}
		
	}
	
	function select_client_pass($client){
		
		if($con = mysqli_connect("127.0.0.1", "root", "", "project")){
			
			$query="select password from client where email like '$client'";
			
			$result=mysqli_query($con,$query);
			
			return $result;
		
		}
		
	}
	
	function update_user_pass($newpass,$email){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="UPDATE user SET password='$newpass' WHERE email like '$email'";
		
		mysqli_query($con,$query);
		
	}
	
	function update_client_pass($newpass,$email){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="UPDATE client SET password='$newpass' WHERE email like '$email'";
		
		mysqli_query($con,$query);
		
	}
	
	function update_user_image($p_store,$email){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		if(sizeof(explode('*',$email))>1)
			
			$query="UPDATE user SET image='$p_store' WHERE email like '$email'";
		
		else
			
			$query="UPDATE client SET image='$p_store' WHERE email like '$email'";

		mysqli_query($con,$query);
		
	}
	
	function select_events(){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
	}
	
	function select_events_not_publisher($publisher){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event where publisher not like '$publisher' ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
	}
	
	function insertEmail($from, $to, $subject, $text){
		
		$con = mysqli_connect("127.0.0.1","root","","project");
		
		$query = "INSERT INTO email(mid, sender, receiver, subject, content) VALUES (NULL,'$from','$to','$subject','$text')";
	
		mysqli_query($con,$query);
		
	}
	
	function selectSenderMail($sender){
		
		$con = mysqli_connect("127.0.0.1","root","","project");
		
		$query = "select * from email where sender like '$sender' order by mid desc";
	
		$result = mysqli_query($con,$query);
		
		return $result;
		
	}
	
	function selectReceiverMail($receiver){
		
		
		$con = mysqli_connect("127.0.0.1","root","","project");
		
		$query = "select * from email where receiver like '$receiver' order by mid desc";
	
		$result = mysqli_query($con,$query);
		
		return $result;
		
		
	}
	
	function select_events_by_publisher($publisher){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event where publisher like '$publisher' ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
	}
	
	
?>