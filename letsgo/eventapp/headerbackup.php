
<html>

	<head>
		
		<style>
			
			*{margin:0px;padding:0px;}
			
			.card{
				width:250px;
				height:300px;
				margin:auto;
				border:solid gray;
				border-radius:10px;
				background-color:rgba(0,0,0,0.3);
				box-shadow:10px 10px 2px rgba(0,0,0,0.3);
			}
			
			.login-card{
				width:300px;
				color:#fff;
				margin:0 auto;
				margin-top:5%;
				padding:10px;
				border:solid gray;
				border-radius:10px;
				background-color:rgba(0,0,0,0.6);
				box-shadow:15px 10px 10px rgba(0,0,0,1);
			}
			
			.header{
			
				width:100%;
				height:15%;
				line-height:15px;
				margin-top:10px;
				//background-color:#006666;
				text-align:center;
				//margin-bottom:10px;
				overflow:auto;
				font-weight:bold;
				color:#fff;
			
			}
			
			.epic{
				width:100%;
				height:60%;
				//margin-top:-10px;
			}
			
			.footer{
			
				width:100%;
				height:20%;
				//margin-top:-25px;
				//line-height:50px;
				//background-color:#006666;
				text-align:center;
				//margin-bottom:10px;
				overflow:auto;
				color:#fff;
			
			}
			.login-button{
				
				width:150px;
				height:50px;
				margin-left:25%;
				margin-right:25%;
				border-radius:5px;
				padding:10px;
				font-size:20px;
				background-color:rgba(0,0,0,0.9);
				color:#fff;
				
			}
			
			.login-button:hover{
				
				
				background-color:gray;
				border:ridge 5px #fff;
			}
			
			.input{
			height:50px;
			width:300px;
			border-radius:5px;
			padding:10px;
			font-size:20px;
			text-align:center;
		}	
		.input:focus{
			
			background-color:#ffcccc;
		}
			span{
			  color:red;
			  font-size:20px;
			  font-weight:bold;
		  }
		
			ul{
				list-style:none;
				
			}
			div ul li{
				margin-left:2px;
				float:left;
				height:100%;
				width:40px;
				//border:solid gray;
			}
			
			div ul li a{
				
				text-decoration:none;
				display:block;
				width:100%;
				height:100%;
				text-align:center;
				line-height:30px;
				color:#fff;
				background-color:rgba(0,0,0,0.8);
				border-radius:5px;
				
			}
			
			div ul li a:hover{
				background-color:green;
				display:block;
			}
			@keyframes show_search{
			
				0%{
					
					margin-top:-30px;
					
				}

				100%{
					
					margin-top:0px;
					
				}
			}
			div ul li ul{
				
				display:none;
				animation: show_search 0.1s 0s 1 linear;
				
			}
			div ul li li{
				
				width:120px;
				margin-left:0px;
				
			}
			
			div ul li li a{
				
				background-color:rgba(0,0,0,0.8);
				
			}
			
			@keyframes spin-logo{
			
				0%{
					
					//width:20px;
					transform:rotateZ(0deg);
				}

				100%{
					
					//width:20px;
					transform:rotateZ(360deg);
					
				}

			}

			.logo{

			animation: spin-logo .6s 0s infinite linear;

			}
			
			@keyframes show_sidebar{
			
				0%{
					
					margin-right:-300px;
					
				}

				100%{
					
					margin-top:0px;
					
				}
			}

			@keyframes go{
			
				0%{
					
					margin-left:0%;
					
				}
				
				20%{
					
					margin-left:0%;
					
				}
				40%{
					
					margin-left:38%;
					
				}
				
				80%{
					
					margin-left:38%;
					
				}

				100%{
					
					margin-left:100%;
					
				}
			}

			.move{

			animation: go 8s 0s infinite linear;

			}
			
			</style>
			
			<meta charset="utf-8">
	
	</head>
	
	<body style="background-image:url(../image/hd5.jpg);background-size:cover">
		
		
		<div style="position:fixed;width:100%">
		
			<div style="background-color:rgba(0,0,0,0.9);color:#fff;width:100%;height:50px;line-height:50px;">
					
					<div style="width:300px" class="move">

						<a style="">
						
							<img src="../icon/logo2.png" class="logo" style="height:50px;width:50px"></img>
						
						</a>
						
						<a style="font-size:50px;font-weight:bold;color:red">L</a>
						
						<a style="font-size:25px;">et's </a>
						
						<a style="font-size:50px;font-weight:bold;color:#fff">G</a>
						
						<a style="">
						
							<img src="../icon/logo2.png" class="logo" style="height:30px;width:30px"></img>
						
						</a>

					</div>
			</div>
				
			<div style="background-color:rgba(0,0,0,0.3);width:100%;height:30px;color:#fff;border-top:solid #fff;">
				
				<ul >
					
					<li style="width:30px;"><a href="card.php"style="border-radius:5px;"><img src="../icon/home1.png" style="border-radius:5px;width:100%;height:100%"></img></a></li>
					
					<li style="width:30px;margin-right:2px"><a href="#"style="border-radius:5px;"><img onclick="showsearch()" src="../icon/search.png" style="border-radius:5px;width:100%;height:100%"></img></a>
					
						<ul id="search">

							<li style="">
							
								<form action="response_searched_by_name.php" method="post">
								
									<input type="text" name="search" placeholder="type event's name" style="height:30px;width:200px;margin-top:5px;padding-left:5px;border-radius:5px;margin-bottom:2px;"/>
									
									<input type="submit" name="submit" value="search"style="width:200px;height:35px;border-radius:10px;background-color:rgba(0,0,0,0.8);color:#fff;"/>
								
								</form>
							
							</li>
						
						</ul>
					
					</li>

					<li style="width:110px"><a onclick="showdropdown()"href="#"style="line-height:30px">Categories <img  src="../icon/down.png" style="border-radius:5px;width:30px;height:60%;margin-bottom:-5px"></img></a>
					
						<ul id="dropdown">
							
							<li><a href="show_movies.php">Movies </a></li>
								
							<li><a href="show_concerts.php">Concerts</a></li>
								
							<li><a href="show_culturals.php">Culturals</a></li>
								
							<li><a href="show_others.php">Others</a></li>
							
						</ul>
					
					</li>
					
					<li ><a href="login.php">Post</a></li>
					
					<li ><a href="#">FAQ</a></li>
					
					<li style="width:30px;float:right;margin-right:2px"><a href="#"style="border-radius:5px;"><img src="../icon/menu.png" onclick="showsidebar()"style="border-radius:5px;width:100%;height:100%"></img></a>
					
						<ul id="sidebar" style="animation: show_sidebar 01s 0s 1 linear;display:none;">

							<li style="width:300px;float:right;background-color:rgba(0,0,0,0.8);height:300px;">
								
								<form action="response_combo_search.php" method="post">
									
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

							</li>

						</ul>
					
					</li>
					
				</ul>
				
			</div>
			
		</div>
		
		<div style="height:100px">
		</div>
		
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
			count2=0;
			function showsidebar() {
				if(count2%2==0)
					document.getElementById("sidebar").style.display = "block";
				else
					document.getElementById("sidebar").style.display = "none";
				count2++;
			}
			
		</script>
		
	
	