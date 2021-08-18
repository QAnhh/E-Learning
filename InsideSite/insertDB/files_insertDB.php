<?php 
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){

		$fileName = trim($_POST["fileName"]);
		$fileUrl = trim($_POST["fileUrl"]);
		$size = 1;
		$type = "zip";

		if($fileName=="") {
          	$error[] = "Nhập file Name!"; 
       	}
       	else if($fileUrl=="") {
          	$error[] = "Nhập file Url!";
       	}
      	else
       	{
	        try
	        {
	            
             	$sql = "INSERT into files (file_name,file_url,size,type)
                		VALUES ('".$fileName."','".$fileUrl."','".$size."','".$type."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location:manageDatabase.php?page=files");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
	             
	        }
	        catch(PDOException $e)
	        {
	            echo $e->getMessage();
	        }
    	}	
		
	}
?>