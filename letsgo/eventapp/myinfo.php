<?php

	session_start();
	//var_dump($_SESSION);
	if(isset($_SESSION['my'])==false){
		header("Location: login.php");
	}
	
	
	unset($_SESSION['a']);
	
	
	
	$email="";
	$first="";
	$last="";
	$birthday="";
	$gender="";
	$image="";
	$target=$_SESSION['my'];
	
	require'../eventdata/userdata.php';
	
	$result=select_user($target);
	
	if($result){
		while($row=mysqli_fetch_assoc($result)){
		$email=$row['other_email'];
		$first=$row['first'];
		$last=$row['last'];
		$phone=$row['phone'];
		$birthday=strtotime($row['birthday']);
		$birthday=date("d-M-Y l",$birthday);
		$gender=$row['gender'];
		$image=$row['image'];
		//var_dump($image);
		//echo "<a href='delete.php?id=$row[id]'>delete</a><br/>";
		}
	}
	else
		echo "couldn't fetch";
					
?>

<html>

	<head>
	
		<meta charset="utf-8">
		<title>My Info</title>
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
							<li  style="background-color:green"><a href="myinfo.php">My info</a></li>
							<li><a href="postevent.php">Post new event</a></li>
							<li><a href="profile.php">Profile</a></li>
							<li><a href="user_mail.php">Mail</a></li>
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
					
					<div class="ppbox">
					
						<img id="img1" class="pp" style="height:100%" alt="upload your photo in edit" src="<?= $image . "?nocache=<" . time();?>"/>
						
						<div style="margin-top:-18px;">
						<label>
							<img src="../icon/cameral.png" style="width:70px;height:70px;margin-top:-30px;"/>
							<input name="mypic" id="img" type="file" onchange="change_image()" style="display:none"/>
						</label>
						</div>
						
					</div>
					
					<div class="infobox" style="font-size:20px;overflow-X:hide;overflow-Y:auto">
						
						<br/><br/>
						<?= "First name : ",$first?><br/><br/>
						<?= "Last name : ",$last?><br/><br/>
						<?= "Email : ",$email?><br/><br/>
						<?= "Phone : ",$phone?><br/><br/>
						<?= "Gender : ",$gender?><br/><br/>
						<?= "Birthday : ",$birthday?>
					
					</div>
					
				</div>
				
				
			</div>
			
			<div class="footer" style="text-align:center;color:#fff;font-size:50px;font-weight:bold;line-height:100px">
			
				Letsgo mail: <?=$_SESSION["my"]?>
			
			</div>
			
		</div>
		
	</body>
	
	<script>
	
		function change_image(){
		   
			var fileObj = document.getElementsByName("mypic")[0];
			
			var file = fileObj.files[0];
			
			var formdata = new FormData();
			
			formdata.append("mypic", file);
			
			req = new XMLHttpRequest();
			
			req.open("POST", "change_image_user.php", true);
			
			req.onreadystatechange = function(){
				
				if(req.readyState==4){
					
					var img = document.getElementById("img1");
					
					img.src = req.responseText;
					
					
				}
			}
			req.send(formdata);
		}
	
	</script>
	
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

