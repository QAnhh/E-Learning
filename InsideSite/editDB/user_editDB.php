<?php
		
	if(isset($_POST["saveProfile"])){
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$phone = trim($_POST["phone"]);

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
				$sql = "update user_
						set name = '".$name."',email = '".$email."',phone = '".$phone."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location: manageDatabase.php?page=user_");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>