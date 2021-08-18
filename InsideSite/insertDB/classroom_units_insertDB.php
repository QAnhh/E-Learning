<?php 
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
		$unitName = trim($_POST["unitName"]);
		$status = trim($_POST["status"]);
		$selectTime = $_POST["selectTime"];
		$selectDay = $_POST["selectDay"];
		$classroomId = trim($_POST["classroomId"]);
		
		if($unitName=="") {
          	$error[] = "Nhập unit Name!";
       	}
       	else if($status=="") {
          	$error[] = "Nhập status!";
       	}
		else if($classroomId=="") {
          	$error[] = "Nhập classroom Id!";
       	}
      	else
       	{
	        try
	        {
	        	//lay ngay bat dau va ket thuc khoa hoc
	        	$sql = "SELECT * FROM class_rooms
	        			WHERE id = '".$classroomId."'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $startDate = $row['start_date'];
                $endDate = $row['end_date'];
                //bat su kien cac ca hoc
	        	if($selectTime == 'c1'){
	        		for ($i=$startDate; $i <= $endDate; $i= date('Y-m-d', strtotime($i . " +1 days"))) { 
	        			//ép kiểu về timestamp
	        			$timestamp = strtotime($i);
	        			$tmp = getdate($timestamp);
	        			if($tmp['weekday']==$selectDay){
	        				$sql = "INSERT into classroom_units (unit_name,status,learn_time,classrooom_id,created_by)
		                			VALUES ('".$unitName."','".$status."','$i 7:00:00','".$classroomId."','".$_SESSION['id']."')";
			                $stmt = $conn->prepare($sql);
			                $stmt->execute();
	        			}

	        		}
					
    			}
    			else if($selectTime == 'c2'){
    				for ($i=$startDate; $i <= $endDate; $i= date('Y-m-d', strtotime($i . " +1 days"))) { 
	        			//ép kiểu về timestamp
	        			$timestamp = strtotime($i);
	        			$tmp = getdate($timestamp);
	        			if($tmp['weekday']==$selectDay){
	        				$sql = "INSERT into classroom_units (unit_name,status,learn_time,classrooom_id,created_by)
		                			VALUES ('".$unitName."','".$status."','$i 09:30:00','".$classroomId."','".$_SESSION['id']."')";
			                $stmt = $conn->prepare($sql);
			                $stmt->execute();
	        			}

	        		}
    			}
	            else if($selectTime == 'c3'){
	            	for ($i=$startDate; $i <= $endDate; $i= date('Y-m-d', strtotime($i . " +1 days"))) { 
	        			//ép kiểu về timestamp
	        			$timestamp = strtotime($i);
	        			$tmp = getdate($timestamp);
	        			if($tmp['weekday']==$selectDay){
	        				$sql = "INSERT into classroom_units (unit_name,status,learn_time,classrooom_id,created_by)
		                			VALUES ('".$unitName."','".$status."','$i 12:30:00','".$classroomId."','".$_SESSION['id']."')";
			                $stmt = $conn->prepare($sql);
			                $stmt->execute();
	        			}

	        		}
    			}
    			else if($selectTime == 'c4'){
    				for ($i=$startDate; $i <= $endDate; $i= date('Y-m-d', strtotime($i . " +1 days"))) { 
	        			//ép kiểu về timestamp
	        			$timestamp = strtotime($i);
	        			$tmp = getdate($timestamp);
	        			if($tmp['weekday']==$selectDay){
	        				$sql = "INSERT into classroom_units (unit_name,status,learn_time,classrooom_id,created_by)
		                			VALUES ('".$unitName."','".$status."','$i 15:00:00','".$classroomId."','".$_SESSION['id']."')";
			                $stmt = $conn->prepare($sql);
			                $stmt->execute();
	        			}

	        		}
    			}
    			else if($selectTime == 'c5'){
    				for ($i=$startDate; $i <= $endDate; $i= date('Y-m-d', strtotime($i . " +1 days"))) { 
	        			//ép kiểu về timestamp
	        			$timestamp = strtotime($i);
	        			$tmp = getdate($timestamp);
	        			if($tmp['weekday']==$selectDay){
	        				$sql = "INSERT into classroom_units (unit_name,status,learn_time,classrooom_id,created_by)
		                			VALUES ('".$unitName."','".$status."','$i 18:00:00','".$classroomId."','".$_SESSION['id']."')";
			                $stmt = $conn->prepare($sql);
			                $stmt->execute();
	        			}

	        		}
    			}
                header("location:manageDatabase.php?page=classroom_units");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>