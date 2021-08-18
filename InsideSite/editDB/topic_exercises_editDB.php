<?php
		
	if(isset($_POST["saveProfile"])){
		$name = trim($_POST["name"]);
		$description = trim($_POST["description"]);
		$limitStudent = trim($_POST["limitStudent"]);
		$fileID = trim($_POST["fileID"]);
		$batchExerciseID = trim($_POST["batchExerciseID"]);

		if($name=="") {
          	$error[] = "Nhập Name!"; 
       	}
       	else if($description=="") {
          	$error[] = "Nhập description!";
       	}
       	else if($limitStudent=="") {
          	$error[] = "Nhập limit Student!"; 
       	}
		else if($fileID=="") {
          	$error[] = "Nhập file ID!";
       	}
       	else if($batchExerciseID=="") {
          	$error[] = "Nhập batch Exercise ID!";
       	}

       	else
       	{
          	try
          	{
		        //thay đổi dữ liệu database
				$sql = "update topic_exercises
						set name = '".$name."',description = '".$description."',limit_student = '".$limitStudent."',file_id = '".$fileID."',batch_exercise_id = '".$batchExerciseID."',updated_by = '".$_SESSION['id']."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=topic_exercises");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>