<?php
		
	if(isset($_POST["saveProfile"])){
		$classroomID = trim($_POST["classroomID"]);
		$studentCode = trim($_POST["studentCode"]);
		$status = trim($_POST["status"]);
		
		if($classroomID=="") {
          	$error[] = "Nhập classroom Id!";
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
		        //thay đổi dữ liệu database
				$sql = "update student_classrooms
						set classroom_id = '".$classroomID."',student_code = '".$studentCode."',status = '".$status."',updated_by = '".$_SESSION['id']."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=student_classrooms");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>