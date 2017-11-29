<?php
	
	ob_start();
	
	if($_SERVER['REQUEST_METHOD']=="POST"){
		
		if(!empty($_POST['search'])){
			
			
			
			require'header.php';
			
			require'../eventdata/eventdata.php';
	
			echo
			
			'<ul>';
			
			$name=$_POST['search'];
			
			$result=select_name($name); 
			
			$f=0;
			
			while($row=mysqli_fetch_assoc($result)){
				
				$f=1;
				
				$ename=$row['ename'];
				
				echo'
					<li style="float:left;padding:10px">
							
						<div class="card" style="">		
								
							<div class="header">
									
								';
							echo $ename;
							
							echo'
									
							</div>
									
							<form  action="response_showevent.php" method="post" class="epic">
									
								
								<input type="image" style="height:100%;width:100%"src="';echo $row['eimage'];echo'"/>
										
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
				
				if($f==1){
					
					echo'<title>
					
								';?><?= $name ?><?php echo'
						
						</title>';
					
				}
				
				else{
					
					header('Location: card.php');
					
				}
						
			echo '
				</ul>
				
			</body>

		</html>'
					
		;}
		
		else{
			
			header('Location: card.php');
			
		}
		
		
	}
	
	else{
			
			header('Location: card.php');
			
		}
	
	
?>