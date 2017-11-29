<?php
	
	session_start();
	if(isset($_SESSION['a'])){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			ob_start();
			
			require '../eventservice/create_accountservice.php';
			
			$first_nameerror = validate_first();
			$last_nameerror = validate_last();
			$email_error = validate_email();
			$phone_error = validate_phone();
			$date_error = validate_date();
			$type_error = validate_type(); 
			$password_error = validate_password();
			$confirmPassword_error = validate_cpassword();
			$gender_error = validate_gender();
			$success = validate_all();
			
			$first = $_REQUEST['first'];
			$last = $_REQUEST['last'];
			$email = $_REQUEST['email'];
			$phone = $_REQUEST['phone'];
			$date = $_REQUEST['date'];
			$type = $_REQUEST['usertype'];
			$password = $_REQUEST['password'];
			$confirmPassword = $_REQUEST['confirmPassword'];
			$gender = $_REQUEST['gender'];
			
			if($success){
				
				$id=generate_id();
				require '../eventdata/create_accountdata.php';
				
				if($type=="user")
					
					insert_user($id,$first,$last,$email,$phone,$date,$password,$gender);
				
				if($type=="client")
					
					insert_client($id,$first,$last,$email,$phone,$date,$password,$gender);
				
				
				$first = 
				$last = 
				$email = 
				$phone = 
				$date =
				$password = 
				$confirmPassword =
				$gender = "";
				$success="success";
				
				
				unset($_SESSION['a']);
				
				session_start();
				
				
				if($type=="user"){
					
					$_SESSION['my']=$id;
					
					header("LOCATION: myinfo.php");
				}
				
				else{
					
					$_SESSION['myc']=$id;
					header("LOCATION: client_myinfo.php");
				
				}
			}
			
			else{
				
				$success="Error could not create account";
				
			}
			
			ob_clean();
			
		}
		
		else{
			
			$first = 
			$last = 
			$email = 
			$phone = 
			$date =
			$type =
			$password = 
			$confirmPassword =
			$gender = 
			$success = "";
			
			$first_nameerror = 
			$last_nameerror = 
			$email_error = 
			$phone_error = 
			$date_error = 
			$type_error=
			$password_error = 
			$confirmPassword_error = 
			$gender_error = 
			$success = "";
			
		}
	
	
	
	require'header.php';
	
	echo'


		
		<title>Create Account</title>
		<div class="login-card"style="width:300px">
			<header >
				<h1>Create account</h1>
				<br/>
				<br/>
				
			</header>
			
			<form method="post">
				<span>';echo $success;echo'</span>
				<br/>
				<input class="input" type="text" value="';echo $first; echo'" name="first"/>
				<label style="font-size:20px;">First name</label>
				
				<br/>
				
				<span >';echo $first_nameerror;echo'</span>
				<br/>	
				
				<input class="input" type="text"name="last" value="';echo $last;echo'"/>
				<label style="font-size:20px;">Last name</label>
				<br/>
				<span>';echo $last_nameerror;echo'</span>
				<br/>
				
				<input class="input" type="text" name="email" value="';echo $email; echo'"/>
				<label style="font-size:20px;">Email</label>
				<br/>
				<span>';echo $email_error;echo'</span>
				<br/>
				
				<input class="input" type="text"name="phone" value="';echo $phone ;echo'"/>
				<label style="font-size:20px;">Phone</label>
				<br/>
				<span>';echo $phone_error;echo'</span>
				<br/>
				
				<input class="input" type="date"name="date" value="';echo $date; echo'"/>
				<label style="font-size:20px;">Date of birth</label>
				<br/>
				<span>';echo $date_error;echo'</span>
				<br/>

				
				<fieldset style="border-radius:5px;padding:10px">
					<Legend style="margin:auto"><a style="font-size:30px;">Account type</a></Legend>
						<input style="width:30px;height:20px;margin-top:10px;margin-bottom:10px;" name="usertype" type="radio" value="user" ';if($type=="user") echo "checked :"; echo'/> <a style="font-size:30px;"> Publisher</a><br/>
						<input style="width:30px;height:20px;margin-top:10px;margin-bottom:10px;" name="usertype" type="radio" value="client"';if($type=="client") echo "checked :"; echo'/><a style="font-size:30px;"> Client</a><br/>
						* A user can publish events. <br/>
						* A client can contract with the user regarding events. <br/>
				</fieldset>
				<br/>
				<span>';echo $type_error;echo'</span>
				<br/>
				
				<input class="input" type="text"name="password" value="';echo $password; echo'"/>
				<label style="font-size:20px;">Type password</label>
				<br/>
				
				<br/>
				<span>';echo $password_error;echo'</span>
				<br/>
				
				<input class="input" type="text" name="confirmPassword" value = "';echo $confirmPassword; echo'"/>
				<label style="font-size:20px;">Cofirm password</label>
				<br/>
				<span>';echo $confirmPassword_error;echo'</span>
				<br/>
				
				<fieldset style="border-radius:5px">
					<Legend style="margin:auto"><a style="font-size:30px;">Gender</a></Legend>
						<input style="width:30px;height:20px;margin-top:10px;margin-bottom:10px;" name="gender" type="radio" value="male" ';if($gender=="male")echo "checked" ;echo'/> <a style="font-size:30px;">Male</a><br/>
						<input style="width:30px;height:20px;margin-top:10px;margin-bottom:10px;" name="gender" type="radio" value="female" ';if($gender=="female")echo "checked" ;echo'/><a style="font-size:30px;"> Female</a><br/>
						<input style="width:30px;height:20px;margin-top:10px;margin-bottom:10px;" name="gender" type="radio" value="other"';if($gender=="other")echo "checked" ;echo'/><a style="font-size:30px;"> Other</a><br/>
				</fieldset>
				<br/>
				<span>';echo $gender_error;echo'</span>
				<br/>
				
				<div class="">
					<input class="login-button" name="submit" type="submit" value="Create"/>
					
				</div>
				
			
			</form>
				
			<div style="width:180px ; margin:auto"><a href="login.php" style="font-size:50px;text-align:center;color:green">Log in ?</a></div>
			
			<br/>
			<footer class="" style="width:100%">
					<h3 class="w3-large w3-center">Create account to post your event.</h3>
			</footer>
			
	</body>
	
</html>';
}
else{
		
		header("LOCATION: login.php");
		
	}
?>
