<?php
		
	if(isset($_POST["saveProfile"])){
		$studentCode = trim($_POST["studentCode"]);
		$content = trim($_POST["content"]);
		$score = trim($_POST["score"]);
		$batchExercisesID = trim($_POST["batchExercisesID"]);
		$status = trim($_POST["status"]);
		$markUser = trim($_POST["markUser"]);
		$fileID = trim($_POST["fileID"]);

		if($studentCode=="") {
          	$error[] = "Nhập student Code!"; 
       	}
       	else if($content=="") {
          	$error[] = "Nhập content!";
       	}
       	else if($score=="") {
          	$error[] = "Nhập score!";
       	}
       	else if($batchExercisesID=="") {
          	$error[] = "Nhập batch exercises id!";
       	}
       	else if($status=="") {
          	$error[] = "Nhập status!";
       	}
       	else if($markUser=="") {
          	$error[] = "Nhập mark User!"; 
       	}
		else if($fileID=="") {
          	$error[] = "Nhập file Id!";
       	}
       	else
       	{
          	try
          	{
		        //thay đổi dữ liệu database
				$sql = "update student_exercises_submissions
						set student_code = '".$studentCode."',content = '".$content."',score = '".$score."',batch_exercises_id = '".$batchExercisesID."',status = '".$status."',mark_user = '".$markUser."',file_id = '".$fileID."',updated_by = '".$_SESSION['id']."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=student_exercises_submissions");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>