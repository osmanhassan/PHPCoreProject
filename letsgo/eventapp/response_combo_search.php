<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		if(!empty($_POST['time']) or !empty($_POST['Category'])){
			
			ob_start();
			
			require'../eventdata/eventdata.php';
			
			$result="";
			
			if(!empty($_POST['time']) and !empty($_POST['Category'])){
				
				$time=$_POST['time'];
				
				$category=$_POST['Category'];
				
				$format="Y-m-d G:i";
				
				
				if($time=="next month"){
					
					$time=gmdate($format,time()+6*3600+30*24*3600);
					
					
				}
				
				else{
					
					if($time=="next week"){
						
						$time=gmdate($format,time()+6*3600+7*24*3600);
					
						
					}
					
					else{
						
						$time=gmdate($format,time()+6*3600+24*3600);
					
						
					}
					
				}
				
				$result = select_date_category($time,$category);
				
			}
			
			else{
				
				if(!empty($_POST['time'])){
					
					$time=$_POST['time'];
				
					$format="Y-m-d G:i ";
					
					if($time=="next month"){
						
						$time=gmdate($format,time()+6*3600+30*24*3600);
						
						
					}
					
					else{
						
						if($time=="next week"){
							
							$time=gmdate($format,time()+6*3600+7*24*3600);
						
							
						}
						
						else{
							
							$time=gmdate($format,time()+6*3600+24*3600);
						
							
						}
						
					}
					
					$result = select_date($time);
						
						
				}
				
				else{
					
					
					$category=$_POST['Category'];
					
					$result = select_category($category);
					
				}
				
			}
			
			if(!empty($result)){
				
				require'header.php';
				echo '<ul>';
			}
				
			$f = 0;
			
			while($row = mysqli_fetch_assoc($result)){
				
				$f = 1;
				
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
				;
				
			}
			
			if($f == 1){
				
				echo'</ul><title>
					
								';?><?php if(isset($_POST['time'])) echo $_POST['Category'] . " within " . $_POST['time'];else echo $_POST['Category']; ?><?php echo'
						
					</title>';
				
			}
			
			else{
				
				header('Location: card.php');
				
			}
		}
		
		else{
			
			header('LOCATION: card.php');
		}
		
	}
	
	else{
		
		header('LOCATION: card.php');
		
	}

?>