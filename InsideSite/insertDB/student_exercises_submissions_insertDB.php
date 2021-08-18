<?php
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
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
	             
             	$sql = "INSERT into student_exercises_submissions (student_code,content,score,batch_exercises_id,status,mark_user,file_id,created_by)
                		VALUES ('".$studentCode."','".$content."','".$score."','".$batchExercisesID."','".$status."','".$markUser."','".$fileID."','".$_SESSION['id']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location: manageDatabase.php?page=student_exercises_submissions");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>