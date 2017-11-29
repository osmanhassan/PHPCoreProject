<?php

	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		require'header.php';
		
		require'../eventdata/eventdata.php';
		
		if(isset($_POST['movie'])){
			
			$category="Movie";
			
			$title="Movies";
	
		}
		
		if(isset($_POST['concert'])){
			
			$category="Concert";
			
			$title="Concerts";
	
		}
		
		if(isset($_POST['cultural'])){
			
			$category="Cultural";
			
			$title="Culturals";
	
		}
		
		if(isset($_POST['others'])){
			
			$category="Others";
			
			$title="Others";
			
		}
		
		//here will go new categories
		
		
		$result=select_category($category);
		
		
		
		if(!empty($result->num_rows)){
			
			echo
		
			'<title>'
					
				. $title .
						
			'</title>
				
			<ul style="width:90%;margin:auto">';
			
			while($row=mysqli_fetch_assoc($result)){
			
				$ename=$row['ename'];
				
				echo'
					<li style="float:left;padding:10px">
							
						<div class="card" style="">		
								
							<div class="header">
									
								';
							echo $ename;
							
							echo'
									
							</div>
									
							<form action="response_showevent.php" method="post" class="epic">
									
								
								<input type="image" style="height:100%;width:100%"src="';echo $row['eimage']."?nocache=<" . time();echo'"/>
										
								<input type="hidden" style="display:none"name="id" value="';echo $row['eid'];echo'"/>
										
							</form>
									
							<div class="footer">
									
								posted by '; 
								
								echo $row['publisher'];
								
								echo'
									
							</div>
									
						</div>
								
					</li>'
				;}
						
			echo '
				</ul>
				
			</body>

		</html>';
		
		}
		
		else{
			
			echo"<h1 style='text-align:center'> There is no " . $title . " now. Visit later. </h1>";
		}
		
	}
	
	else{
		
		header('Location: card.php');
		
	}

?>