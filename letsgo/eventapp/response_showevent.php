<?php

	ob_start();
	
	session_start();
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		$eid=$_POST["id"];
		
		require'header.php';
		
		require '../eventdata/eventdata.php';
	
		$result=select_id($eid); 
		
		if(!empty($result)){
			
			$row=mysqli_fetch_row($result);
			
			$_SESSION["event"]=$row;
			
			
			
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
									overflow:auto;
								   
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
								   #map {
										height: 50%;
									  }
									  /* Optional: Makes the sample page fill the window. */
									  html, body {
										height: 100%;
										margin: 0;
										padding: 0;
									  }
									  #floating-panel {
										position: absolute;
										top: 10px;
										left: 25%;
										z-index: 5;
										background-color: #fff;
										padding: 5px;
										border: 1px solid #999;
										text-align: center;
										font-family: "Roboto","sans-serif";
										line-height: 30px;
										padding-left: 10px;
									  }
									  #floating-panel {
										position: absolute;
										top: 5px;
										left: 50%;
										margin-left: -180px;
										width: 350px;
										z-index: 5;
										background-color: #fff;
										padding: 5px;
										border: 1px solid #999;
									  }
									  #latlng {
										width: 225px;
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
									overflow:auto;
								   
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
								   
								   #map {
										height: 50%;
									  }
									  /* Optional: Makes the sample page fill the window. */
									  html, body {
										height: 100%;
										margin: 0;
										padding: 0;
									  }
									  #floating-panel {
										position: absolute;
										top: 10px;
										left: 25%;
										z-index: 5;
										background-color: #fff;
										padding: 5px;
										border: 1px solid #999;
										text-align: center;
										font-family: "Roboto","sans-serif";
										line-height: 30px;
										padding-left: 10px;
									  }
									  #floating-panel {
										position: absolute;
										top: 5px;
										left: 50%;
										margin-left: -180px;
										width: 350px;
										z-index: 5;
										background-color: #fff;
										padding: 5px;
										border: 1px solid #999;
									  }
									  #latlng {
										width: 225px;
									  }
							}
														
						</style>
					
						<title>';
						
						echo $_SESSION["event"][1];echo'

						</title>
					
					<head>
					
					<body onmouseover="showlikes();showcomment();">
					
						<div class="wrapper">
						
							<div class="header">
							
								<ul style="list-style:none">
								
									<li style="width:48%;float:left">
									
										<a href="#" style="line-height:100px;font-size:50px;background-color:green">Details</a>
										
									</li>
									
									<li style="width:48%;float:left">
									
										<a href="show_image.php" style="margin-left:7.1%;line-height:100px;font-size:50px">Image</a>
									
									</li>
								
								</ul>
							
							</div>
							
							<div class="container">
							
								
								';
								
								require'showcasing_leftpanel.php';
								
								echo'
								
								<div class="content" style="text-align:center;color:#fff;line-height:100px">
								
								
									<h1>Name :';echo $_SESSION["event"][1];echo'</h1>
									
									<h1>Type :';echo $_SESSION["event"][13];echo'</h1>
									
									<h1>Vanue :'; echo $_SESSION["event"][2]; echo'</h1>
									
									
									<div >
									  <input id="latlng" type="text" style="display:none" value="';echo $_SESSION["event"][3] . "," . $_SESSION["event"][4]; echo'">
									 
									</div>
									<div id="map" style="color:black;width 80%;margin:auto;font-weight:bold"></div>
									<script>
									  function initMap() {
										var map = new google.maps.Map(document.getElementById("map"), {
										  zoom: 17,
										  center: {lat: 23.8103, lng: 90.4125}
										});
										var geocoder = new google.maps.Geocoder;
										var infowindow = new google.maps.InfoWindow;

										
										  geocodeLatLng(geocoder, map, infowindow);
										
									  }

									  function geocodeLatLng(geocoder, map, infowindow) {
										var input = document.getElementById("latlng").value;
										var latlngStr = input.split(",", 2);
										var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
										geocoder.geocode({"location": latlng}, function(results, status) {
										  if (status === "OK") {
											if (results[0]) {
											  map.setZoom(17);
											  var marker = new google.maps.Marker({
												position: latlng,
												map: map
											  });
											  infowindow.setContent(results[0].formatted_address);
											  infowindow.open(map, marker);
											} else {
											  window.alert("No results found");
											}
										  } else {
											window.alert("Geocoder failed due to: " + status);
										  }
										});
									  }
									</script>
									<script async defer
									src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADw4iwBKtlOCZ7SCWQfAV7er3Oldf93LI&callback=initMap">
									</script>
									
									
									
									
									<h1>Starts on :';$time1=strtotime($_SESSION["event"][7]);$time1=date("d-m-Y h:i A",$time1);echo $time1;echo'</h1>
									
									<h1>Ends on :';$time2=strtotime($_SESSION["event"][8]);$time2=date("d-m-Y h:i A",$time2);echo $time2;echo'</h1>';
									
									
									
									if($_SESSION["event"][11]=="Yes"){
										
										echo'<h1>Ticket Price :';echo $_SESSION["event"][12];echo'</h1>';
										
										echo'<h1>Ticket Booths :';echo $_SESSION["event"][14];echo'</h1>';
										
									}
									
									else{
										
										
										echo '<h1>Ticket is not needed.</h1>';
									}
								
									
									echo '<h1>Details :<br/>';echo $_SESSION["event"][5];echo'</h1>
								</div>
								
								</div>
							
							<div class="footer" style="text-align:center;color:#fff;line-height:100px">
							
									';echo '<h1>Posted By :';echo $_SESSION["event"][10];echo '
							</div>
							
							</div>
					
					</body>
				
				</html>
			
			';
			
		}
		
		
	}
	
	else{
		
		
		
		if(isset($_SESSION["event"])){
			
			require'header.php';
			
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
									overflow:auto;
								   
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
								  #map {
									height: 50%;
								  }
								  /* Optional: Makes the sample page fill the window. */
								  html, body {
									height: 100%;
									margin: 0;
									padding: 0;
								  }
								  #floating-panel {
									position: absolute;
									top: 10px;
									left: 25%;
									z-index: 5;
									background-color: #fff;
									padding: 5px;
									border: 1px solid #999;
									text-align: center;
									font-family: "Roboto","sans-serif";
									line-height: 30px;
									padding-left: 10px;
								  }
								  #floating-panel {
									position: absolute;
									top: 5px;
									left: 50%;
									margin-left: -180px;
									width: 350px;
									z-index: 5;
									background-color: #fff;
									padding: 5px;
									border: 1px solid #999;
								  }
								  #latlng {
									width: 225px;
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
									overflow:auto;
								   
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
								   
								   #map {
									height: 50%;
								  }
								  /* Optional: Makes the sample page fill the window. */
								  html, body {
									height: 100%;
									margin: 0;
									padding: 0;
								  }
								  #floating-panel {
									position: absolute;
									top: 10px;
									left: 25%;
									z-index: 5;
									background-color: #fff;
									padding: 5px;
									border: 1px solid #999;
									text-align: center;
									font-family: "Roboto","sans-serif";
									line-height: 30px;
									padding-left: 10px;
								  }
								  #floating-panel {
									position: absolute;
									top: 5px;
									left: 50%;
									margin-left: -180px;
									width: 350px;
									z-index: 5;
									background-color: #fff;
									padding: 5px;
									border: 1px solid #999;
								  }
								  #latlng {
									width: 225px;
								  }
							}
														
						</style>
					
						<title>';
						
						echo $_SESSION["event"][1];echo'

						</title>
					
					<head>
					
					<body onmouseover="showlikes();showcomment();">
					
						<div class="wrapper">
						
							<div class="header">
							
								<ul style="list-style:none">
								
									<li style="width:48%;float:left">
									
										<a href="#" style="line-height:100px;font-size:50px;background-color:green">Details</a>
										
									</li>
									
									<li style="width:48%;float:left">
									
										<a href="show_image.php" style="margin-left:7.1%;line-height:100px;font-size:50px">Image</a>
									
									</li>
								
								</ul>
							
							</div>
							
							<div class="container">
							
								';
								
								require'showcasing_leftpanel.php';
								
								echo'
								
								<div class="content" style="text-align:center;color:#fff;height:590px;line-height:100px">
								
								
									<h1>Name :';echo $_SESSION["event"][1];echo'</h1>
									
									<h1>Type :';echo $_SESSION["event"][11];echo'</h1>
									
									<h1>Vanue :';echo $_SESSION["event"][2];echo'</h1>
									
									
									<div>
									  <input id="latlng" type="text" style="display:none" value="';echo $_SESSION["event"][3] . "," . $_SESSION["event"][4]; echo'">
									 
									</div>
									<div id="map" style="color:black;width 80%;margin:auto;font-weight:bold"></div>
									<script>
									  function initMap() {
										var map = new google.maps.Map(document.getElementById("map"), {
										  zoom: 17,
										  center: {lat: 23.8103, lng: 90.4125}
										});
										var geocoder = new google.maps.Geocoder;
										var infowindow = new google.maps.InfoWindow;

										
										  geocodeLatLng(geocoder, map, infowindow);
										
									  }

									  function geocodeLatLng(geocoder, map, infowindow) {
										var input = document.getElementById("latlng").value;
										var latlngStr = input.split(",", 2);
										var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
										geocoder.geocode({"location": latlng}, function(results, status) {
										  if (status === "OK") {
											if (results[0]) {
											  map.setZoom(17);
											  var marker = new google.maps.Marker({
												position: latlng,
												map: map
											  });
											  infowindow.setContent(results[0].formatted_address);
											  infowindow.open(map, marker);
											} else {
											  window.alert("No results found");
											}
										  } else {
											window.alert("Geocoder failed due to: " + status);
										  }
										});
									  }
									</script>
									<script async defer
									src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADw4iwBKtlOCZ7SCWQfAV7er3Oldf93LI&callback=initMap">
									</script>
									
									<h1>Starts on :';$time1=strtotime($_SESSION["event"][5]);$time1=date("d-m-Y h:i A",$time1);echo $time1;echo'</h1>
									
									<h1>Ends on :';$time2=strtotime($_SESSION["event"][6]);$time2=date("d-m-Y h:i A",$time2);echo $time2;echo'</h1>';
									
									
									
									if($_SESSION["event"][9]=="Yes"){
										
										echo'<h1>Ticket Price :';echo $_SESSION["event"][10];echo'</h1>';
										
										echo'<h1>Ticket Booths :';echo $_SESSION["event"][12];echo'</h1>';
										
									}
									
									else{
										
										
										echo '<h1>Ticket is not needed.</h1>';
									}
								
									
									echo '<h1>Details :<br/>';echo $_SESSION["event"][3];echo'</h1>
								</div>
								
								</div>
							
							<div class="footer" style="text-align:center;color:#fff;line-height:100px">
							
									';echo '<h1>Posted By :';echo $_SESSION["event"][8];echo '
							</div>
							
							</div>
					
					</body>
				
				</html>
			
			';
			
			
		}
		
		else
			
			header("LOCATION: card.php");
		
	}


?>