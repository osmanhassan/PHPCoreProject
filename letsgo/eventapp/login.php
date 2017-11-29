<?php
 require'../eventservice/loginservice.php';
 
 ob_start();
 
 require'header.php';
 
 session_start();
 
 $_SESSION['a']=1;
 
 
 
 
?>


		
		<title>Log in</title>
		<div class="login-card">
		<header>
		
			<a style="font-size:50px;font-weight:bold">Log In</a><br/><br/>
			
		</header>
		
		<div>
		
			<form method="post">
			
				<input type="text" placeholder="email id" name="emailid" value="<?php if($_SERVER['REQUEST_METHOD']=="POST") echo$_POST['emailid'];?>" class="input"/><br/><br/>
				
				<span><?php if($_SERVER['REQUEST_METHOD']=="POST"){if(validate()!="*Wrong password" && validate()!="*password required")echo validate();}?></span><br/>
				
				<input type="password" placeholder="password" name="password" value="<?php if($_SERVER['REQUEST_METHOD']=="POST") echo$_POST['password'];?>" class="input"/><br/><br/>
				
				<span><?php if($_SERVER['REQUEST_METHOD']=="POST"){if(validate()=="*Wrong password"||validate()=="*password required")echo validate();}?></span><br/>
				
				<input class="login-button" type="submit" value="Log In"/>
				
				<input type="checkbox" name="cookie" value="cookie" style="height:20px;width:20px;margin-top:20px"/><a style="font-size:30px;font-weight:bold;padding:10px">Keep me log in.</a></br>
				
		
			</form>

			<footer style="text-align:center;font-size:30px;font-weight:bold;margin-top:20px;margin-bottom:20px">

				<a style="color:green;" href="create_account.php">Don't have account ?</a>
			
			</footer>
			
		</div>
		
	</body>
	
</html>