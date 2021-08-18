<?php 
    if(isset($_POST["saveProfile"])){
        $name = trim($_POST["name"]);
        $numberTopic = trim($_POST["numberTopic"]);
        // $startDate = trim($_POST["startDate"]);
        // $deadline = trim($_POST["deadline"]);
        // $endDate = trim($_POST["endDate"]);
        // $methodsSubmit = trim($_POST["methodsSubmit"]);
        // $methodsMark = trim($_POST["methodsMark"]);
        // $status = trim($_POST["status"]);
        // $limitSize = trim($_POST["limitSize"]);
        // $isNotificationMark = trim($_POST["isNotificationMark"]);
        $classroomID = trim($_POST["classroomID"]);
        // $type = trim($_POST["type"]);
        // $content = trim($_POST["content"]);
        $fileID = trim($_POST["fileID"]);

        if($name=="") {
            $error[] = "Nhập name!"; 
        }
        else if($numberTopic=="") {
            $error[] = "Nhập numberTopic!";
        }
        // else if($startDate=="") {
        //     $error[] = "Nhập startDate!";
        // }
        // else if($deadline=="") {
        //     $error[] = "Nhập deadline!";
        // }
        // else if($endDate=="") {
        //     $error[] = "Nhập endDate!";
        // }
        // else if($methodsSubmit=="") {
        //     $error[] = "Nhập methods Submit!"; 
        // }
        // else if($methodsMark=="") {
        //     $error[] = "Nhập methods Mark!";
        // }
        // else if($status=="") {
        //     $error[] = "Nhập status!";
        // }
        // else if($limitSize=="") {
        //     $error[] = "Nhập limit Size!";
        // }
        // else if($isNotificationMark=="") {
        //     $error[] = "Nhập isNotificationMark!";
        // }
        else if($classroomID=="") {
            $error[] = "Nhập classroom ID!";
        }
        // else if($type=="") {
        //     $error[] = "Nhập type!";
        // }
        // else if($content=="") {
        //     $error[] = "Nhập content!";
        // }
        else if($fileID=="") {
            $error[] = "Nhập file ID!";
        }
        else
        {
            try
            {
                $sql = "SELECT * FROM files
                        WHERE id = '".$fileID."'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount()>0){
                    $sql = "SELECT * FROM class_rooms
                        WHERE id = '".$classroomID."'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if($stmt->rowCount()>0){
                        $sql = "SELECT * FROM batch_exercises
                                WHERE classroom_id = '".$classroomID."' and file_id = '".$fileID."'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        if($stmt->rowCount()==0){
                            //thay đổi dữ liệu database
                            $sql = "UPDATE batch_exercises
                                    SET name = '".$name."',number_topic = '".$numberTopic."',classroom_id = '".$classroomID."',udpated_by = '".$_SESSION['id']."',file_id = '".$fileID."'
                                    WHERE id = '".$_GET['edit']."'";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            header("location:http:manageDatabase.php?page=batch_exercises");
                            setcookie("success", "Sửa thành công!", time()+1, "/","");
                        }
                        else{
                        $error[] = "Đã tồn tại !";
                        }
                    }
                    else{
                        $error[] = "Không tồn tại lớp học!";
                    }
                }
                else{
                    $error[] = "Không tồn tại file!";
                }
            
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
    //start_date = '".$startDate."',deadline = '".$deadline."',end_date = '".$endDate."',methods_submit = '".$methodsSubmit."',methods_mark = '".$methodsMark."',status = '".$status."',limit_size = '".$limitSize."',is_notification_mark = '".$isNotificationMark."',type = '".$type."',content = '".$content."'
?>