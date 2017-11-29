<?php
	
	if(isset($_POST['prepass']) and isset($_POST['newpass']) and isset($_POST['user'])){
		
		require'../eventdata/userdata.php';
		
		require'../eventservice/create_accountservice.php';
		
		$user=$_POST['user'];
		
		$newpass=$_POST['newpass'];
		
		$prepass=$_POST['prepass'];
		
		session_start();
		
		if($_SESSION['activeas']=="user"){
			
			$result=select_user_pass($user);
		}
		
		if($_SESSION['activeas']=="client"){
			
			$result=select_client_pass($user);
		}
		
		$row=mysqli_fetch_assoc($result);
		
		if($row['password'] == $prepass){
			
			if($prepass != $newpass){
					
				if(revalidate_password($newpass)!=""){
					
					echo revalidate_password($newpass);
				}
				
				else{
					
					if($_SESSION['activeas']=="user"){
						
						update_user_pass($newpass,$user);
						
						$xml=simplexml_load_file("data.xml");
						
						$x=0;
						foreach($xml->user as $u){
							
							if($u['id']==$user){
								
								$u->password=$newpass;
								$xml->saveXML("data.xml");
								break;
							}
						}
					}
						
					if($_SESSION['activeas']=="client"){
						
						update_client_pass($newpass,$user);
						
						$xml=simplexml_load_file("clientdata.xml");
						
						foreach($xml->user as $u){
							
							if($u['id']==$user){
					
								$u->password=$newpass;
								$xml->saveXML("clientdata.xml");
								break;
							}
						}
					}
					
					echo '<span style="font-size:20px;color:green">Password changed successfully</span>';
				}
				
			}
			
			else{
				
				echo "You can not give the same password again";
			}
			
		}
		else{
			
			echo "*Wrong previous password";
		}
		
	}
	
?>