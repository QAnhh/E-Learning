<?php
    //kiểm tra btn-signup
    if(isset($_POST["btn-signup"])){
        $name = trim($_POST["name"]);
        $numberTopic = trim($_POST["numberTopic"]);
        $classroomID = trim($_POST["classroomID"]);
        $fileID = trim($_POST["fileID"]);
        if($name=="") {
            $error[] = "Nhập name!"; 
        }
        else if($numberTopic=="") {
            $error[] = "Nhập numberTopic!";
        }
        else if($classroomID=="") {
            $error[] = "Nhập classroom ID!";
        }
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
                            $sql = "INSERT into batch_exercises (name,number_topic,classroom_id,file_id)
                                    VALUES ('".$name."','".$numberTopic."','".$classroomID."','".$fileID."')";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            header("location:manageDatabase.php?page=batch_exercises");
                            setcookie("success", "Thêm thành công!", time()+1, "/","");
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
