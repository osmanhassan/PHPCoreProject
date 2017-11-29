<?php

	$is_valid_first=
	$is_valid_last=
	$is_valid_email=
	$is_valid_phone=
	$is_valid_date=
	$is_valid_type=
	$is_valid_password=
	$is_valid_confirmPassword=
	$is_valid_gender=
	$is_successful=true;

	
	function validate_first(){
		
		$first_nameerror="";
		$first="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			if(empty($_REQUEST['first'])){
				
				$first_nameerror .= "*First name is empty"."<br/>";
				$GLOBALS['is_valid_first']=false;
				return $first_nameerror;
				
			}
			else{
				
				$first=$_REQUEST['first'];
				
				if(str_word_count($first)>1){
					
					$first_nameerror .= "*First name should be one word"."<br/>";
					$GLOBALS['is_valid_first']=false;
					
				}
				
				if(preg_match('#[0-9]#', $first)){
					
					$GLOBALS['is_valid_first']=false;
					$first_nameerror .="*First name can not contain number<br/>";
					
				}
				
				if(preg_match('#[\W]#', $first)){
					
					$GLOBALS['is_valid_first']=false;
					$first_nameerror .="*First name can not contain special character<br/>";
					
				}
				
				return $first_nameerror;
			}
		}
	
	}
	
	
	function validate_last(){
		
		$last_nameerror="";
		$last="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			 
			if(empty($_REQUEST['last'])){
				
				$last_nameerror .= "*Last name is empty"."<br/>";
				$GLOBALS['is_valid_last']=false;
				return $last_nameerror;
				
			}
			else{
				
				$last=$_REQUEST['last'];
				
				if(str_word_count($last)>1){
					
					$last_nameerror .= "*Last name should be one word"."<br/>";
					$GLOBALS['is_valid_last']=false;
					
				}

				if(preg_match('#[0-9]#', $last)){
					
					$GLOBALS['is_valid_last']=false;
					$last_nameerror .="*Last name can not contain number<br/>";
					
				}
				
				if(preg_match('#[\W]#', $last)){
					
					$GLOBALS['is_valid_last']=false;
					$last_nameerror .="*Last name can not contain special character<br/>";
					
				}
				return $last_nameerror;
			}
			
		}
		
	}
	
	
	function validate_email(){
		
		$email_error="";
		$email="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			$email=$_REQUEST['email'];
			
			if(empty($_REQUEST['email'])){
				
				$GLOBALS['is_valid_email']=false;
				$email_error .= "*Email is empty";
				return $email_error;
				
			}
			else{
				
				if(ord($email[0])>=65 and ord($email[0])<=122){
					
					if(ord($email[0])>90 and ord($email[0])<97){
						
						$email_error .= "*Type a valid email address"."<br/>";
						$GLOBALS['is_valid_email']=false;
						
					}
				}
				else{
					
					$email_error .= "*Type a valid email address"."<br/>";
					$GLOBALS['is_valid_email']=false;
					
				}
				
				$is_dot = false;
				
				$rev=strrev($email);
				
				if($rev[3]==".")
					$is_dot=true;
				
				if($is_dot==false){
					
					$GLOBALS['is_valid_email']=false;
					$email_error ="Type a valid email address";
				
				}
				
				return $email_error;
				
			}
		}
		
	}
	
	
	function validate_phone(){
		
		$phone_error="";
		$phone="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
	
			$phone = $_REQUEST['phone'];
			if(empty($_REQUEST['phone'])){
				
				$phone_error = "*phone number is empty"."<br/>";
				$GLOBALS['is_valid_phone']=false;
				return $phone_error;
				
			}
			else{
				
				if(strlen($phone)!=11){
					
					$phone_error="*Tyle a valid phone number";
					$GLOBALS['is_valid_phone']=false;
					
				}
				
				if(!preg_match('/^[0-9]{11}$/',$phone)){
					
					$phone_error="*Tyle a valid phone number";
					$GLOBALS['is_valid_phone']=false;
					
				}
				
				return $phone_error;
				
			}
		}
		
	}
	
	
	function validate_date(){
		
		$date_error="";
		$date="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			$date = $_REQUEST['date'];
			
			if(empty($_REQUEST['date'])){
				
				$date_error = "*Birthday is empty"."<br/>";
				$GLOBALS['is_valid_date']=false;
				return $date_error;
				
			}
		}
		
	}
	
	function validate_type(){
			
		$type_error="";
		$usertype="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			if(!isset($_REQUEST['usertype'])){
				
				$type_error .= "*Type is not selected"."<br/>";
				$GLOBALS['is_valid_type']=false;
				return $type_error;
				
			}
			else{
				
				$usertype=$_REQUEST['usertype'];
				return $type_error;;
				
			}
			
		}	
		
	}
	
	function validate_password(){
		
		$password_error="";
		$password="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			$password = $_REQUEST['password'];
			
			if(empty($_REQUEST['password'])){
				
				$password_error = "*password is empty"."<br/>";
				$GLOBALS['is_valid_password']=false;
				return $password_error;
				
			}
			else{
				
				if(strlen($password)<6){
					
					$GLOBALS['is_valid_password']=false;
					$password_error .="Password must contain atleast 6 characters<br/>";
					
				}
				
				$len=strlen($password);
				
				if(!preg_match('#[A-Z]#', $password)){
					
					$GLOBALS['is_valid_password']=false;
					$password_error .="Password must contain atleast one upper case letter<br/>";
					
				}
				
				if(!preg_match('#[a-z]#', $password)){
					
					$GLOBALS['is_valid_password']=false;
					$password_error .="Password must contain atleast one lower case letter<br/>";
					
				}
				
				if(!preg_match('#[0-9]#', $password)){
					
					$GLOBALS['is_valid_password']=false;
					$password_error .="Password must contain atleast one number<br/>";
					
				}
				
				if(!preg_match('#[\W]#', $password)){
					
					$GLOBALS['is_valid_password']=false;
					$password_error .="Password must contain atleast one special character<br/>";
					
				}
				
				return $password_error;
				
			}
		}
	
	}
	
	
	function validate_cpassword(){	
		

		$confirmPassword_error="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			if(empty($_REQUEST['confirmPassword'])){
				
				$confirmPassword_error .= "*Password is not confirmed"."<br/>";
				$GLOBALS['is_valid_confirmPassword']=false;
				return $confirmPassword_error;
				
			}
			
			else{
				
				$confirmPassword = $_REQUEST['confirmPassword'];
				$password=$_REQUEST['password'];
				
				if($confirmPassword != $password){
					
					$confirmPassword_error .= "*Doesn't match with password<br/>";
					$GLOBALS['is_valid_confirmPassword'] = false;
					
				}
				
				return $confirmPassword_error;
			}
		}
		
	}
	
	
	function validate_gender(){
		
		$gender_error="";
		$gender="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			if(!isset($_REQUEST['gender'])){
				
				$gender_error .= "*Gender is not selected"."<br/>";
				$GLOBALS['is_valid_gender']=false;
				return $gender_error;
				
			}
			else{
				
				$gender=$_REQUEST['gender'];
				return $gender_error;
				
			}
			
		}
		
	}
	
	
	function validate_all(){
		
		$success = $GLOBALS['is_successful'];
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			if($GLOBALS['is_valid_confirmPassword']==true and $GLOBALS['is_valid_first']==true and $GLOBALS['is_valid_last']==true and $GLOBALS['is_valid_phone']==true and $GLOBALS['is_valid_email']==true and $GLOBALS['is_valid_date']==true and $GLOBALS['is_valid_type']==true and $GLOBALS['is_valid_password']==true and $GLOBALS['is_valid_gender']==true){
				
				return $success;
				
			}
			
			else{
				
				$success = false;
				return $success;
				
			}
			
		}
		
	}
	
	function generate_id(){
		
		$first = $_REQUEST['first'];
		
		$last = $_REQUEST['last'];
		
		$f = strtolower($first);
		
		$l = strtolower($last);
		
		$id="";
		
		if($_REQUEST['usertype']=="user"){
			
			require'../eventdata/userdata.php';
			
			
			$xml=simplexml_load_file("data.xml");
			
			$count=0;
			
			foreach($xml->user as $user){
				
			//echo $user['id'] . "<br>";
				if($user->firstname == $first and $user->lastname == $last){
				
					$count += 1;
					
				}
			}
			
			if($count == 0){
				
				$id = $f . "*" . $l . "@letsgo.com";
				
			}
			
			else{
				
				$id = $f . $count . "*"  . $l . "@letsgo.com";
				
			}
		}
		
		if($_REQUEST['usertype']=="client"){
			
			require'../eventdata/userdata.php';
			
			
			$xml=simplexml_load_file("clientdata.xml");
			
			$count=0;
			
			foreach($xml->user as $user){
				
			//echo $user['id'] . "<br>";
				if($user->firstname==$first and $user->lastname==$last){
				
					$count += 1;
					
				}
			}
			
			if($count == 0){
				
				$id = $f . $l . "@letsgo.com";
				
			}
			
			else{
				
				$id = $f . $l . $count . "@letsgo.com";
				
			}
		}
		
		
		return $id;
	}
	
	function revalidate_password($newpassword){
	
		$password_error="";
	
		$password = $newpassword;
	
		
		if(strlen($password)<6){
			
			
			$password_error .="*New password must contain atleast 6 characters<br/>";
			
		}
		
		$len=strlen($password);
		
		if(!preg_match('#[A-Z]#', $password)){
			
			
			$password_error .="*New password must contain atleast one upper case letter<br/>";
			
		}
		
		if(!preg_match('#[a-z]#', $password)){
			
			
			$password_error .="*New password must contain atleast one lower case letter<br/>";
			
		}
		
		if(!preg_match('#[0-9]#', $password)){
			
			
			$password_error .="*New password must contain atleast one number<br/>";
			
		}
		
		if(!preg_match('#[\W]#', $password)){
			
			
			$password_error .="*New password must contain atleast one special character<br/>";
			
		}
		
		return $password_error;
		
	}
	//var_dump($_POST);
?>
