

			<div style="color:#fff;width:100%;height:50px;line-height:50px;border-bottom:solid #fff">
					
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
			
			<ul style="padding-left:49.5%;padding-top:0px;margin:0px;">
					
					<li style="margin:0px;height:48px;width:60px;background-color:rgba(0,0,0,0.1);float:right"><a href="logout.php"style="border-radius:5px;"><img src="../icon/logout.png" style="border-radius:5px;width:100%;height:100%;"></img></a></li>

					<li style="margin:0px;height:48px;width:60px;background-color:rgba(0,0,0,0.1);float:right"><a style="border-radius:5px;"><img onclick="showPasswordBox()" src="../icon/changepassword.png" style="border-radius:5px;width:100%;height:100%"></img></a>
					
						<ul  onmouseover="setActivity()" style=";position:absolute;margin:0px;padding:0px;margin-left:-250px">
						
							<li id="passwordbox" style="display:none;width:300px;height:300px;overflow-X:hide;overflow-Y:auto;color:#fff;font-size:20px;line-height:30px">
								
								<br/>
								
								<span id="passerror"></span>
								
								<br/>
								
								Previous password: <br/>
								<input type="password" id="prepass" style="width:250px;height:50px;font-size:20px;border-radius:20px;text-align:center"/>
								
								<br/>
								
								New password: <br/>
								<input type="password" id="newpass" style="width:250px;height:50px;font-size:20px;border-radius:20px;text-align:center"/>
								
								<br/>
								
								<input onclick="changePass()" type="button" value="change"  style="margin-top:10px;width:100px;height:50px;font-size:20px;font-weight:bold;color:#fff;background-color:#000;text-align:center"/>

							</li>
						
						</ul>
					
					</li>
					
					<script>
						
						passcount=0;
						
						function showPasswordBox(){
							
							if(passcount%2==0){
								
								document.getElementById("passwordbox").style.display = "block";
								
							}
							
							else{
								
								document.getElementById("passwordbox").style.display = "none";
								
							}
							
							passcount++;
						}
					</script>
					
					
				</ul>
				
				
			