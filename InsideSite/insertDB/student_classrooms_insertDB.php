<?php
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
		$classroomID = trim($_POST["classroomID"]);
        $studentCode = trim($_POST["studentCode"]);
		$status = trim($_POST["status"]);
		
		if($classroomID=="") {
          	$error[] = "Nhập classroomID!";
       	}
       	else if($studentCode=="") {
       	   $error[] = "Nhập student code!"; 
       	}
       	else if($status=="") {
          	$error[] = "Nhập status!";
       	}
       	
      	else
       	{
	        try
	        {	
	        	
	            //kiem tra student code trong lop da ton tai chua
	            $stmt = $conn->prepare("SELECT * FROM student_classrooms 
	            						WHERE student_code=:studentCode");
	            $stmt->execute(array(':studentCode'=>$studentCode));
	            while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	            	if($row['student_code']==$studentCode && $row['classroom_id']==$classroomID) {
	                	$error[] = "Đã tồn tại học sinh trong lớp!";
	  
	            	}
	            }
	            
	            if(!isset($error))
	            {

	             	$sql = "INSERT into student_classrooms (classroom_id,student_code,status,created_by)
	                		VALUES ('".$classroomID."','".$studentCode."','".$status."','".$_SESSION['id']."')";
	                $stmt = $conn->prepare($sql);
	                $stmt->execute();
	                header("location: manageDatabase.php?page=student_classrooms");
					setcookie("success", "Thêm thành công!", time()+1, "/","");
				}
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>