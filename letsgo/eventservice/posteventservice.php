<?php
	
	//session_start();
	$name=$vanuename=$category=$description=$ticketstatus=$ticketprice=$booth=$endtime=$starttime=$eimage=$eid="";
	
	$isvalid_name=$isvalid_vanuename=$isvalid_category=$isvalid_description=$isvalid_ticketprice=$isvalid_booth=$isvalid_endtime=$isvalid_starttime=$isvalid_schedule=$isvalid_image=false;
	
	$isvalid_ticketstatus=true;
	
	$format="Y-m-d G:i ";
	
	$time=gmdate($format,time()+6.5*3600);
	
	require'../eventdata/eventdata.php';
	
	function validate_name(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			$name=$name_error="";
			
			if(!empty($_POST['name'])){
				
				$GLOBALS['name']=$_POST['name'];
				
				$GLOBALS['isvalid_name']=true;
				
			}
			else{
				
				$name_error .="* You have to add a name of event.";
				
			}
			
			return $name_error;
			
		}
		
		
	}
	
	function validate_vanuename(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
		
			$vanuename=$vanue_error="";
			
			if(!empty($_POST['vanuename']) && !empty($_POST['lat']) && !empty($_POST['lng'])){
				
				$GLOBALS['vanuename']=$_POST['vanuename'];
				
				$GLOBALS['lat']=$_POST['lat'];
				
				$GLOBALS['lng']=$_POST['lng'];
				
				$GLOBALS['isvalid_vanuename']=true;
				
			}
			else{
				
				$vanue_error .="* You have to add a vanue of event from the hints";
				
			}
			
			return $vanue_error;
			
		}
	}
	
	
	function validate_starttime(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
		
			$starttime=$starttime_error="";
			
			if(!empty($_POST['starttime'])){
				
				$starttime=$_POST['starttime'];
				
				$time=strtotime($starttime);
				
				$format="Y-m-d G:i";
				
				$time=date($format,$time);
				
				$GLOBALS['starttime']=$time;
				
				//echo($time);
				if($time<$GLOBALS['time']){
					
					$starttime_error .="* You have added wrong starting time.";
					
				}
				
				else{
					
					
					
					$GLOBALS['isvalid_starttime']=true;
					
				}
			}
			else{
				
				$starttime_error .="* You have to add starting time of event.";
				
			}
			
			return $starttime_error;
			
		}
	}
	
	function validate_endtime(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
			
			
			$endtime=$endtime_error="";
			
			if(!empty($_POST['endtime'])){
				
				$endtime=$_POST['endtime'];
				
				$time=strtotime($endtime);
				
				$format="Y-m-d G:i";
				
				$time=date($format,$time);
				
				$GLOBALS['endtime']=$time;
				
				
				if($time<$GLOBALS['time']){
					
					$endtime_error .="* You have added wrong ending time.";
					
				}
				
				else{
					
					
					
					$GLOBALS['isvalid_endtime']=true;
					
				}
			}
			else{
				
				$endtime_error .="* You have to add ending time of event.";
				
			}
			
			return $endtime_error;
			
		}
	}
	
	function validate_schedule(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
		
			if(!empty($GLOBALS['starttime']) and !empty($GLOBALS['endtime']) and $GLOBALS['endtime']<=$GLOBALS['starttime']){
				
				$schedule_error="* You have entered wrong start or end time";
				
				return $schedule_error;
				
			}
			
			else{
				
				if($GLOBALS['isvalid_endtime']=true and $GLOBALS['isvalid_starttime']=true){
					
					$GLOBALS['isvalid_schedule']=true;
					
					
					
				}
				
			}
			
		}
	}
		
		
	
	
	function validate_category(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
		
			$category=$category_error="";
			
			if(!empty($_POST['category'])){
				
				$category=$_POST['category'];
				
				$GLOBALS['category']=$category;
				
				$GLOBALS['isvalid_category']=true;
				
				return $category;
				
			}
			else{
				
				$category_error .="* You have to select a category of event.";
				
			}
			
			return $category_error;
		}
	}
	
	function validate_description(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
		
			$description=$description_error="";
			
			if(!empty($_POST['description'])){
				
				$description=$_POST['description'];
				
				$GLOBALS['description']=$description;
				
				if(str_word_count($description)<10){
					
					$description_error .="* Description of event should be atleast 10 words.";
					
				}
				else{
					
					$GLOBALS['isvalid_description']=true;
					
				}
			}
			else{
				
				$description_error .="* You have to add a description of event.";
				
			}
			
			return $description_error;
			
		}
	}
	
	function validate_ticketprice(){
		
		$ticketprice=$ticketprice_error ="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
		
			
			
			if(!empty($_POST['ticketstatus'])){
				
				$GLOBALS['ticketstatus']=$_POST['ticketstatus'];
				
				$ticketstatus=$_POST['ticketstatus'];
				
				if($ticketstatus=="Yes"){
					
					if(!empty($_POST['ticketprice'])){
						
						$ticketprice=$_POST['ticketprice'];
						
						if(!is_numeric($ticketprice)){
							
							$ticketprice_error .= "*Give valid ticket price.";
						
						}
						
						else{
							
							$GLOBALS['ticketprice']=$ticketprice;
							
							$GLOBALS['isvalid_ticketprice']=true;
							
						}
						
					}
					else{
						
						$ticketprice_error .="You have to add a ticket price of event.";
						
					}
					
					return $ticketprice_error;
				}
				
				else{
					
					$GLOBALS['isvalid_ticketprice']=true;
					
				}
			}
			
			else{
				
				$ticketstatus="No";
				
				$GLOBALS['isvalid_ticketprice']=true;
				
				$GLOBALS['isvalid_booth']=true;
				
				$GLOBALS['ticketstatus']="No";
				
			}
		}
	}
	
	
	function validate_booth(){
		
		$booth_error=$booth="";
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
		
			
		
			if(!empty($_POST['ticketstatus'])){
				
				$GLOBALS['ticketstatus']=$_POST['ticketstatus'];
				
				$ticketstatus=$_POST['ticketstatus'];
				
				if($ticketstatus=="Yes"){
					
					if(!empty($_POST['booth'])){
						
						$booth=$_POST['booth'];
						
						$GLOBALS['booth']=$booth;
						
						$GLOBALS['isvalid_booth']=true;
						
				}
				else{
					
					$booth_error .="*You have to add a ticket booths of event.";
					
				}
					
					return $booth_error;
				}
				
				else{
					
					$GLOBALS['isvalid_booth']=true;
				}
			}
			
			else{
				
				$ticketstatus="No";
				
				$GLOBALS['isvalid_ticketprice']=true;
				
				$GLOBALS['isvalid_booth']=true;
				
				$GLOBALS['ticketstatus']="No";
				
			}
		}
	}
				
	
	function validate_image(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
			
			$img_error="";
			
			if(!empty($_FILES['mypic']['name'])){
				
				$p_name=$_FILES['mypic']['name'];
				
				$p_tmp=$_FILES['mypic']['tmp_name'];
				
				$p_type=$_FILES['mypic']['type'];
				
				if(!empty($p_type)){
				
					$p_name=explode('/',$p_type);
					
					$m = $p_name[0];
					
					$m = strtolower($m);
					
					$p_name=$p_name[1];
					
					$p_name=strtolower($p_name);
					
					if($m=="image" and ($p_name=="jpg" or $p_name=="jpeg" or $p_name=="png")){
							
						$GLOBALS['eid']=lastid()+1;
						
						$e=explode('*',$_SESSION['my']);
						
						$p_name=$e[0] . "+" .$e[1] . $GLOBALS['eid'] . '.' . $p_name;
						
						$p_store="../eventimage/" .$_POST['name'].$p_name;
						
						$GLOBALS['eimage']=$p_store;
						
						$GLOBALS['e_temp_image']=$p_tmp;
						
						$GLOBALS['isvalid_image']=true;
						
						return "";
							
					}
					else{
					
					$img_error .= "* You can upload only jpg, jpeg or png images.";
					
					}

				}
				
				else{
					
					$img_error .= "* this image can not be uploaded try another.";
				}
			}
					
			else{
				
				$img_error .= "* file can not be empty.";
				
			}
			
			return $img_error;
			
		}		
			
	}
	
	
	function revalidate_image($evname,$evid){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){	
			
			$img_error="";
			
			if(!empty($_FILES['mypic']['name'])){
				
				$p_name=$_FILES['mypic']['name'];
				
				$p_tmp=$_FILES['mypic']['tmp_name'];
				
				$p_type=$_FILES['mypic']['type'];
				
				if(!empty($p_type)){
				
					$p_name=explode('/',$p_type);
					
					$m = $p_name[0];
					
					$m = strtolower($m);
					
					$p_name=$p_name[1];
					
					$p_name=strtolower($p_name);
					
					if($m=="image" and ($p_name=="jpg" or $p_name=="jpeg" or $p_name=="png")){
							
						$GLOBALS['eid']=lastid()+1;
						
						$e=explode('*',$_SESSION['my']);
						
						$p_name=$e[0] . "+" .$e[1] . $evid . '.' . $p_name;
						
						$p_store="../eventimage/" .$evname.$p_name;
						
						$GLOBALS['isvalid_image']=true;
						
						$GLOBALS['eimage']=$p_store;
						
						$GLOBALS['e_temp_image']=$p_tmp;
						
						return "";
							
					}
					else{
					
					$img_error .= "* You can upload only jpg, jpeg or png images.";
					
					}

				}
				
				else{
					
					$img_error .= "* this image can not be uploaded try another.";
				}
			}
					
			else{
				
				$img_error .= "* file can not be empty.";
				
			}
			
			return $img_error;
			
		}		
			
	}
	
	function insert(){
		
		$name=$vanuename=$category=$description=$ticketstatus=$ticketprice=$booth=$endtime=$starttime=$eimage=$eid="";
		
		if($GLOBALS['isvalid_name']== true and $GLOBALS['isvalid_vanuename']== true and $GLOBALS['isvalid_category']== true and $GLOBALS['isvalid_description']== true and $GLOBALS['isvalid_ticketstatus']== true and $GLOBALS['isvalid_ticketprice']== true and $GLOBALS['isvalid_booth']== true and $GLOBALS['isvalid_endtime']== true and $GLOBALS['isvalid_starttime']== true and $GLOBALS['isvalid_schedule']==true ){
			
			
			
			insertevent($GLOBALS['eid'], $GLOBALS['name'], $GLOBALS['vanuename'], $GLOBALS['lat'], $GLOBALS['lng'], $GLOBALS['description'], "Yes", $GLOBALS['starttime'], $GLOBALS['endtime'], $GLOBALS['eimage'], $_SESSION["my"], $GLOBALS['ticketstatus'], $GLOBALS['ticketprice'], $GLOBALS['category'], $GLOBALS['booth']);
			
			echo "Posted successfully";
			
			return 1;
			
		}
	   
		
	}
	
	function update($eid1){
		
		
		
		$name=$vanuename=$category=$description=$ticketstatus=$ticketprice=$booth=$endtime=$starttime=$eimage=$eid="";
		
		if($GLOBALS['isvalid_name']== true and $GLOBALS['isvalid_vanuename']== true and $GLOBALS['isvalid_category']== true and $GLOBALS['isvalid_description']== true and $GLOBALS['isvalid_ticketstatus']== true and $GLOBALS['isvalid_ticketprice']== true and $GLOBALS['isvalid_booth']== true and $GLOBALS['isvalid_endtime']== true and $GLOBALS['isvalid_starttime']== true and $GLOBALS['isvalid_schedule']==true){
			
			updateevent($eid1, $GLOBALS['name'], $GLOBALS['vanuename'], $GLOBALS['description'],"Yes", $GLOBALS['starttime'], $GLOBALS['endtime'], $_SESSION["my"], $GLOBALS['ticketstatus'], $GLOBALS['ticketprice'], $GLOBALS['category'], $GLOBALS['booth']);
			echo $GLOBALS['vanuename'];
			echo "Edited successfully";
			
			return 1;
			
		}
	   
		
	}
	
?>