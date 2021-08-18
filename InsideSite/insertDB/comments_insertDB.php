<?php 
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
		$userID = trim($_POST["userID"]);
		$content = trim($_POST["content"]);
		$studentCode = trim($_POST["studentCode"]);
		$postID = trim($_POST["postID"]);

		if($userID=="") {
          	$error[] = "Nhập user ID!"; 
       	}
       	else if($studentCode=="") {
          	$error[] = "Nhập student Code!";
       	}
       	else if($content=="") {
          	$error[] = "Nhập content!"; 
       	}
		else if($postID=="") {
          	$error[] = "Nhập post Id!";
       	}
       	else
       	{
	        try
	        {
	             
             	$sql = "INSERT into comments (user_id,content,student_code,post_id,created_by)
                		VALUES ('".$userID."','".$content."','".$studentCode."','".$postID."','".$_SESSION['id']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location: manageDatabase.php?page=comments");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>