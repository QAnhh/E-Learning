<?php
    //kiểm tra btn-signup
    if(isset($_POST["btn-signup"])){
        $className = trim($_POST["className"]);
        $numberStudent = trim($_POST["numberStudent"]);
        $startDate = trim($_POST["startDate"]);
        $endDate = trim($_POST["endDate"]);
        print_r($startDate);
        print_r($endDate);
        $numberWeek = date_diff($startDate,$endDate);
        $userId = $_SESSION['id'];

        if($className=="") {
            $error[] = "Nhập class name!"; 
        }
        else if($numberStudent=="") {
            $error[] = "Nhập numberStudent!"; 
        }
        else if($startDate=="") {
            $error[] = "Nhập startDate!"; 
        }
        else if($endDate=="") {
            $error[] = "Nhập endDate!"; 
        }

        else
        {
            try
            {
             
                $sql = "INSERT into class_rooms (class_name,number_student,number_week,start_date,end_date,user_id,created_by)
                        VALUES ('".$className."','".$numberStudent."','".$numberWeek."','".$startDate."','".$endDate."','".$userId."','".$_SESSION['id']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location: manageDatabase.php?page=class_rooms");
                setcookie("success", "Thêm thành công!", time()+1, "/","");
               
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
      
    }
?>