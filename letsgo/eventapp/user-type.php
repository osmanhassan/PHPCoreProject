<?php

	require'header.php';

	
?>

<html>

	<head>
	
		<title>Type</title>
		
		<style>
		
			.typecard{
				
				width:400px;
				
				background-color:rgba(0,0,0,0.5);
				
				border-radius:10px;
				
				box-shadow:10px 10px 5px rgba(0,0,0,0.9);
				
				margin:0 auto;
				
				margin-top:100px;
				
				color:#fff;
			}
			
			.typeheader{
				
				font-size:50px;
				
				line-height:80px;
				
				
				
				width:100%;
				
				border-bottom:solid #fff;
				
			}
		
		</style>
		
	</head>
	
	<body>
	
		<div class="typecard">
		
			<div class="typeheader">
			
				&nbsp Select type
				
			
			</div>
			
			<form style="font-size:60px;line-height:60px;width:52%;margin:auto;">
			
				<input type="radio" name="type" value="user" style="width:40px;height:40px"/> User
				
				<input type="radio" name="type" value="client" style="width:40px;height:40px"/> Client
				
				<input type="submit" value="submit" style="width:50%;margin:10px 25% 0 25%;height:50px;color:#fff;background-color:rgba(0,0,0,0.9);font-size:20px;border-radius:10px"/>
			
			</form>
			
			<div style="padding:10px;margin-top:20px;width:95%;border-top:solid #fff">
			
				* A user can publish events. <br/>
				
				* A client can contract with the user regarding events. <br/>
			
			</div>
		
		</div>
	
	</body>

</html>