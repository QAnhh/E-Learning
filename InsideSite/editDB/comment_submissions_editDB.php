<?php 
	if(isset($_POST["saveProfile"])){
		$userID = trim($_POST["userID"]);
		$studentCode = trim($_POST["studentCode"]);
		$content = trim($_POST["content"]);
		$studentExercisesSubmissionsID = trim($_POST["studentExercisesSubmissionsID"]);

		if($userID=="") {
          	$error[] = "Nhập user ID!"; 
       	}
       	else if($studentCode=="") {
          	$error[] = "Nhập student Code!";
       	}
       	else if($content=="") {
          	$error[] = "Nhập content!"; 
       	}
		else if($studentExercisesSubmissionsID=="") {
          	$error[] = "Nhập student Exercises Submissions Id!";
       	}
       	else
       	{
          	try
          	{
		        //thay đổi dữ liệu database
				$sql = "update comment_submissions
						set user_id = '".$userID."',student_code = '".$studentCode."',content = '".$content."',student_exercises_submissions_id = '".$studentExercisesSubmissionsID."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=comment_submissions");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>