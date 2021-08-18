<?php
	if(isset($_POST["saveProfile"])){
		$fileName = trim($_POST["fileName"]);
		$fileUrl = trim($_POST["fileUrl"]);
		$size = trim($_POST["size"]);
		$type = trim($_POST["type"]);

		if($fileName=="") {
          	$error[] = "Nhập file Name!"; 
       	}
       	else if($fileUrl=="") {
          	$error[] = "Nhập file Url!";
       	}
       	else if($size=="") {
          	$error[] = "Nhập size!"; 
       	}
		else if($type=="") {
          	$error[] = "Nhập type!";
       	}
       	else
       	{
          	try
          	{
		        //thay đổi dữ liệu database
				$sql = "update files
						set file_name = '".$fileName."',file_url = '".$fileUrl."',size = '".$size."',type = '".$type."'
						where id = '".$_GET['edit']."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				header("location:manageDatabase.php?page=files");
				setcookie("success", "Sửa thành công!", time()+1, "/","");
         	}
         	catch(PDOException $e)
         	{
            	echo $e->getMessage();
         	}
     	}
		
	}
?>