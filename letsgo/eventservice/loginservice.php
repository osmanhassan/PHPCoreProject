<?php
	
	require'../eventdata/userdata.php';
	function validate(){
		
		 
		$is_valid_id=true;
		
		$terget="";$passworderror="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			
			
			if(isset($_SESSION["activeas"])){
				 
				 if($_SESSION["activeas"]=="user" and !isset($_REQUEST['switch'])){
					 
					 if(isset($_COOKIE['user'])){
						 
						 $_SESSION['my']=$_COOKIE['user'];
						 
						 header("Location: postevent.php");
					 }
				 }
				 
				 if($_SESSION["activeas"]=="client" and !isset($_REQUEST['switch'])){
					 
					 if(isset($_COOKIE['client'])){
						 
						 $_SESSION['myc']=$_COOKIE['client'];
						 
						 header("Location: client_myinfo.php");
					 }
				 }
			 }
			
			$emailid=$_REQUEST['emailid'];
			
			$password=$_REQUEST['password'];
			
			
			if(!empty($emailid)){
				
					$xml=search_email($emailid);
					
					if($xml!=false){
							
						$is_valid_id=true;
							
						$terget=$xml;
							
					}
					
					else{
						
							$is_valid_id=false;
							
						}
				
				if($is_valid_id==false){
					
					$emailerror="*You typed wrog email id or you are not registered for " . $emailid;
					
					return $emailerror;
				}
			}
			else{
				
				$emailerror = "*Email id is required";
				
				$is_valid_id=false;
				
				return $emailerror;
			}
		
			
			if($is_valid_id==true){
				
				if(!empty($password)){
					
					if($terget==$password){
						
						session_start();
						
						
						
						if(sizeof(explode('*',$emailid))>1){
							
							if(isset($_REQUEST['cookie'])){
				
								setcookie("user",$emailid,time()+3600);
								
								$_SESSION["activeas"] = "user";
							}
							
							$_SESSION["my"] = $emailid;
						
							ob_clean();
							
							header("Location: postevent.php");
							
							
						}
						else{
							
							if(isset($_REQUEST['cookie'])){
				
								setcookie("client",$emailid,time()+3600);
								
								$_SESSION["activeas"] = "client";
							}
							
							$_SESSION["myc"] = $emailid;
						
							ob_clean();
							
							header("Location: client_myinfo.php");
							
						}
					}
					else{
						
						$passworderror .= "*Wrong password";
						
						return $passworderror;
						
					}
				}
				else{
					
					$passworderror .= "*password required";
					
					return $passworderror;
				}
			}
		}
	}
	
?>