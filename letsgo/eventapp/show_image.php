<?php


	session_start();
	
	if(isset($_SESSION["event"])){
		
		
		
		require'header.php';
		
		require '../eventdata/eventdata.php';
		echo '
			
			
				<html>
				
					<head>
						
						<style>
							
							@media(min-width:1200px){
	
								  body{
									  background-image:url(../image/hd3.jpg);
									  background-size:cover;
								  }
								  .wrapper{
									
									
									padding:15px;
									
								  }
								  
								  .header{
									
									background-color: rgba(0,0,0,0.7);
									height:100px;
									border-radius: 10px;
								  }
								  
								  .container{
									
									margin-top:15px;
									
								  }
								  .container::after{
									
									content:"";
									display:block;
									clear:both;
								  
								  }
								  .leftpanel{
									
									width:20%;
									float:left;
								  }
								  
								  .nav{
									
									margin-top:15px;
									background-color:rgba(0,0,0,0.7);
									height:400px;
									border-radius:10px;
									
								  }
								  .comment{
									margin-top:15px;
									background-color:rgba(0,0,0,0.7);
									height:200px;
									border-radius:10px;
									
								  }
								  
								  .content{
									
									margin-top:15px;
									background-color:rgba(0,0,0,0.7);
									height:615px;
									width:78.5%;
									border-radius:10px;
									float:right;
									/overflow:auto;
								   
								  }
								  
								  .footer{
									
									background-color:rgba(0,0,0,0.7);
									height:100px;
									border-radius: 10px;
									margin-top:15px;
									
								  }
								  
								  .profilecomment{
	   
									   width:93%;
									   height:250px;
									   margin:0 auto;
									   margin-top:10px;
									   border:solid gray;
									   overflow:auto;
									  
									   border-radius:5px;
									   background-color:rgba(0,0,0,0.1);
									   
								   }
								  
								  
							}
								  
								  
							@media(min-width:992px) and (max-width:1199px){
	
								  body{
									  background-image:url(../image/hd3.jpg);
									  background-size:cover;
								  }
								  .wrapper{
									
									
									padding:15px;
									
								  }
								  
								  .header{
									
									background-color: rgba(0,0,0,0.7);
									height:100px;
									border-radius: 10px;
								  }
								  
								  .container{
									
									margin-top:15px;
									
								  }
								  .container::after{
									
									content:"";
									display:block;
									clear:both;
								  
								  }
								  .leftpanel{
									
									width:20%;
									float:left;
									
								  }
								  
								  .nav{
									
									margin-top:15px;
									background-color:rgba(0,0,0,0.7);
									height:400px;
									border-radius:10px;
									
								  }
								  .comment{
									margin-top:15px;
									background-color:rgba(0,0,0,0.7);
									height:200px;
									border-radius:10px;
									
								  }
								  
								  .content{
									
									margin-top:15px;
									background-color:rgba(0,0,0,0.7);
									height:615px;
									width:78.5%;
									border-radius:10px;
									float:right;
									/overflow:auto;
								   
								  }
								  
								  .footer{
									
									background-color:rgba(0,0,0,0.7);
									height:100px;
									border-radius: 10px;
									margin-top:15px;
									
								  }
								  
								   .profilecomment{
	   
									   width:93%;
									   height:250px;
									   margin:0 auto;
									   margin-top:10px;
									   border:solid gray;
									   overflow:auto;
									  
									   border-radius:5px;
									   background-color:rgba(0,0,0,0.1);
									   
								   }
							}
														
						</style>
					
						<title>';
						
						echo $_SESSION["event"][1]; echo'

						</title>
					
					<head>
					
					<body onmouseover="showlikes();showcomment();">
					
						<div class="wrapper" >
						
							<div class="header">
							
								<ul style="list-style:none">
								
									<li style="width:48%;float:left">
									
										<a href="response_showevent.php" style="line-height:100px;font-size:50px;">Details</a>
										
									</li>
									
									<li style="width:48%;float:left">
									
										<a href="show_image.php" style="margin-left:7.1%;line-height:100px;font-size:50px;background-color:green">Image</a>
									
									</li>
								
								</ul>
							
							</div>
							
							<div class="container">
							
								';
								
								require'showcasing_leftpanel.php';
								
								echo'
									<div class="content" style="height:590px;margin-bottom:15px">
									
										<img alt="image" src="';echo $_SESSION["event"][9];echo'" style="width:100%;height:100%;border-radius:15px"></img>
										
									</div>
								
								<div class="footer" style="text-align:center;color:#fff;line-height:100px;">
								
										';echo '<h1>Posted By :';echo $_SESSION["event"][10];echo '
								</div>
								
								</div>
						
						</body>
					
					</html>
				
				';
				
			}
			
		else
			
			header("LOCATION: card.php");
		
		
	


?>