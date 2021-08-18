<?php
		
	if(isset($_POST["saveProfile"])){
		$topicExercisesID = trim($_POST["topicExercisesID"]);
		$studentCode = trim($_POST["studentCode"]);
		$batchExercisesID = trim($_POST["batchExercisesID"]);

		if($topicExercisesID=="") {
          	$error[] = "Nhập topic Exercises ID!"; 
       	}
       	else if($studentCode=="") {
          	$error[] = "Nhập student Code!";
       	}
       	else if($batchExercisesID=="") {
          	$error[] = "Nhập batch Exercises ID!"; 
       	}
       	else
       	{
          	try
          	{
		        //thay đổi dữ liệu database
				$sql = "update student_register_topics
						set topic_exercises_id = '".$topicExercisesID."',student_code = '".$studentCode."',batch_exercises_id = '".$batchExercisesID."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=student_register_topics");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>