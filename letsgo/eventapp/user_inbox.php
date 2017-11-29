<?php

	session_start();
	
	if(isset($_SESSION['my'])==false){
		header("Location: login.php");
	}
	
	
	
	$sender = $_SESSION['my'];
	
	require'../eventdata/userdata.php';
	
	$result=selectReceiverMail($sender);
	
?>

<html>

	<head>
	
		<meta charset="utf-8">
		<title>Inbox </title>
		<link rel="stylesheet"type="text/css"href="event.css">
		
	</head>
	
	
	<body>
	
		<div class="wrapper"> 
		
			<div class="header" onmouseover="setActivity()">
			
				<?php include'eheader.php';?>
			
			</div>
			
			<div class="container">
			
				<div class="leftpanel">
				
					<div class="nav" style="height:400px;">
					
						<ul>
						
							<li><a href="dashboard.php">Dashboard</a></li>
							<li><a href="myinfo.php">My info</a></li>
							<li><a href="postevent.php">Post new event</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="user_mail.php">Mail</a></li>
							<li  style="background-color:green"><a href="user_inbox.php">Inbox</a></li>
							<li><a href="user_sentbox.php">Sentbox</a></li>
						</ul>
					
					</div>
					
					<div class="comment" style="height:200px;text-align:center">
						
						<div  style="position:relative;width:30px;height:30px;margin:0 auto;top:10px">
						
							<img onclick="show_notification()" src="../icon/notification.png" style="width:100%;height:100%" alt="notification-logo">
							
							<a id="noti" style="color:#fff;font-size:30px;position:absolute;top:-15px;left:20px"></a>
							
						</div>
						
						
						<div id="notis"  style="display:none;width:93%;height:150px;border:solid #fff;border-radius:5px;margin:auto;overflow:auto;">
						
							
						
						</div>
						
					</div>
					
					
					
					
					<script>
						
						function callme(){
							    
								
								var reqn=new XMLHttpRequest();
								
								var v="<?=$_SESSION['my']?>";
								
								type = "comment_notification";
								
								reqn.open("GET","send_notification.php?publisher="+v+"&type="+type,true);

								reqn.send();
								
								reqn.onreadystatechange=function(){
											
									if(reqn.readyState==4){
										
										document.getElementById("noti").innerHTML=reqn.responseText;

										document.getElementById("notis").style.display="none";
											
									}
											
								}	
						}

						
				</script>

				<script>
						
						count_noti=0;
						
						
						function show_notification(){
							    
								count_noti++;
								
								if(count_noti%2==1){
									
									var req=new XMLHttpRequest();
									
									var v="<?=$_SESSION['my']?>";
									
									req.open("GET","show_notification.php?publisher="+v,true);

									req.send();
									
									req.onreadystatechange=function(){
												
										if(req.readyState==4){
											
											document.getElementById("notis").innerHTML=req.responseText;

											document.getElementById("notis").style.display="block";
												
										}
												
									}
								
								}
								
								else{
									
									document.getElementById("notis").style.display="none";
									
								}
								
						}

						
				</script>
					
				</div>
				
				<div class="content" onmouseover="callme()">
					
					<div id="eventlist" style=";overflow:auto;width:40%;height:100%;background-color:rgba(0,0,0,0.3);color:#000;float:left;border-radius:10px 0 0 10px">
					
					
					
					<?php 
					
					$i=0;
					
					while($row = mysqli_fetch_assoc($result)){
						
						$i++;
						
						echo'
						
						<div onclick="showMail';echo $i;echo'()" style="width:93%;margin:0 auto;margin-top:10px;background-color:green;color:#fff;border-radius:0 10px 0 10px;padding:10px">
							
							<a style="font-size:20px">Received from :';echo $row['sender']; echo'</a><br/>
							
							<a style="font-size:15px">Subject : ';echo $row['subject']; echo'</a><br/>
							
							<a style="font-size:15px">On : ';$sendingTime=strtotime($row['sending_time']);echo date("d-m-Y h:i A",$sendingTime+6*3600); echo'</a><br/>
							
						</div>
						
						<script>
						
							function showMail';echo $i;echo'(){
								
								document.getElementById("sentMail").innerHTML="';echo $row['content'];echo'";
								
								document.getElementById("sentMail").style.display="block";
							}
							
						</script>
						
						';
						
						
						
						
					}
					
					?>
					</div>
					
					<div  style="height:100%;width:59%;float:right;background-color:rbga(0,0,0,0.3);color:#000;overflow:auto">
					
						<div id="sentMail" style="width:90%;margin:0 auto;display:none;margin-top:33%;border-radius: 20px 5px 20px 5px ;background-color:rgba(0,0,0,0.2);border:solid green;color:#fff;padding:10px;font-size:20px;text-align:justify">
						
							
						
						</div>
						
					</div>
					
				</div>
				
				
			</div>
			
			<div class="footer" style="text-align:center;color:#fff;font-size:50px;font-weight:bold;line-height:100px">
			
				Letsgo mail: <?=$_SESSION["my"]?>
			
			</div>
			
		</div>
		
	</body>
	
	<script>
	
		function setActivity(){
			
			var req = new XMLHttpRequest();
			
			var formdata = new FormData();
			
			var activeas="user";
			formdata.append("activeas",activeas );
			
			req.open("POST","activity.php",true);
			
			req.send(formdata);
			
			req.onreadystatechange = function(){
				
				if(req.readyState==4){
					
					
					
				}
			}
			
			
		}
	
	</script>
	
	<script>
					
		function changePass(){
			
							
			var req = new XMLHttpRequest();
			
			var formdata = new FormData();
			
			var prepass=document.getElementById("prepass").value;
			
			var newpass=document.getElementById("newpass").value;
			
			if(prepass!=="" && newpass!==""){
					
				var user = "<?=$_SESSION['my']?>";
				
				formdata.append("prepass",prepass);
				
				formdata.append("newpass",newpass);
				
				formdata.append("user",user);
				
				req.open("POST","changepassword.php",true);
				
				req.send(formdata);
				
				req.onreadystatechange = function(){
					
					if(req.readyState==4){
						
						document.getElementById("passerror").innerHTML=req.responseText;
						
						document.getElementById("prepass").value="";
						
						document.getElementById("newpass").value="";
					}
				}
			
			}
			
			else{
				
				alert("* Booth Previous password and New Pass word are required");

			}
		}
	
	</script>
	
</html>

