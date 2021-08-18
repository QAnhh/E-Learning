<?php
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
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
	             
             	$sql = "INSERT into student_register_topics (topic_exercises_id,student_code,batch_exercises_id)
                		VALUES ('".$topicExercisesID."','".$studentCode."','".$batchExercisesID."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location: manageDatabase.php?page=student_register_topics");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>