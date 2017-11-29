<?php 

	require'header.php';
	
	require'../eventdata/eventdata.php';
	
	echo
	
	'<title>
			
		Card
				
	</title>
		
	<ul style="width:90%;margin:auto">';
	
	$result = select(); 
	
	
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
							
					<form class="epic" action="response_showevent.php" method="post">
							
						
						<input type="image" style="height:100%;width:100%"src="';echo $row['eimage']."?nocache=<" . time();echo'"/>
								
						<input type="hidden" style="display:none"name="id" value="';echo $row['eid'];echo'"/>
								
					</form>
							
					<div class="footer">
							
						posted by '; 
						
						echo "<a style='color:#fff' href=publisherprofile.php?publisher=".$row["publisher"].">" .$row["publisher"]."</a>";
						
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

