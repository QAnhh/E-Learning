<?php
    if(isset($_POST["saveProfile"])){
        $unitName = trim($_POST["unitName"]);
        $status = trim($_POST["status"]);
        $learnTime = trim($_POST["learnTime"]);
        $classroomId = trim($_POST["classroomId"]);

        if($unitName=="") {
            $error[] = "Nhập unit Name!"; 
        }
        else if($status=="") {
            $error[] = "Nhập status!";
        }
        else if($learnTime=="") {
            $error[] = "Nhập learn Time!"; 
        }
        else if($classroomId=="") {
            $error[] = "Nhập classroom Id!";
        }
        else
        {
            try
            {
                //lấy startDate và endDate của lớp học
                $sql = "SELECT * FROM class_rooms
                        WHERE id = '".$classroomId."'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $startDate = $row['start_date'];
                $endDate = $row['end_date'];
                //ép kiểu về dạng date
                $i= date('Y-m-d', strtotime($learnTime));
                if($i>=$startDate && $i<=$endDate){
                    //thay đổi dữ liệu database
                    $sql = "UPDATE classroom_units
                            SET unit_name = '".$unitName."',status = '".$status."',learn_time = '".$learnTime."',classrooom_id = '".$classroomId."',updated_by = '".$_SESSION['id']."'
                            where id = '".$_GET['edit']."'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    header("location: manageDatabase.php?page=classroom_units");
                    setcookie("success", "Sửa thành công!", time()+1, "/","");
                }
                else{
                    $error[] = "Thời gian học không hợp lệ!";
                }
                    
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
?>