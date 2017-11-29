
<?php

	session_start();
	
	if(isset($_SESSION['my'])==false){
		
		header("Location: login.php");
		
	}
	
	
	
	
	
	require '../eventservice/posteventservice.php';
	
	ob_start();
	

?>

<html>

	<head>
	
		<meta charset="utf-8">
		<title>profile</title>
		
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
							<li  style="background-color:green"><a href="profile.php">Profile</a></li>
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
				
					
					<div id="form" style="display:none">
				
					<form   class="postform" method="post" enctype="multipart/form-data" style="width:100%">
							
						
							
							<br/><br/>
							
							
							<div style="margin:auto;width:37%">
							
								eid<textarea id="eventid" name="eventid" style="display:none"></textarea>
							
								Event Name<br/><textarea id="name" rows="1" name="name" class="input" ><?php if($_SERVER['REQUEST_METHOD']=="POST")echo$_POST['ename'];?></textarea><br/><br/>
								
								<span><?=validate_name()?></span><br/><br/>
								
								Vanue<br/><textarea id="vanue" rows="1" name="vanuename"class="input"></textarea><br/><br/>
								
								<span><?=validate_vanuename()?></span><br/><br/>
								
								<fieldset style="border-radius:5px;">
								
									<legend style="margin:auto">Schedule</legend>
								
									Starting Time<br/><textarea id="stime" placeholder="dd-mm-yyyy h:mPM/AM" name="starttime" class="input" ></textarea><br/><br/>
									
									<span><?=validate_starttime()?></span><br/><br/>
									
									Ending Time<br/><textarea id="etime" placeholder="dd-mm-yyyy h:mPM/AM" name="endtime" class="input" ></textarea><br/><br/>
									
									<span><?=validate_endtime()?></span><br/><br/>
									
								</fieldset><br/><br/>
									
								<span><?=validate_schedule()?></span><br/><br/>
									
								Select a category of this event:<br/>
								<select name="category" id="category" class="input" />
									<option id="category1"></option>
									<option >Movie</option>
									<option >Concert</option>
									<option >Cultural</option>
									<option >Others</option>
								</select>
								<br/><br/>
								
								<span><?php if(validate_category()=="* You have to select a category of event.") echo validate_category();?></span><br/><br/>
								
								Description
								<textarea id="description" class="input"name="description" rows="4" style="height:200px" ></textarea><br/><br/>
								
								<span><?=validate_description()?></span><br/><br/>
								
							</div>
							
							<div style="margin:15px 15px 15px 15px">
								<fieldset style="border-radius:5px">
									<legend style="margin:auto">Ticket info</legend>
									
									Does this event Require tiecket?<br/>
									<input type="radio"  id="yes" name="ticketstatus" value="Yes"/>&nbsp Yes<br/>
									<input type="radio" id="no" name="ticketstatus" value="No"/>&nbsp No<br/>
									<br/>
									<fieldset style="border-radius:5px">
									<legend>If ticket is required:</legend>
								
									Type per ticket price in Tk.<br/>
									
									<textarea id="price" class="input" name="ticketprice"  style="width:300px"></textarea><br/><br/>
									
									<span><?=validate_ticketprice()?></span><br/><br/>
									
									Type ticket booth location if there any: <br/>
									
									<textarea id="booth" class="input" name="booth"  style="width:300px"></textarea><br/><br/>
									
									<span><?php echo validate_booth();?></span><br/><br/>
								</fieldset>
								</fieldset>
							</div>
							<input type="submit" name="post" value="Edit"class="input" style="width:100px;background-color:rgba(0,0,0,0.9);color:#fff;margin-left:30%;"/>
							
							<a href="profile.php" class="input" style="width:120px;background-color:rgba(0,0,0,0.9);color:#fff;margin-left:20px;text-decoration:none;border:solid #fff ">Cancel</a><br/>

							<span><?php if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['eventid'])) update($_POST['eventid']);?></span>
							
					</form>
				
				</div>
				
				
				
				
				
				
				
				
				
				
				
					<?php 
					//$result=fetch_profile($_SESSION["my"]);
					$result=fetch_profile($_SESSION["my"]);
					
					$i=0;
					while($row=mysqli_fetch_assoc($result)){
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
							<a style="font-size:15px;/font-weight:bold;line-height:10px;color:#fff;">Starts on : ';?><?php $st=strtotime($row["stime"]);echo date("d-m-Y h:i A",$st);?><?php echo'</a>
							
							<input type="button" value="Delete" id="del';?><?=$i?><?php echo'"onclick="delete_event';?><?=$i?><?php echo '()" style="font-size:15px;font-weight:bold;color:#fff;background-color:rgba(0,0,0,0.9);width:80px;height:50px;float:right;margin-top:-20px;border-radius:5px"/>
							
							
							<input type="button" value="Edit" id="edit';?><?=$i?><?php echo'" onclick="edit_event';?><?=$i?><?php echo '()" style="font-size:15px;font-weight:bold;color:#fff;background-color:rgba(0,0,0,0.9);width:80px;height:50px;float:right;margin-top:-20px;margin-right:5px;border-radius:5px"/>

						</div>
						
						<div class="profilebody">
							
							<form   class="postform" method="post" enctype="multipart/form-data" style="margin-top:5px;margin-bottom:20px;/width:100%">
							
							<label style="">
								<a style="background-color:#00cccc;border-radius:0px 10px 0px 0px">Choose new photo &nbsp &nbsp</a>
								<input type="file" name="mypic"style="display:none"/>
								<input type="hidden" name="ID" value="';?><?php echo $row['eid'];?><?php echo'">
								<input type="submit" value="change" style="border-radius:10px 10px 0px 0px">
								';?><?php if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['ID']) and $_POST['ID']==$row['eid']){ echo revalidate_image($row['ename'],$row['eid']);if($GLOBALS['isvalid_image']==true){move_uploaded_file($GLOBALS['e_temp_image'],$GLOBALS['eimage']);update_image($GLOBALS['eimage'],$row['eid']);header("LOCATION: profile.php");};}?><?php echo'
							</label>
							
							</form>
							
							<img class="profilebody-image"src="';?><?=$row["eimage"]. "?nocache=<" . time()?><?php echo'"style="margin-top:-19px;"></img>
						
						</div>
						
						<div class="profilefooter">
						
							<ul style="margin:0px;padding:0px;">
							
								<li class="profilefooter-button"><a id="h';?><?=$i?><?php echo'" href="#" class="profilefooter-buttona" onclick="showcomment';?><?php echo $i;?><?='( )'?><?= '"'?><?php echo'>Comments</a></li>
								
									
								
								<li class="profilefooter-button"><a id="det';?><?=$i?><?php echo'" href="#" class="profilefooter-buttona" onclick="showdetail';?><?php echo $i;?><?='( )'?><?= '"'?><?php echo'>Details</a></li>
							
							</ul>
						
						</div>
						
						
						<div class="profilecomment" style="color:#fff;text-align:center;font-size:30px" id="detailsp';?><?=$i?><?php echo'">
									
								vanue :';?><?php echo$row['vanue'];?><?php echo'<br/><br/>
								
								category :';?><?php echo$row['category'];?><?php echo'<br/><br/>
								
								Endtime :';?><?php $et=strtotime($row['etime']); echo date("d-m-Y h:i A",$et);?><?php echo'<br/><br/>
								
								Description :<br/>';?><?php echo$row['description'];?><?php echo'<br/><br/>
								
								';?><?php if($row['tstatus']=="Yes"){echo "Ticket needed<br/><br/>Price: " . $row['price'] . "<br/>Ticket Booth: " . $row['booth'] . "<br/><br/>" ;}else echo"Ticket is not needed .<br/><br/>";?><?php echo'
								
						</div>
						
						<div class="profilecomment" id="comments';?><?=$i?><?php echo'">
									
								
						</div>
								
						<div>
							
												
							<br/><input id="c';?><?=$i?><?='" type="text" style="width:68%;box-shadow:4px 2px 1px gray;font-size:20px;border-radius:10px;background-color:#ffffcc;padding:10px;text-align:justify"/>
													
							<input type="button" onclick="postcomment';?><?=$i?><?php echo '()" name="submit" value="Post"style="width:30%;height:50px;font-size:20px;font-weight:bold;background-color:rgba(0,0,0,0.9);border-radius:10px;float:right;color:#fff"/><br/><br/>
												
							
									
						</div>
						
									
					</div>
					
					
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
									var publisher="';?><?php echo $_SESSION["my"]?><?php echo'";
									
									//alert(eid);	
									if(comments!==""){
										
										document.getElementById("c';?><?=$i?><?='").value="";
										//alert(comments);	
										
										var req=new XMLHttpRequest();
										
										var notification_type="publisher_comment";
										
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
						
							function delete_event';?><?=$i?><?='(){
								
								
								document.getElementById("con';?><?=$i?><?php echo'").style.display="block";
								
								
							}
						
						</script>
						
						<script>
						
							function delete_confirm';?><?=$i?><?php echo '(){
								
								var eid="';?><?php echo $row["eid"]?><?php echo'";
								
								var req=new XMLHttpRequest();
											
								req.open("POST","delete_event.php?eid="+eid,true);
			
			
								req.send("delete_event.php?eid="+eid);
								req.onreadystatechange=function(){
											
									if(req.readyState==4){
										
										document.getElementById("con';?><?=$i?><?php echo'").style.display="none";
										document.getElementById("div';?><?=$i?><?php echo'").style.display="none";
											
									}
											
								}	
								
							}
						
						</script>
						
						<script>
						
							function delete_cancel';?><?=$i?><?php echo '(){
								
								document.getElementById("con';?><?=$i?><?php echo'").style.display="none";
								
							}
						
						</script>
						
						<script>
							
							';?><?php echo'Divx';?><?=$i?><?php echo';
								
							';?><?php echo'Divy';?><?=$i?><?php echo';
							
							';?><?php echo'Divz';?><?=$i?><?php echo';
							
							function edit_event';?><?=$i?><?='(){
								
								
								
								';?><?php echo'Divx';?><?=$i?><?php echo'=document.getElementById("form");
								
								
								
								
								
								';?><?php echo'Divy';?><?=$i?><?php echo'=document.getElementById("div';?><?=$i?><?php echo'");
								
								';?><?php echo'Divz';?><?=$i?><?php echo'=document.getElementById("div';?><?=$i?><?php echo'");
								
								document.getElementById("eventid").innerHTML="';?><?=$row['eid']?><?php echo'";
								
								document.getElementById("name").innerHTML="';?><?=$row['ename']?><?php echo'";
								
								document.getElementById("vanue").innerHTML="';?><?=$row['vanue']?><?php echo'";
								
								document.getElementById("stime").innerHTML="';?><?=$row['stime']?><?php echo'";
								
								document.getElementById("etime").innerHTML="';?><?=$row['etime']?><?php echo'";
								
								document.getElementById("category1").innerHTML="';?><?=$row['category']?><?php echo'";
								
								document.getElementById("description").innerHTML="';?><?=$row['description']?><?php echo'";
								
								document.getElementById("price").innerHTML="';?><?=$row['price']?><?php echo'";
								
								document.getElementById("booth").innerHTML="';?><?=$row['booth']?><?php echo'";
								
								document.getElementById("yes").checked="';?><?php  if($row['tstatus']=="Yes") {echo "true";} ?><?php echo'";
								
								';?><?php echo'Divy';?><?=$i?><?php echo'.innerHTML=';?><?php echo'Divx';?><?=$i?><?php echo'.innerHTML;
								
								
								
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
								
					';}?>
					
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


