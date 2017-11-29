<?php
	
	
	
	if(isset($_GET['comments'])and isset($_GET['name'])){
		
		$comments=$_GET['comments'];
		
		$name=$_GET['name'];
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="INSERT INTO comments (id, name, comment, post_time) VALUES (NULL, '$name', '$comments', CURRENT_TIMESTAMP)";
		
		mysqli_query($con,$query);
		
		$query="select * from comments";
		
		$result=mysqli_query($con,$query);
		
		while ($row=mysqli_fetch_assoc($result)){
			
			echo $row['name'] . "<br/>";
			echo "on : " . $row['post_time'] . "<br/><br/>";
			echo $row['comment'] . "<br/><br/><br/>";
			
		}
		
	}
	
	
?>