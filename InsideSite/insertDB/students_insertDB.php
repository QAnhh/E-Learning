<?php
	//kiểm tra btn-signup
	if(isset($_POST["btn-signup"])){
		$uname = trim($_POST['userName']);
		$umail = trim($_POST['email']);
        $upass = trim($_POST['password']); 
        $upass2 = trim($_POST['password2']); 
        $ufullname = trim($_POST['fullName']);
        $uaddress = trim($_POST['address']);
        $uphone = trim($_POST['phoneNumber']);
        $ugender = $_POST['rdGender']=='male';
	
     
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
             $stmt = $conn->prepare("SELECT code FROM students WHERE code=:uname");
             $stmt->execute(array(':uname'=>$uname));
             $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
             if($row['code']==$uname) {
                $error[] = "Username bị trùng!";
             }
             else
             {
                $row = array($uname,$ufullname,$umail,password_hash($upass, PASSWORD_DEFAULT),$uaddress,$uphone);
                if($student->register($uname,$upass,$ufullname,$ugender,$umail,$uphone,$uaddress)) 
                {
                	$sql = "UPDATE students 
                			SET created_by = '".$_SESSION['id']."'
                			WHERE Code = '".$uname."'";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
                    header("location:http:manageDatabase.php?page=students");
					setcookie("success", "Thêm thành công!", time()+1, "/","");
                }
             }
         }
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }
      }
		
	}
?>