
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
				
				
				text-align:center;
				
				overflow-X:hidden;
				overflow-Y:auto;
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
				animation: show_search 0.1s 0s infinite linear;
				
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
	
	<body style="background-image:url(../image/hd5.jpg); background-attachment: fixed;background-size:cover">
		
		
		<div style="position:fixed;width:100%">
		
			<div style="background-color:rgba(0,0,0,0.9);color:#fff;border-bottom:solid #fff;width:100%;height:50px;line-height:50px;">
					
					<div style="width:300px" class="move">

						<a style="">
						
							<img src="../icon/logo2.png" class="logo" style="height:50px;width:50px">
						
						</a>
						
						<a style="font-size:50px;font-weight:bold;color:red">L</a>
						
						<a style="font-size:25px;">et's </a>
						
						<a style="font-size:50px;font-weight:bold;color:#fff">G</a>
						
						<a style="">
						
							<img src="../icon/logo2.png" class="logo" style="height:30px;width:30px">
						
						</a>

					</div>
			</div>
				
			<div style="width:70%;margin:auto;height:30px;color:#fff;">
				
				<div style="width:100%;margin:auto">
		
					<ul>
						
						<li style="width:32%;margin-left:1%;height:30px;font-size:100%;"><a href="card.php" style="line-height:30px;">Home</a></li>
						<li style="width:32%;height:30px;font-size:100%;" onclick="showsearch()" ><a href="#" id="searchbutton" style="line-height:30px;" >Search</a></li>
						<li style="width:32%;height:30px;font-size:100%;"><a href="login.php" style="line-height:30px;">Log in</a></li>
						
					</ul>
					
				</div>
				
			</div>
			
			<div style="width:70%;display:none;border-radius:10px;margin:auto;overflow-X:hide;overflow-Y:auto;height:420px" id="search">
				
				<div style="width:40%;padding:10px;float:left">
				
					<ul>
								
						<li style="width:70%;height:30px;margin-top:5px">
						
							<a href="#">
							
								<label>
								
									<form action="response_showcategory.php" method="post">
									
										<input type="submit" style="width:100%;height:100%;border-radius:5px;display:none" name="movie" >Movie
									
									</form>
									
								</label>
								
							</a>
							
						</li>

						<li style="width:70%;height:30px;margin-top:5px">
						
							<a href="#">
							
								<label>
								
									<form action="response_showcategory.php" method="post">
									
										<input type="submit" style="width:100%;height:100%;border-radius:5px;display:none" name="concert" >Concert
									
									</form>
									
								</label>
								
							</a>
							
						</li>
						
						<li style="width:70%;height:30px;margin-top:5px">
						
							<a href="#">
							
								<label>
								
									<form action="response_showcategory.php" method="post">
									
										<input type="submit" style="width:100%;height:100%;border-radius:5px;display:none" name="cultural" >Cultural
									
									</form>
									
								</label>
								
							</a>
							
						</li>
							
						<li style="width:70%;height:30px;margin-top:5px">
						
							<a href="#">
							
								<label>
								
									<form action="response_showcategory.php" method="post">
									
										<input type="submit" style="width:100%;height:100%;border-radius:5px;display:none" name="others" >Others
									
									</form>
									
								</label>
								
							</a>
							
						</li>
						
				
					</ul>
				
				</div>
				
				<div style="width:50%;margin-top:10px;float:left;background-color:#000;border-radius:10px">
				
					<form action="response_combo_search.php" method="post" style="color:#fff;font-size:100%;font-weight:bold">
									
						<fieldset style="margin:10px;border-radius:5px">

							<legend style="margin:auto">Search</legend>
								
								<fieldset style="margin:10%;padding:10%;border-radius:5px">

									<legend>select time</legend>

										<input  type="radio" name="time" value="tomorrow"/> Tomorrow<br/>
										<input  type="radio" name="time" value="next week"/> Next week<br/>
										<input  type="radio" name="time" value="next month"/> Next month<br/>
								
								</fieldset>

								<p style="margin:10px;">Select a category of this event:</p>
								
								<select name="Category" style="margin:10px;width:80%;border-radius:10px;height:30px;border:0px;">
									<option></option>
									<option>Movie</option>
									<option>Concert</option>
									<option>Cultural</option>
									<option>Others</option>
								</select>

								<input type="submit" name="submit" value="Search" style="margin-left:33%;margin-top:10px;margin-bottom:10px;width:50%;height:30px;border-radius:10px;background-color:#fff">
						
						</fieldset>
					
					</form>
					
				</div>
			
			</div>
			
		</div>
		
		
		
		<div style="height:120px">
		</div>
		
		<script>
		
			count=0;
			
			function showsearch() {
				
				if(count%2==0){
					
					document.getElementById("search").style.display = "block";
					document.getElementById("searchbutton").style.backgroundColor="green";
					
				}
				else{
					
					document.getElementById("search").style.display = "none";
					document.getElementById("searchbutton").style.backgroundColor="rgba(0,0,0,0.8)";
				}
				count++;
			}
			
		</script>
		