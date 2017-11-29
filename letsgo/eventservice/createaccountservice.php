<?php
	$first_nameerror = $last_nameerror = $email_error=
	$phone_error = $date_error = $password_error= $confirmPassword_error = $gender_error = "";
	$first = $last = $email = $phone = $date= $password = $confirmPassword = $gender = "";
	$success="";
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$is_valid_first=true; 
		if(empty($_REQUEST['first'])){
			$first_nameerror .= "*First name is empty"."<br/>";
			$is_valid_first=false;
		}
		else{
			$first=$_REQUEST['first'];
			if(str_word_count($first)>1){
				$first_nameerror .= "*First name should be one word"."<br/>";
				$is_valid_first=false;
			}
			
			if(ord($first[0])>=65 and ord($first[0])<=122){
				if(ord($first[0])>90 and ord($first[0])<97){
					$first_nameerror .= "*First name should start with a letter"."<br/>";
					$is_valid_first=false;
				}
			}
			else{
					$first_nameerror .= "*First name should start with letter"."<br/>";
					$is_valid_first=false;
			}
		}
		
		$is_valid_last=true; 
		if(empty($_REQUEST['last'])){
			;
			$last_nameerror .= "*Last name is empty"."<br/>";
			$is_valid_last=false;
		}
		else{
			$last=$_REQUEST['last'];
			if(str_word_count($last)>1){
				$last_nameerror .= "*Last name should be one word"."<br/>";
				$is_valid_last=false;
			}
			
			if(ord($last[0])>=65 and ord($last[0])<=122){
				if(ord($last[0])>90 and ord($last[0])<97){
					$last_nameerror .= "*Last name should start with a letter"."<br/>";
					$is_valid_last=false;
				}
			}
			else{
					$last_nameerror .= "*Last name should start with letter"."<br/>";
					$is_valid_last=false;
			}
		}
			$email=$_REQUEST['email'];
			$is_valid_email=true;
			if(empty($_REQUEST['email'])){
				$is_valid_email=false;
				$email_error .= "*Email is empty";
			}
			else{
				if(ord($email[0])>=65 and ord($email[0])<=122){
					if(ord($email[0])>90 and ord($email[0])<97){
						$email_error .= "*Type a valid email address"."<br/>";
						$is_valid_email=false;
					}
				}
				else{
						$email_error .= "*Type a valid email address"."<br/>";
						$is_valid_email=false;
				}
				
				$is_dot = false;
				
				$rev=strrev($email);
				if($rev[3]==".")
					$is_dot=true;
				
				if($is_dot==false){
					$is_valid_email=false;
					$email_error ="Type a valid email address";
				
				}
				$xml=simplexml_load_file("data.xml");
				foreach($xml->user as $user){
				//echo $user['id'] . "<br>";
				if($user['id']==$email){
				
				$is_valid_email=false;
				$email_error ="$email is already registered";
				
				break;
				}
			}
			}
			
			
			$is_valid_phone=true;
			$phone = $_REQUEST['phone'];
			if(empty($_REQUEST['phone'])){
				$phone_error = "*phone number is empty"."<br/>";
				$is_valid_phone=false;
			}
			else{
				if(strlen($phone)!=11){
					$phone_error="*Tyle a valid phone number";
					$is_valid_phone=false;
				}
				
				if(!preg_match('/^[0-9]{11}$/',$phone)){
					$phone_error="*Tyle a valid phone number";
					$is_valid_phone=false;
				}
				
			}
			$is_valid_date=true;
			$date = $_REQUEST['date'];
			if(empty($_REQUEST['date'])){
				$date_error = "*Birthday is empty"."<br/>";
				$is_valid_date=false;
			}
			
			$is_valid_password=true;
			$password = $_REQUEST['password'];
			if(empty($_REQUEST['password'])){
				$password_error = "*password is empty"."<br/>";
				$is_valid_password=false;
			}
			else{
				if(strlen($password)<6){
					$is_valid_password=false;
					$password_error .="Password must contain atleast 6 characters<br/>";
				}
				$len=strlen($password);
				if(!preg_match('#[A-Z]#', $password)){
					$is_valid_password=false;
					$password_error .="Password must contain atleast one upper case letter<br/>";
				}
				if(!preg_match('#[a-z]#', $password)){
					$is_valid_password=false;
					$password_error .="Password must contain atleast one lower case letter<br/>";
				}
				if(!preg_match('#[0-9]#', $password)){
					$is_valid_password=false;
					$password_error .="Password must contain atleast one number<br/>";
				}
				if(!preg_match('#[\W]#', $password)){
					$is_valid_password=false;
					$password_error .="Password must contain atleast one special character<br/>";
				}
				
				
			}
			
			$is_valid_confirmPassword=true;
			if(empty($_REQUEST['confirmPassword'])){
				$confirmPassword_error .= "*Password is not confirmed"."<br/>";
				$is_valid_confirmPassword=false;
			}
			else{
				$confirmPassword = $_REQUEST['confirmPassword'];
				if($confirmPassword != $password){
					$confirmPassword_error .= "*Doesn't match with password<br/>";
					$is_valid_confirmPassword = false;
				}
			}
			
			$is_valid_gender=true;
			
			if(!isset($_REQUEST['gender'])){
				
				$gender_error .= "*Gender is not selected"."<br/>";
				$is_valid_gender=false;
			}
			else{
				$gender=$_REQUEST['gender'];
			}
			
			$is_successful=false;
			if($is_valid_confirmPassword==true and $is_valid_first==true and $is_valid_last==true and $is_valid_phone==true and $is_valid_email==true and $is_valid_date==true and $is_valid_password==true and $is_valid_gender==true){
				$success="Account has been created";
				
				$myfile=fopen("data.xml","a");
				$xmlText="<user></user>";
				
				//$xml = new SimpleXMLElement("$xmlText");
				$xml = new SimpleXMLElement("$xmlText");
				//$xml -> asXML("data.xml");
				
				$xml->addAttribute("id",$email);
				$xml->addChild("firstname", $first);
				//$xml->addChild("firstname", $last);
				$xml->addChild("password",$password);
				$xml->addChild("lastname", $last);
				$xml->addChild("email",$email);
				$xml->addChild("phone", $phone);
				$xml->addChild("birtday",$date);
				$xml->addChild("gender", $gender);
				
				$str=$xml->asXML();
				$key='</users>';
				$line=file("data.xml");
				$output="";
				foreach($line as $l){
					if(!strstr($l,$key))
						$output.=$l;
				}
				file_put_contents("data.xml",$output);
				$str=str_replace('<?xml version="1.0"?>', "", $str);
				$str .="</users>";
				//$xml->saveXML("data.xml");
				fwrite($myfile,$str);
				fclose($myfile);
				
				$image="none";
				if($con = mysqli_connect("127.0.0.1:3306", "root", "", "project")){
					$query="INSERT INTO user(first,last,email,phone,birthday,password,gender) VALUES ('$first','$last','$email','$phone','$date','$password','$gender')";
					$result=mysqli_query($con,$query);
					if($result)
						echo "inserted";
					else
						echo "wasn't inserted";
					
				}
				else{
					echo "Couldn't connect to the database";
				}
				
			}
			
	}
	//var_dump($_POST);
?>
