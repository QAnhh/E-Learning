<?php
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
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
	             
             	$sql = "INSERT into topic_exercises (name,description,limit_student,file_id,batch_exercise_id,created_by)
                		VALUES ('".$name."','".$description."','".$limitStudent."','".$fileID."','".$batchExerciseID."','".$_SESSION['id']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location: manageDatabase.php?page=topic_exercises");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>