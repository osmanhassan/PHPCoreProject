<?php

	session_start();
	//var_dump($_SESSION);
	if(isset($_SESSION['my'])==false){
		header("Location: login.php");
	}
	
	
	
	$receiver = $_SESSION['my'];
	
	require'../eventdata/userdata.php';
	
	$result=selectReceiverMail($receiver);
	
?>

<html>

	<head>
	
		<meta charset="utf-8">
		<title>Mail</title>
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
							<li  style="background-color:green"><a href="user_mail.php">Mail</a></li>
							<li><a href="user_inbox.php">Inbox</a></li>
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
					
					<img src="../icon/menu.png" onclick="showEventlist()" style="width:50px;height:50px">
					
					<div id="eventlist" style="display:none;overflow:auto;width:40%;height:100%;background-color:#fff;color:#000;float:left;border-radius:10px 0 0 10px">
					
					
					
					<?php 
					
					$i=0;
					
					while($row = mysqli_fetch_assoc($result)){
						
						$i++;
						
						echo'
						
						<div onclick="appendMail';echo $i;echo'()" style="width:93%;margin:0 auto;margin-top:10px;background-color:rgba(0,0,0,0.5);color:#fff;border-radius:0 10px 0 10px;padding:10px">
								
							<div style="margin-top:-0.5px;padding-left:5px;overflow-X:hide;oveflow-Y:scroll">
								
								<a style="font-size:20px">';echo $row['sender']; echo'</a><br/>
								
								<a style="font-size:15px">About : ';echo $row['subject']; echo'</a><br/>

							</div>
						</div>
						
						<script>
						
							function appendMail';echo $i;echo'(){
								
								document.getElementById("to").value="';echo $row['sender'];echo'";
								
								document.getElementById("subject").value="';echo $row['subject'];echo'";
							}
						</script>
						
						';
						
						
						
						
					}
					
					?>
					</div>
					
					<div id="compose" style="height:91%;width:100%;float:right;background-color:#fff">
					
						<input id="to" name="to" placeholder="To :"style="width:100%;height:10%;font-size:20px;padding:10px"/>
						
						<input id="subject" name="subject" placeholder="Subject :"style="width:100%;height:10%;font-size:20px;padding:10px"/>
						
						<textarea id="text" name="text" placeholder="Content : "style="width:100%;height:70%;font-size:20px;padding:10px;text-align:justify"></textarea>
						
						<input type="button" id="send" onclick="sendEmail()" value="Send" style="width:33%;margin:0 33% 0 33%;color:#fff;background-color:#000;height:9%;font-size:20px"/>
					
					</div>
					
					<script>
						
						countEventlist=0;
						
						function showEventlist(){
							
							if(countEventlist%2==0){
								
								var obj=document.getElementById("eventlist");
								
								obj.style.display = "block";
								
								obj=document.getElementById("compose");
								
								obj.style.width = "58%";
								
								obj.style.height = "91%";
							}
							
							else{
								
								var obj=document.getElementById("eventlist");
								
								obj.style.display = "none";
								
								obj=document.getElementById("compose");
								
								obj.style.width = "100%";
								
								obj.style.height = "91%";
							}
							
							countEventlist+=1;
						}
					
					</script>
					
					<script>
					
						function sendEmail(){
							
							
							var toObj = document.getElementById("to");
							
							var sender = "<?=$_SESSION['my']?>";
							
							var subjectObj = document.getElementById("subject");
							
							var textObj = document.getElementById("text");
							
							if(subjectObj.value==="" && toObj.value !== "" && textObj.value !== ""){
								
								if(window.confirm("Sending without a subject may occur dificulties to find the email for the receipent.")==true){
									
									var formdata = new FormData();
									
									formdata.append("to",toObj.value);
									
									formdata.append("from",sender);
									
									formdata.append("subject",subjectObj.value);
									
									formdata.append("text",textObj.value);
									
									var xhr = new XMLHttpRequest();
									
									xhr.open("POST","send_email.php",true);
									
									xhr.onreadystatechange = function(){
				
										if(xhr.readyState==4){
											
											window.alert(xhr.responseText);
											
											toObj.value =
										
											textObj.value="";
											
										}
										
									}
									
									xhr.send(formdata);
									
								}
								
							}
							
							
							if(subjectObj.value!=="" && toObj.value !== "" && textObj.value !== ""){
								
								var formdata = new FormData();
								
								formdata.append("to",toObj.value);
								
								formdata.append("from",sender);
								
								formdata.append("subject",subjectObj.value);
								
								formdata.append("text",textObj.value);
								
								var xhr = new XMLHttpRequest();
								
								xhr.open("POST","send_email.php",true);
								
								xhr.onreadystatechange = function(){
			
									if(xhr.readyState==4){
										
										window.alert(xhr.responseText);
										
										toObj.value =
										subjectObj.value=
										textObj.value="";
										
										
									}
									
								}
								
								xhr.send(formdata);
									
							}
							
						}
					
					</script>
					
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

