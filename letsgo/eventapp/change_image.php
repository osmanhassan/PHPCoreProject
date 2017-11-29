<?php

    	
			
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
						
						session_start();
						
						$p_name=$_SESSION['myc'] . '.' . $p_name;
						
						$p_store="../userimage/" . $p_name  ;
						
						move_uploaded_file($p_tmp, $p_store);
						
						require'../eventdata/userdata.php';
						
						update_user_image($p_store,$_SESSION['myc']);
						
						echo $p_store . "?nocache=<" . time();
						 
						
					}
					else{
					
					echo "* You can upload only jpg, jpeg or png images.";
					
					}

				}
				
				else{
					
					echo "* this image can not be uploaded try another.";
				}
			}
					
			else{
				
				echo "* file can not be empty.";
				
			}
			
			
			
				
			
	
	
?>