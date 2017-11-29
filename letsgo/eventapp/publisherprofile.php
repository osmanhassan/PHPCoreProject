<?php

	if(isset($_REQUEST['publisher'])){
		
		require('header.php');
		
		require('../eventdata/userdata.php');
		
		require('../eventdata/eventdata.php');
		
		$publisher=$_REQUEST['publisher'];
		
		$result=select_events_by_publisher($publisher);
		
		$image=publisherImage($publisher);
		
		$img=mysqli_fetch_row($image)[0];
		
		echo
	
	'<title>';
	
	echo $publisher;
	
	echo'
				
	</title>
	

	
	<div style="width:30%;height:50%;margin:auto;color:fff;text-align:center;font-size:20px;font-weight:bold">
	
		<img src="';echo $img."?nocache=<" . time();echo'" style="width:100%;height:90%;border-radius:10px">
		
		Posts by ';
		
		echo $publisher;
		
		echo'
		
		
		
	</div>';
	
	echo'
	
	<ul style="width:90%;margin:auto">';
	
	
	
	
	while($row=mysqli_fetch_assoc($result)){
		
		$ename=$row['ename'];
		
		echo'
			<li style="float:left;padding:10px">
					
				<div class="card" style="">		
						
					<div class="header" style="font-size:20px">';
						
					echo $ename;
					
					echo'
							
					</div>
							
					<form class="epic" style="height:82%"action="response_showevent.php" method="post">
							
						
						<input type="image" style="height:100%;width:100%"src="';echo $row['eimage']."?nocache=<" . time();echo'"/>
								
						<input type="hidden" style="display:none"name="id" value="';echo $row['eid'];echo'"/>
								
					</form>
					
					';echo'
							
				</div>
						
			</li>'
		;}
				
	echo '
		</ul>
		
	</body>

</html>';
	}
	else{
		
		header("Location: card.php");
		
	}

?>