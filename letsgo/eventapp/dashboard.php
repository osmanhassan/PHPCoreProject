<?php

	session_start();
	//var_dump($_SESSION);
	if(isset($_SESSION['my'])==false){
		header("Location: login.php");
	}
	

	require'../eventdata/eventdata.php';
	require'../eventdata/userdata.php';
	
	$eresult=select_events_not_publisher($_SESSION['my']);
	
	
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
						
							<li   style="background-color:green"><a href="dashboard.php">Dashboard</a></li>
							<li><a href="myinfo.php">My info</a></li>
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
				
					<div style="width:100%;float:left;clear:both">
					
						<div style="width:60px;float:left">
						
							<a  href="#"style="border-radius:5px;"><img onclick="showsearch()" src="../icon/search.png" style="border-radius:5px;width:50px;height:50px"></img></a>
							
								<div id="search" style="display:none;width:200px">
								
									<form action="response_searched_by_name.php" method="post">
									
										<input type="text" name="search" placeholder="type event's name" style="height:30px;width:200px;margin-top:5px;padding-left:5px;border-radius:5px;margin-bottom:2px;"/>
										
										<input type="submit" name="submit" value="search"style="width:200px;height:35px;border-radius:10px;background-color:rgba(0,0,0,0.8);color:#fff;"/>
									
									</form>
								
								</div>
							
						</div>
						
						<div style="width:100px;float:left;border-radius:5px;text-style:none">
						
							<a onclick="showdropdown()"href="#"style="dispaly:block;background-color:black;float:left;line-height:40px;color:#fff;display:block; text-decoration:none;">
							<img  src="../icon/down.png" style=";background-color:black;float:right;width:30px;height:40px;margin-bottom:-5px"></img>Categories </a>
						
							<div style="width:100%;margin-left:0px">
							
								
								<ul id="dropdown" style="display:none;width:100%;margin:auto">
								
									<li><a href="show_movies.php">Movies </a></li>
										
									<li><a href="show_concerts.php">Concerts</a></li>
										
									<li><a href="show_culturals.php">Culturals</a></li>
										
									<li><a href="show_others.php">Others</a></li>
									
								</ul>
							
							</div>
							
						</div>
							
							
						<div style="width:60px;float:right;"><a href="#"style="border-radius:5px;"><img src="../icon/menu.png" onclick="showsidebar()"style="border-radius:5px;width:50px;height:50px"></img></a></div>
						
						
							<form id="sidebar" style="width:300px;float:right;color:#fff;display:none"action="response_combo_search.php" method="post">
									
									<fieldset style="margin:10px;border-radius:5px">

										<legend style="margin:auto">Search</legend>
											
											<fieldset style="margin:10px;padding:10px;border-radius:5px">

												<legend>select time</legend>

													<input style="width:40px" type="radio" name="time" value="tomorrow"/>Tomorrow<br/>
													<input style="width:40px" type="radio" name="time" value="next week"/>Next week<br/>
													<input style="width:40px" type="radio" name="time" value="next month"/>next month<br/>
											
											</fieldset>

											<p style="margin:10px;">Select a category of this event:</p>
											<select name="Category" style="margin:10px;width:260px;border-radius:10px;height:30px;border:0px;">
												<option></option>
												<option>Movie</option>
												<option>Concert</option>
												<option>Cultural</option>
												<option>Others</option>
											</select>

											<input type="submit" name="submit" value="Search" style="margin-left:100px;margin-top:10px;margin-bottom:10px;width:100px;height:30px;border-radius:10px;background-color:#fff">
									
									</fieldset>
								
								</form>
						
					</div>	
							
					<div style="height:100px">
					
					</div>
					
					
					<div style="width:100%;height:80%">
					
					
				<?php
					$i=0;
					while($row=mysqli_fetch_assoc($eresult)){
						$i++;
						echo'
					
					
				
					
					<div style="width:50%;background-color:#fff;margin:0 auto;margin-top:10px;text-align:center;font-size:40px;border-radius:5px;display:none" id="con';?><?=$i?><?php echo'">
						
						Are you confirm to delete:<br/>'; ?><?php echo $row["ename"];?><?php echo'
						<br/><br/>
						
						<input type = "button" value = "Ok" id = "ok';?><?=$i?><?php echo'" onclick="delete_confirm';?><?=$i?><?php echo '()" style="width:30%;font-size:20px;height:50px;border:solid gray 5px;margin-bottom:10px;border-radius:5px;color:#fff;background-color:#000"/>
						<input type = "button" value = "Cancel" id = "can';?><?=$i?><?php echo'" onclick="delete_cancel';?><?=$i?><?php echo '()" style="width:30%;font-size:20px;height:50px;border:solid gray 5px;margin-bottom:10px;border-radius:5px;color:#fff;background-color:#000"/>
						
					</div>
						
					<div class="profilecard" id="div';?><?=$i?><?='">
					
						<div class="profileheader">
						
							<img class="profileheader-image"src="';?><?php $im=publisherImage($row['publisher']);$imr=mysqli_fetch_row($im);echo $imr[0]. "?nocache=<" . time();?><?php echo'"></img>
							
							<a style="font-size:20px;font-weight:bold;line-height:50px;color:gray;">';?><?=$row["ename"]?><?php echo'</a><br/>
							<a style="font-size:15px;/font-weight:bold;line-height:10px;color:#fff;">Starts on : ';?><?php $et=strtotime($row['stime']); echo date("d-m-Y h:i A",$et);?><?php echo'</a>
							
							<input value="';if(!$row['likes']==0)echo $row['likes'];echo'" id="likes';?><?=$i?><?php echo '" style="font-size:15px;font-weight:bold;color:#000;margin-right:5px;background-color:#fff;width:80px;height:50px;text-align:center;float:right;margin-top:-40px;border-radius:5px"/>

							<input type="button" id="likeb';?><?=$i?><?php echo '" value="';?><?php $l=checkLikedBefore($row['eid'],$_SESSION['my'],"client_like");$lr=mysqli_fetch_row($l);if($lr[2]==$_SESSION['my'])echo "Liked";else echo"Like";?><?php echo'" onclick="like';?><?=$i?><?php echo '()" style="font-size:15px;margin-right:5px;font-weight:bold;color:#fff;background-color:rgba(0,0,0,0.9);width:80px;height:50px;float:right;margin-top:-40px;border-radius:5px"/>

						</div>
						
						<div class="profilebody">
							
							<form   class="postform" method="post" enctype="multipart/form-data" style="/width:100%">
							
							<label style="">
								<a style="background-color:#00cccc;border-radius:0px 10px 0px 0px">Choose new photo &nbsp &nbsp</a>
								<input type="file" name="mypic"style="display:none"/>
								<input type="hidden" name="ID" value="';?><?php echo $row['eid'];?><?php echo'">
								<input type="submit" value="change" style="border-radius:10px 10px 0px 0px">
								';?><?php if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['ID']) and $_POST['ID']==$row['eid']){ echo revalidate_image($row['ename'],$row['eid']);if($GLOBALS['isvalid_image']==true){move_uploaded_file($GLOBALS['e_temp_image'],$GLOBALS['eimage']);update_image($GLOBALS['eimage'],$row['eid']);header("LOCATION: profile.php");};}?><?php echo'
							</label>
							
							</form>
							
							<img class="profilebody-image"src="';?><?=$row["eimage"]?><?php echo'"style="margin-top:-19px;"></img>
						
						</div>
						
						<div class="profilefooter">
						
							<ul style="margin:0px;padding:0px;">
							
								<li class="profilefooter-button"><a id="h';?><?=$i?><?php echo'" href="#" class="profilefooter-buttona" onclick="showcomment';?><?php echo $i;?><?='( )'?><?= '"'?><?php echo'>Comments</a></li>
								
									
								
								<li class="profilefooter-button"><a id="det';?><?=$i?><?php echo'" href="#" class="profilefooter-buttona" onclick="showdetail';?><?php echo $i;?><?='( )'?><?= '"'?><?php echo'>Details</a></li>
							
							</ul>
						
						</div>
						
						
						<div class="profilecomment" style="color:#fff;text-align:center;font-size:30px" id="detailsp';?><?=$i?><?php echo'">
									
								venue :';?><?php echo$row['vanue'];?><?php echo'<br/><br/>
								
								category :';?><?php echo$row['category'];?><?php echo'<br/><br/>
								
								Endtime :';?><?php $et=strtotime($row['etime']); echo date("d-m-Y h:i A",$et);?><?php echo'<br/><br/>
								
								Description :<br/>';?><?php echo$row['description'];?><?php echo'<br/><br/>
								
								';?><?php if($row['tstatus']=="Yes"){echo "Ticket needed<br/><br/>Price: " . $row['price'] . "<br/>Ticket Booth: " . $row['booth'] . "<br/><br/>" ;}else echo"Ticket is not needed .<br/><br/>";?><?php echo'
								
								published By :';?><?php echo$row['publisher'];?><?php echo'<br/><br/>

								
						</div>
						
						<div class="profilecomment" id="comments';?><?=$i?><?php echo'">
									
								
						</div>
								
						<div>
							
												
							<br/><input id="c';?><?=$i?><?='" type="text" style="width:68%;box-shadow:4px 2px 1px gray;font-size:20px;border-radius:10px;background-color:#ffffcc;padding:10px;text-align:justify"/>
													
							<input type="button" onclick="postcomment';?><?=$i?><?php echo '()" name="submit" value="Post"style="width:30%;height:50px;font-size:20px;font-weight:bold;background-color:rgba(0,0,0,0.9);border-radius:10px;float:right;color:#fff"/><br/><br/>
												
							
									
						</div>
						
									
					</div>
					
						<script>
						
							function like';?><?=$i?><?php echo '(){
								
								var eid="';echo $row["eid"];echo'";
								
								var name="';echo $_SESSION["my"];echo'";
								
								var publisher="';echo $row["publisher"];echo'";
								
								
									
									var reqn=new XMLHttpRequest();
									
									var notification_type="client_like";
					
									reqn.open("GET","like.php?name="+name+"&eid="+eid+"&publisher="+publisher+"&notification_type="+notification_type,true);

									reqn.send();
									
									reqn.onreadystatechange=function(){
												
										if(reqn.readyState==4){
											
											document.getElementById("likes';?><?=$i?><?php echo '").value=reqn.responseText;

											document.getElementById("likeb';?><?=$i?><?php echo '").value="Liked";
												
										}
												
									}
									
												
							}
												
						</script>
						
						<script>
						
						
						';?><?php echo'count';?><?=$i?><?php echo'=0;
						
									function showcomment';?><?=$i?><?='(';?><?php echo') {
										
										
										
										if(';?><?='count'.$i?><?php echo'%2==0){
											document.getElementById("comments';?><?=$i?><?php echo'").style.display = ';?><?php echo'"block";
											document.getElementById("h';?><?=$i?><?php echo'").innerHTML="Hide Comments";
										}
										else{
											document.getElementById("comments';?><?=$i?><?php echo'").style.display = ';?><?php echo'"none";
											document.getElementById("h';?><?=$i?><?php echo'").innerHTML="Comments";
										
										}
										count';?><?=$i?><?php echo'++;
										
										var eid="';?><?php echo $row["eid"]?><?php echo'";
										var req=new XMLHttpRequest();
											
										req.open("GET","comment.php?eid="+eid,true);
			
			
										req.send();
										req.onreadystatechange=function(){
											
											if(req.readyState==4){
												
												var divobj=document.getElementById("comments';?><?=$i?><?php echo'");
												
												divobj.innerHTML=req.responseText;
												
										
											}
										}
									}
						</script>
						
						<script>';?><?php echo'
						
						
									
							function postcomment';?><?=$i?><?='() {
								
									//alert("1");
										
									var comments=document.getElementById("c';?><?=$i?><?='").value;
									var name="';?><?php echo $_SESSION["my"]?><?php echo'";
									var eid="';?><?php echo $row["eid"]?><?php echo'";
									var publisher="';?><?php echo $row["publisher"]?><?php echo'";
									
									//alert(eid);	
									if(comments!==""){
										
										document.getElementById("c';?><?=$i?><?='").value="";
										//alert(comments);	
										
										var req=new XMLHttpRequest();
										
										var notification_type="client_comment";
										
										req.open("GET","comment.php?comments="+comments+"&name="+name+"&eid="+eid+"&publisher="+publisher+"&notification_type="+notification_type,true);
			
			
										req.send();
										req.onreadystatechange=function(){
											
											if(req.readyState==4){
												
												var divobj=document.getElementById("comments';?><?=$i?><?php echo'");
												
												divobj.innerHTML=req.responseText;
												
												document.getElementById("comments';?><?=$i?><?php echo'").style.display = ';?><?php echo'"block";
												
												document.getElementById("h';?><?=$i?><?php echo'").innerHTML="Hide Comments";
												
												if(';?><?='count'.$i?><?php echo'%2==0)
													count';?><?=$i?><?php echo'++;
												
											}
											
										}		
											
										
									}
										
										
															
							}
									
								
						</script>
						
						
						<script>
						
						
									';?><?php echo'cud';?><?=$i?><?php echo'=0;
						
									function showdetail';?><?=$i?><?='(';?><?php echo'){
										
										
										
										if(';?><?='cud'.$i?><?php echo'%2==0){
											document.getElementById("detailsp';?><?=$i?><?php echo'").style.display = ';?><?php echo'"block";
											document.getElementById("det';?><?=$i?><?php echo'").innerHTML="Hide Details";
										}
										else{
											document.getElementById("detailsp';?><?=$i?><?php echo'").style.display = ';?><?php echo'"none";
											document.getElementById("det';?><?=$i?><?php echo'").innerHTML="Details";
										
										}
										cud';?><?=$i?><?php echo'++;
										
									}
										
										
						</script>
								
					';}
				?>	
				
				</div>
				
				</div>
			</div>
			
			<div class="footer" style="text-align:center;color:#fff;font-size:50px;font-weight:bold;line-height:100px">
			
				Letsgo mail: <?=$_SESSION["my"]?>
			
			</div>
			
		</div>
		
	</body>
	
	<script>
			count1=0;
			function showsearch() {
				if(count1%2==0)
					document.getElementById("search").style.display = "block";
				else
					document.getElementById("search").style.display = "none";
				count1++;
			}
			
	</script>
	
	<script>
			count=0;
			function showdropdown() {
				if(count%2==0)
					document.getElementById("dropdown").style.display = "block";
				else
					document.getElementById("dropdown").style.display = "none";
				count++;
			}
			
		</script>
	
	<script>
			count2=0;
			function showsidebar() {
				if(count2%2==0)
					document.getElementById("sidebar").style.display = "block";
				else
					document.getElementById("sidebar").style.display = "none";
				count2++;
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

