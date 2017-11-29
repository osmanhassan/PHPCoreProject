	
	
<?php 

	echo'
	<div class="leftpanel">
								
		<div class="nav" style="height:100%">
			
			<input id="name" class="input" placeholder="Type your name" style="width:90%;margin:15px;font-size:20px" >
			
			<input value="Like" onclick="like()" type="button" class="input" style="width:30%;margin-left:15px;color:#fff;background-color:rgba(0,0,0,0.9); " >
			
			<div id="likes" class="input" style="width:45%;height:30px;;background-color:#fff;margin-right:15px;float:right;text-align:center;font-size:30px;line-height:30px" >
			
			
			
			</div>
			
			
			<div class="profilecomment" id="comments" style="display:block">
			
			
			</div>
				
				<textarea id="comment" class="profilecomment" style="height:100px;background-color:#fff;margin:10px" ></textarea>
				
				<input id="postcomment" onclick="post_comment()" type="button" value="Post" class="input" style="width:80px;height:50px;margin-top:10px;margin-left:90px;border-radius:5px;background-color:rgba(0,0,0,0.9);color:#fff">
				
				<script>
				
					function post_comment(){
						
						var comments=document.getElementById("comment").value;
						
						var eid="';echo $_SESSION["event"][0];echo'";
						
						var name=document.getElementById("name").value;
						
						var publisher="';echo $_SESSION["event"][10];echo'";
						
						if(name!=="" && comments!==""){
							
							var reqn=new XMLHttpRequest();
							
							var notification_type="anonymous_comment";
			
							reqn.open("GET","comment.php?comments="+comments+"&name="+name+"&eid="+eid+"&publisher="+publisher+"&notification_type="+notification_type,true);

							reqn.send();
							
							reqn.onreadystatechange=function(){
										
								if(reqn.readyState==4){
									
									document.getElementById("comments").innerHTML=reqn.responseText;

									document.getElementById("comment").value="";
										
								}
										
							}
							
						}
						
						if(name==="" && comments!==""){
							
							alert("Please insert your name in the name field then comment");
							
						}
										
					}
				
				</script>
				
				
				
				<script>
				
					function like(){
						
						
						
						var eid="';echo $_SESSION["event"][0];echo'";
						
						var name=document.getElementById("name").value;
						
						var publisher="';echo $_SESSION["event"][10];echo'";
						
						if(name!==""){
							
							var reqn=new XMLHttpRequest();
							
							var notification_type="anonymous_like";
			
							reqn.open("GET","like.php?name="+name+"&eid="+eid+"&publisher="+publisher+"&notification_type="+notification_type,true);

							reqn.send();
							
							reqn.onreadystatechange=function(){
										
								if(reqn.readyState==4){
									
									document.getElementById("likes").innerHTML=reqn.responseText;

									
										
								}
										
							}
							
						}
						
						if(name===""){
							
							alert("Please insert your name in the name field then like");
							
						}
										
					}
				
				</script>
				
				<script>

				
				
				
							function showcomment() {
								
								
								
								var eid="';echo $_SESSION["event"][0];echo'";
								
								var req=new XMLHttpRequest();
									
								req.open("GET","comment.php?eid="+eid,true);
	
	
								req.send();
								req.onreadystatechange=function(){
									
									if(req.readyState==4){
										
										var divobj=document.getElementById("comments");
										
										divobj.innerHTML=req.responseText;
										
								
									}
								}
							}
				</script>
				
				
				<script>

				
				
				
							function showlikes() {
								
								
								
								var eid="';echo $_SESSION["event"][0];echo'";
								
								var req=new XMLHttpRequest();
									
								req.open("GET","like.php?eid="+eid,true);
	
	
								req.send();
								req.onreadystatechange=function(){
									
									if(req.readyState==4){
										
										var divobj=document.getElementById("likes");
										
										divobj.innerHTML=req.responseText;
										
								
									}
								}
							}
				</script>
									
			</div>
			
			<div class="comment" style="display:none">
			
			</div>
			
		</div>';
		
?>
						