<?php 

	require'header.php';
	
	require'../eventdata/eventdata.php';
	
	echo
	
	'<title>
			
		Others
				
	</title>
		
	<ul>';
	
	
	$category="Others";
	
	$result=select_category($category); 
	
	
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
				
	echo '
		</ul>
		
	</body>

</html>'
?>

