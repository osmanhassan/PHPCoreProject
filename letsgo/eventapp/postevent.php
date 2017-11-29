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
    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
		width:60%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
		width:80%;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 20px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
		height:50px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
    </style>
  </head>
  <body>
    

    
  </body>

  

	<head>
	
		<meta charset="utf-8">
		<title>Post</title>
		
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
							<li   style="background-color:green"><a href="postevent.php">Post new event</a></li>
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
				
						<form class="postform" method="post" style="width:100%;font-size:20px">
							
							<div style="margin:auto;width:80%;text-align:center">
							
								Event Name<br/><input id="eventName" type="text" name="name" class="input"value="<?php if($_SERVER['REQUEST_METHOD']=="POST")echo $_POST['name'];?>"/><br/><br/>
								
								<span><?=validate_name()?></span><br/><br/>
								
								<div class="pac-card" id="pac-card">
	
							  <div>
							  
								<div id="title">
								 Type the venue here
								</div>
								
								<div id="type-selector" class="pac-controls">
								  <input type="radio" name="type" id="changetype-all" checked="checked">
								  <label for="changetype-all" style="color:#000">All</label>

								  <input type="radio" name="type" id="changetype-establishment">
								  <label for="changetype-establishment" style="color:#000">Establishments</label>

								  <input type="radio" name="type" id="changetype-address">
								  <label for="changetype-address" style="color:#000">Addresses</label>

								  <input type="radio" name="type" id="changetype-geocode">
								  <label for="changetype-geocode" style="color:#000">Geocodes</label>
								</div>
								<div id="strict-bounds-selector" class="pac-controls">
								  <input type="checkbox" id="use-strict-bounds" value="">
								  <label for="use-strict-bounds" style="color:#000">Strict Bounds</label>
								</div>
							  </div>
							  <div id="pac-container">
							  <input type="hidden" id="lat" name="lat">
							  <input type="hidden" id="lng" name="lng">
								<input id="pac-input" type="text"
									name= "vanuename" placeholder="Enter the venue">
							  </div>
							</div>
							<div id="map" style="width:100%"></div>
							<div id="infowindow-content">
							  <img src="" width="16" height="16" id="place-icon">
							  <span id="place-name"  class="title"></span><br>
							  <span id="place-address"></span>
							</div>
								

						
								<span><?=validate_vanuename()?></span><br/><br/>
								
								<fieldset style="border-radius:5px;padding:30px">
								
									<legend style="margin:auto">Schedule</legend>
								
									Starting Time<br/><input type="datetime-local" placeholder="dd-mm-yyyy h:mPM/AM" name="starttime" class="input" value="<?php if($_SERVER['REQUEST_METHOD']=="POST")echo$_POST['starttime'];?>"/><br/><br/>
									
									<span><?=validate_starttime()?></span><br/><br/>
									
									Ending Time<br/><input type="datetime-local" placeholder="dd-mm-yyyy h:mPM/AM" name="endtime" class="input" value="<?php if($_SERVER['REQUEST_METHOD']=="POST")echo$_POST['endtime'];?>"/><br/><br/>
									
									<span><?=validate_endtime()?></span><br/><br/>
									
								</fieldset><br/><br/>
									
								<span><?=validate_schedule()?></span><br/><br/>
									
								Select a category of this event:<br/>
								<select name="category" id="category" class="input" />
									<option ><?php if($_SERVER['REQUEST_METHOD']=="POST" and !empty($_POST['category']))echo validate_category();?></option>
									<option >Movie</option>
									<option >Concert</option>
									<option >Cultural</option>
									<option >Others</option>
								</select>
								<br/><br/>
								
								<span><?php if(validate_category()=="* You have to select a category of event.") echo validate_category();?></span><br/><br/>
								
								Description
								<textarea class="input"name="description" rows="4" style="height:200px;width:100%" ><?php if($_SERVER['REQUEST_METHOD']=="POST")echo$_POST['description'];?></textarea><br/><br/>
								
								<span><?=validate_description()?></span><br/><br/>
								
							</div>
							
							<div style="margin:15px 15px 15px 15px">
								<fieldset style="border-radius:5px;padding:30px">
									<legend style="margin:auto">Ticket info</legend>
									
									Does this event Require tiecket?<br/>
									<input type="radio" style="width:20px;height:20px;" name="ticketstatus" value="Yes"/><a style="font-size:25px"> Yes</a><br/>
									<input type="radio" style="width:20px;height:20px;" name="ticketstatus" value="No"/><a style="font-size:25px"> No</a><br/>
									<br/>
									<fieldset style="border-radius:5px;padding:30px;">
									<legend>If ticket is required:</legend>
								
									Type per ticket price in Tk.<br/>
									
									<input class="input" type="text" name="ticketprice" value="<?php if($_SERVER['REQUEST_METHOD']=="POST")echo$_POST['ticketprice'];?>" style="width:300px"/><br/><br/>
									
									<span><?=validate_ticketprice()?></span><br/><br/>
									
									Type ticket booth location if there any: <br/>
									
									<input class="input" type="text" name="booth" value="<?php if($_SERVER['REQUEST_METHOD']=="POST")echo$_POST['booth'];?>"  style="width:300px"/><br/><br/>
									
									<span><?php echo validate_booth();?></span><br/><br/>
								</fieldset>
								</fieldset>
							</div>
							<?php?><input type="submit"  name="post" value="post event"class="input" style="background-color:rgba(0,0,0,0.9);color:#fff;margin-left:35%;"/>
							<span><?php if(insert()==1){header("Location: profile.php");}?></span>
							
					</form>
					
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
	
	<script>
	  // This example requires the Places library. Include the libraries=places
	  // parameter when you first load the API. For example:
	  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
		
		lat;
		lng;
	  function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: 23.8103, lng: 90.4125},
		  zoom: 13
		});
		var card = document.getElementById('pac-card');
		var input = document.getElementById('pac-input');
		var types = document.getElementById('type-selector');
		var strictBounds = document.getElementById('strict-bounds-selector');

		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

		var autocomplete = new google.maps.places.Autocomplete(input);

		// Bind the map's bounds (viewport) property to the autocomplete object,
		// so that the autocomplete requests use the current map bounds for the
		// bounds option in the request.
		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var infowindowContent = document.getElementById('infowindow-content');
		infowindow.setContent(infowindowContent);
		var marker = new google.maps.Marker({
		  map: map,
		  anchorPoint: new google.maps.Point(0, -29)
		});

		autocomplete.addListener('place_changed', function() {
		  infowindow.close();
		  marker.setVisible(false);
		  var place = autocomplete.getPlace();
		  if (!place.geometry) {
			// User entered the name of a Place that was not suggested and
			// pressed the Enter key, or the Place Details request failed.
			window.alert("No details available for input: '" + place.name + "'");
			return;
		  }

		  // If the place has a geometry, then present it on a map.
		  if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
			 
		  } else {
			map.setCenter(place.geometry.location);
			map.setZoom(17);  // Why 17? Because it looks good.
		  }
		  marker.setPosition(place.geometry.location);
		  
		  lat=(place.geometry.location.lat());
		  
		  lng=(place.geometry.location.lng());
		  
		  document.getElementById("lat").value=lat;
		  document.getElementById("lng").value=lng;
		  
		  marker.setVisible(true);
 
		  var address = '';
		  if (place.address_components) {
		  
			address = [
			  (place.address_components[0] && place.address_components[0].short_name || ''),
			  (place.address_components[1] && place.address_components[1].short_name || ''),
			  (place.address_components[2] && place.address_components[2].short_name || '')
			].join(' ');
		  }
			
		  infowindowContent.children['place-icon'].src = place.icon;
		  infowindowContent.children['place-name'].textContent = place.name;
		  infowindowContent.children['place-address'].textContent = address;
		  infowindow.open(map, marker);
		});

		// Sets a listener on a radio button to change the filter type on Places
		// Autocomplete.
		function setupClickListener(id, types) {
		  var radioButton = document.getElementById(id);
		  radioButton.addEventListener('click', function() {
			autocomplete.setTypes(types);
		  });
		}

		setupClickListener('changetype-all', []);
		setupClickListener('changetype-address', ['address']);
		setupClickListener('changetype-establishment', ['establishment']);
		setupClickListener('changetype-geocode', ['geocode']);

		document.getElementById('use-strict-bounds')
			.addEventListener('click', function() {
			  console.log('Checkbox clicked! New state=' + this.checked);
			  autocomplete.setOptions({strictBounds: this.checked});
			});
	  }
	</script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADw4iwBKtlOCZ7SCWQfAV7er3Oldf93LI&libraries=places&callback=initMap"
		async defer></script>	
		

	<script>
		
		function submitform(){
			
			
		}
	</script>
</html>

