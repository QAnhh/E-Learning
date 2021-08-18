<?php 
    //kiểm tra btn-signup
    if(isset($_POST["btn-signup"])){
        $userID = trim($_POST["userID"]);
        $studentCode = trim($_POST["studentCode"]);
        $content = trim($_POST["content"]);
        $studentExercisesSubmissionsID = trim($_POST["studentExercisesSubmissionsID"]);

        if($userID=="") {
            $error[] = "Nhập user ID!"; 
        }
        else if($studentCode=="") {
            $error[] = "Nhập student Code!";
        }
        else if($content=="") {
            $error[] = "Nhập content!"; 
        }
        else if($studentExercisesSubmissionsID=="") {
            $error[] = "Nhập student Exercises Submissions Id!";
        }
        else
        {
            try
            {
                 
                $sql = "INSERT into comment_submissions (user_id,student_code,content,student_exercises_submissions_id)
                        VALUES ('".$userID."','".$studentCode."','".$content."','".$studentExercisesSubmissionsID."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                header("location: manageDatabase.php?page=comment_submissions");
                setcookie("success", "Thêm thành công!", time()+1, "/","");
                 
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        } 
      
    }
?>