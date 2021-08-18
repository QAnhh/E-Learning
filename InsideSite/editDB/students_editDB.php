<?php
		
	if(isset($_POST["saveProfile"])){
		$name = trim($_POST["name"]);
		$birthday = trim($_POST["birthday"]);
		$email = trim($_POST["email"]);
		$phone = trim($_POST["phone"]);
		$address = trim($_POST["address"]);

		if($name=="") {
          	$error[] = "Nhập username!"; 
       	}
       	else if($email=="") {
          	$error[] = "Nhập email!"; 
       	}
       	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          	$error[] = 'Email phải hợp lệ!';
       	}
       	else
       	{
          	try
          	{
		        //thay đổi dữ liệu database
				$sql = "update students
						set name = '".$name."',birthday = '".$birthday."',email = '".$email."',phone = '".$phone."',address = '".$address."',updated_by = '".$_SESSION['id']."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=students");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>