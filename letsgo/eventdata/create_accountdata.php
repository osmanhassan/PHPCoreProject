
<?php

	function insert_user($id,$first,$last,$email,$phone,$date,$password,$gender){
		
		$myfile=fopen("data.xml","a");
		
		$xmlText="<user></user>";
				
		$xml = new SimpleXMLElement("$xmlText");
				
		$xml->addAttribute("id",$id);
		
		$xml->addChild("firstname", $first);
		
		$xml->addChild("password",$password);
		
		$xml->addChild("lastname", $last);
		
		$xml->addChild("email",$email);
		
		$xml->addChild("phone", $phone);
		
		$xml->addChild("birtday",$date);
		
		$xml->addChild("gender", $gender);
					
		$str=$xml->asXML();
		
		$key='</users>';
		
		$line=file("data.xml");
		
		$output="";
		
		foreach($line as $l){
			
			if(!strstr($l,$key))
				
				$output.=$l;
				
		}
		
		file_put_contents("data.xml",$output);
		
		$str=str_replace('<?xml version="1.0"?>', "", $str);
		
		$str .="</users>";
		
		//$xml->saveXML("data.xml");
		
		fwrite($myfile,$str);
		
		fclose($myfile);
					
		if($gender=="male")
			$image="../image/defaultmale.png";
		
		if($gender=="female")
			$image="../image/defaultfemale.png";
		
		if($gender=="other")
			$image="../image/defaultother.png";
		
		if($con = mysqli_connect("127.0.0.1", "root", "", "project")){
			
			$query="INSERT INTO user(first,last,email,other_email,phone,birthday,password,gender,image) VALUES ('$first','$last','$id','$email','$phone','$date','$password','$gender','$image')";
			
			$result=mysqli_query($con,$query);
			
			if($result)
				
				echo "inserted";
				
			else
				
				echo "wasn't inserted";
						
		}
		
		else{
			
			echo "Couldn't connect to the database";
			
		}
		
	}
	
	
	function insert_client($id,$first,$last,$email,$phone,$date,$password,$gender){
		
		$myfile=fopen("clientdata.xml","a");
		
		$xmlText="<user></user>";
				
		$xml = new SimpleXMLElement("$xmlText");
				
		$xml->addAttribute("id",$id);
		
		$xml->addChild("firstname", $first);
		
		$xml->addChild("password",$password);
		
		$xml->addChild("lastname", $last);
		
		$xml->addChild("email",$email);
		
		$xml->addChild("phone", $phone);
		
		$xml->addChild("birtday",$date);
		
		$xml->addChild("gender", $gender);
					
		$str=$xml->asXML();
		
		$key='</users>';
		
		$line=file("clientdata.xml");
		
		$output="";
		
		foreach($line as $l){
			
			if(!strstr($l,$key))
				
				$output.=$l;
				
		}
		
		file_put_contents("clientdata.xml",$output);
		
		$str=str_replace('<?xml version="1.0"?>', "", $str);
		
		$str .="</users>";
		
		//$xml->saveXML("clientdata.xml");
		
		fwrite($myfile,$str);
		
		fclose($myfile);
				
		if($gender=="male")
			$image="../image/defaultmale.png";
		
		if($gender=="female")
			$image="../image/defaultfemale.png";
		
		if($gender=="other")
			$image="../image/defaultother.png";
		
		if($con = mysqli_connect("127.0.0.1", "root", "", "project")){
			
			$query="INSERT INTO client(first,last,email,other_email,phone,birthday,password,gender,image) VALUES ('$first','$last','$id','$email','$phone','$date','$password','$gender','$image')";
			
			$result=mysqli_query($con,$query);
			
			if($result)
				
				echo "inserted";
				
			else
				
				echo "wasn't inserted";
						
		}
		
		else{
			
			echo "Couldn't connect to the database";
			
		}
		
	}

?>