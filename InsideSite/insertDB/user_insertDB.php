<?php
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
		$uname = trim($_POST['userName']);
		$umail = trim($_POST['email']);
        $upass = trim($_POST['password']); 
        $upass2 = trim($_POST['password2']); 
        $ufullname = trim($_POST['fullName']);
        $uphone = trim($_POST['phoneNumber']);
     
       if($uname=="") {
          $error[] = "Nhập username!"; 
       }
       else if($umail=="") {
          $error[] = "Nhập email!"; 
       }
       else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
          $error[] = 'Email phải hợp lệ!';
       }
       else if($upass=="") {
          $error[] = "Nhập password !";
       }
       else if ($upass2!=$upass){
          $error[] = "Mật khẩu phải trùng khớp";
       }
       else if(strlen($upass) < 8){
          $error[] = "Mật khẩu phải dài hơn 7 kí tự"; 
       }
       else
       {
          try
          {
             $stmt = $conn->prepare("SELECT login FROM user_ WHERE login like '".$uname."'");
             $stmt->execute();
             $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
             if($stmt->rowCount() > 0) {
                $error[] = "Username bị trùng!";
             }
             else
             {
             	$new_upass = md5($upass);
             	$sql = "INSERT into user_ (login,password_hash,name,email,created_by,phone)
                		VALUES ('".$uname."','".$new_upass."','".$ufullname."','".$umail."','".$_SESSION['id']."','".$uphone."')";
                echo $sql;
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location:manageDatabase.php?page=user_");
				setcookie("success", "Thêm thành công!", time()+1, "/","");
             }
         }
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }
      }
		
	}
?>