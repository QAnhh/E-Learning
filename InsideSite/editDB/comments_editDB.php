<?php
    if(isset($_POST["saveProfile"])){
        $userID = trim($_POST["userID"]);
        $content = trim($_POST["content"]);
        $studentCode = trim($_POST["studentCode"]);
        $postID = trim($_POST["postID"]);

        if($userID=="") {
                $error[] = "Nhập user ID!"; 
            }
            else if($studentCode=="") {
                $error[] = "Nhập student Code!";
            }
            else if($content=="") {
                $error[] = "Nhập content!"; 
            }
        else if($postID=="") {
                $error[] = "Nhập post Id!";
            }
            else
            {
                try
                {
                //thay đổi dữ liệu database
            $sql = "update comments
                set user_id = '".$userID."',content = '".$content."',student_code = '".$studentCode."',post_id = '".$postID."',updated_by = '".$_SESSION['id']."'
                where id = '".$_GET['edit']."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("location: manageDatabase.php?page=comments");
            setcookie("success", "Sửa thành công!", time()+1, "/","");
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
?>