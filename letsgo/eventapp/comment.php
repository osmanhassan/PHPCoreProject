

<html>

	<?php 
	
	$flag=0;
	
	if(isset($_GET['comments'])and isset($_GET['name'])and isset($_GET['eid'])and isset($_GET['publisher']) and isset($_GET['notification_type'])){
		
		$comments=$_GET['comments'];
		
		$name=$_GET['name'];
		
		$eid=$_GET['eid'];
		
		$publisher=$_GET['publisher'];
		
		$type = $_GET['notification_type'];
		
		$text="";
		
		$first="";
		
		require'../eventdata/eventdata.php';
		
		$ename = select_event_name($eid);
		
		$ename = mysqli_fetch_row($ename);
		
		$ename = $ename[0];
		
		if($type == "publisher_comment"){
			
			require'../eventdata/userdata.php';
			
			$first = select_first_name($name);
			
			$first = mysqli_fetch_row($first);
			
			$first = $first[0];
			
			$text = "publisher " . $first . " commented on post " . $ename;
			
			
		}
		
		if($type == "anonymous_comment"){
			
			$text = "Anonymous " . $name . " commented on your post " . $ename;
			
		}
		
		if($type == "client_comment"){
			
			$text = "Client " . $name . " commented on your post " . $ename;
			
		}
		
		
		
		insert_comment($eid, $name, $comments,$publisher);
		
		insert_notification($eid, $name,$text,$publisher,$type);
		
		$result =select_comments_byeid($eid);
		
	?>
	
	<?php
	
		while ($row=mysqli_fetch_assoc($result)){
			
			$flag=1;
			
			echo'
		
			<br/>
			<table style="border:solid black;width:90%;margin:auto;border-radius:10px;">

				<tr>
				
					<td style="border-bottom:solid gray;background-color:rgba(0,0,0,0.5);color:#fff;padding:10px;border-radius:10px 10px 0px 0px">
					   ';?>
					   <?php
					   
						echo $row['name'] . "<br/>";
						
						$time=strtotime($row['post_time']);
				
						$format="d-m-Y h:i A";
						
						//$time=$time+ 6*3600;
						
						$time=date($format,$time);
						
						echo "on : " . $time ;
						
						?><?php echo'
					   
					</td>
					
				</tr>
				
				<tr>
					<td style="background-color:#000;color:#fff;padding:10px;border-radius:0px 0px 10px 10px">
					
						';?>
					   
					   <?php
					   
						echo '&nbsp&nbsp&nbsp&nbsp';
						echo $row['comment'] ;
					   
					   ?><?php echo'
					</td>
				
				</tr>
		 
			</table>
			
			';?><?php 
			
		}
		
	}
	
	else{
		
		require'../eventdata/eventdata.php';
		
		$eid=$_GET['eid'];
		
		$result = select_comments_byeid($eid);
		
		while ($row=mysqli_fetch_assoc($result)){
			
			$flag=1;
			echo'
		
			<br/>
			<table style="border:solid black;width:90%;margin:auto;border-radius:10px;">

				<tr>
				
					<td style="border-bottom:solid gray;background-color:rgba(0,0,0,0.5);color:#fff;padding:10px;border-radius:10px 10px 0px 0px">
					   ';?>
					   <?php
					   
						echo $row['name'] . "<br/>";
						
						$time=strtotime($row['post_time']);
				
						$format="d-m-Y h:i A";
						
						//$time=$time+6*3600;
						
						$time=date($format,$time);
						
						echo "on : " . $time ;
						
						?><?php echo'
					   
					</td>
					
				</tr>
				
				<tr>
					<td style="background-color:#000;color:#fff;padding:10px;border-radius:0px 0px 10px 10px">
					
						';?>
					   
					   <?php
					   
						echo '&nbsp&nbsp&nbsp&nbsp';
						echo $row['comment'] ;
					   
					   ?><?php echo'
					</td>
				
				</tr>
		 
			</table>';?><?php 
			
		}
		
		
	}
	
	if($flag==0){
		
		echo '
		
			<h1 style="text-align:center;line-height:190px;color:#fff ">';?><?php echo 'Be the first to comment'?><?php echo'<h1>';
	}
	echo "<br/>";
	
	?>

	
	
</html>