<?php
	if(isset($_POST["saveProfile"])){
		$className = trim($_POST["className"]);
		$numberStudent = trim($_POST["numberStudent"]);
		$numberWeek = trim($_POST["numberWeek"]);
		$startDate = trim($_POST["startDate"]);
		$endDate = trim($_POST["endDate"]);
		$userId = trim($_POST["userId"]);

		if($className=="") {
	      	$error[] = "Nhập class name!"; 
	   	}
	   	else if($numberStudent=="") {
	      	$error[] = "Nhập numberStudent!"; 
	   	}
	   	else if($numberWeek=="") {
	      	$error[] = "Nhập numberWeek!"; 
	   	}
	   	else if($startDate=="") {
	      	$error[] = "Nhập startDate!"; 
	   	}
	   	else if($endDate=="") {
	      	$error[] = "Nhập endDate!"; 
	   	}
	   	else if($userId=="") {
	      	$error[] = "Nhập userId!"; 
	   	}

	   	else
	   	{
	      	try
	      	{
		        //thay đổi dữ liệu database
				$sql = "update class_rooms
						set class_name = '".$className."',number_student = '".$numberStudent."',number_week = '".$numberWeek."',start_date = '".$startDate."',end_date = '".$endDate."',user_id = '".$userId."',updated_by = '".$_SESSION['id']."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=class_rooms");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
	     	}
	     	catch(PDOException $e)
	     	{
	        	echo $e->getMessage();
	     	}
	 	}
		
	}
?>