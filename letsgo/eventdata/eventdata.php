<?php

	function select(){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
	}
	
	
	function select_category($category){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event where category like '$category' ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
		
	}
	
	function select_date($time){
		
		$format="Y-m-d G:i";
		
		$ctime=gmdate($format,time()+6*3600);
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event where stime BETWEEN '$ctime' and '$time' ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
		
	}
	
	function select_date_category($time,$category){
		
		$format="Y-m-d G:i";
		
		$ctime=gmdate($format,time()+6*3600);
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event where stime BETWEEN '$ctime' and '$time' and category like '$category' ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
	}
	
	function select_name($name){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event where ename like '$name' ORDER BY eid DESC";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
		
	}
	
	function select_id($eid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select *  FROM event WHERE eid='$eid'";
		
		if($result=mysqli_query($con,$query))
			
			return $result;
			
		return 0;
	}
	
	function select_event_name($eid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select ename  FROM event WHERE eid='$eid'";
		
		$result=mysqli_query($con,$query);
			
		return $result;
		
	}
	
	function lastid(){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from event";
		
		$result=mysqli_query($con,$query);
		
		$id=0;
		
		while($row=mysqli_fetch_assoc($result)){
			
			$id=$row['eid'];
		}
		
		return $id;
		
	}
	
	function insertevent($eid, $ename, $vanue, $lat, $lng, $description, $is_show, $stime, $etime, $eimage, $publisher, $tstatus, $price, $category, $booth){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$eimage="../image/defaultevent.jpg";
		
		$query="INSERT INTO event (eid, ename, vanue, lat, lng, description, is_show, stime, etime, eimage, publisher, tstatus, price, category, booth) VALUES ('$eid', '$ename', '$vanue', '$lat', '$lng', '$description', '$is_show', '$stime', '$etime', '$eimage', '$publisher', '$tstatus', '$price', '$category', '$booth');";
		
		$result=mysqli_query($con,$query);
		
		if($result){
			
			
			 
		}
		
		else{
			
			echo "DB insert error from eventdata.php";
			
		}
	
	}
	
	function delete_event($eid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="DELETE FROM event WHERE eid='$eid'";
		
		if(mysqli_query($con,$query))
			
			return 1;
			
		return 0;
	}
	
	function updateevent($eid1, $ename, $vanue, $description, $is_show, $stime, $etime, $publisher, $tstatus, $price, $category, $booth){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="UPDATE event SET ename='$ename',vanue='$vanue',description='$description',is_show='$is_show',stime='$stime',etime='$etime',publisher='$publisher',tstatus='$tstatus',price='$price',category='$category',booth='$booth' WHERE eid='$eid1'";
		
		$result=mysqli_query($con,$query);
		
		if($result){
			
			
			 
		}
		
		else{
			
			echo "DB update error from eventdata.php";
			
		}
	
	}
	
	function update_image($p_store,$evid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="UPDATE event SET eimage='$p_store' WHERE eid='$evid'";
		
		$result=mysqli_query($con,$query);
		
		
	}
	
	function count_comment_notification_publisher($publisher){
		
		$type1="publisher_comment";
		
		$type2="publisher_email";
		
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$status="unseen";
		
		$query="select count(nid) from notification where publisher like '$publisher' and type not like '$type1' and type not like '$type2' and status like '$status'";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
		
	}
	
	
	function count_comment_notification_client($publisher){
		
		$type1="client_comment";
		
		$type2="client_email";
		
		$type3="anonymous_comment";
		
		$type4="anonymous_like";
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$status="unseen";
		
		$query="select count(nid) from notification where publisher like '$publisher' and type not like '$type1' and type not like '$type2' and type not like '$type3' and type not like '$type4' and status like '$status'";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
		
	}
	
	function select_comments_byeid($eid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from comments where eid=$eid";
		
		$result=mysqli_query($con,$query);
		
		return($result);
		
		
	}
	
	function insert_comment($eid, $name, $comments,$publisher){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="INSERT INTO comments (id, eid, name, comment, post_time, publisher) VALUES (NULL, '$eid', '$name', '$comments', CURRENT_TIMESTAMP,'$publisher')";
		
		mysqli_query($con,$query);
		
	}
	
	
	
	function insert_notification($eid, $name,$text,$publisher,$type){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$status="unseen";
		
		$query="insert into notification (nid, eid, given_by, text, publisher, type, status) values (NULL, '$eid', '$name', '$text', '$publisher', '$type', '$status')";
		
		mysqli_query($con,$query);
		
	}
	
	function checkLikedBefore($eid,$given_by,$type){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select * from notification where type like '$type' and given_by like '$given_by' and eid like '$eid'";
		
		$result=mysqli_query($con,$query);
		
		return $result;
	}
	
	function show_publisher_notification($publisher){
		
		$type1="publisher_comment";
		
		$type2="publisher_email";
		
		$type3="client_email";
		
		$status="seen";
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select text from notification where publisher like '$publisher' and type not like '$type1' and type not like '$type2' ORDER BY nid DESC";
		
		$result=mysqli_query($con,$query);
		
		
		$query="UPDATE notification SET status='$status' where publisher like '$publisher' and type not like '$type1' and type not like '$type2' ";
		
		mysqli_query($con,$query);
		
		return($result);
		
		
		
	}
	
	function show_client_notification($client){
		
		$type1="publisher_comment";
		
		$type2="publisher_email";
		
		$type3="client_email";
		
		$status="seen";
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select text from notification where publisher like '$client' ORDER BY nid DESC";
		
		$result=mysqli_query($con,$query);
		
		
		$query="UPDATE notification SET status='$status' where publisher like '$client'";
		
		mysqli_query($con,$query);
		
		return($result);
		
		
		
	}
	
	function insert_like($eid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="UPDATE event SET likes = likes+1 WHERE eid='$eid'";
		
		mysqli_query($con,$query);
	}
	
	function select_like($eid){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		
		$query="select likes from event where eid='$eid'";
		
		$result=mysqli_query($con,$query);
		
		return $result;
		
	}
	
	function publisherImage($publisher){
		
		$con = mysqli_connect("127.0.0.1","root","","project");
		
		$query = "select image from user where email like '$publisher'";
	
		$result = mysqli_query($con,$query);
		
		return $result;
		
		
	}
	
	function fetch_profile($publisher){
		
		$con=mysqli_connect("127.0.0.1","root","","project");
		$query="select * from event where publisher like '$publisher' ORDER BY eid DESC";
		$result=mysqli_query($con,$query);
		return $result;
		
	}

?>

