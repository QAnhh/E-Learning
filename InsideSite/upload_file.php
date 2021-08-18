<?php
require_once "progress/dbConnect.php";
  if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
    if ($_FILES['fileUpload']['error'] > 0)
      echo "Upload lỗi rồi!";
    else {
      $file_tmp = $_FILES['fileUpload']['tmp_name'];
      $file_name = $_FILES['fileUpload']['name'];
      $file_destination = 'uploads/' . $file_name;
      $file_type = $_FILES['fileUpload']['type'];
      $size = ((int)$_FILES['fileUpload']['size'] / 1024);
     
      $name = $_FILES['fileUpload']['name'];
      $type = $_FILES['fileUpload']['type'];
      if(move_uploaded_file($file_tmp, $file_destination)){
        $url = "uploads/" . $_FILES['fileUpload']['name'];
        if($student->uploadFile($name,$url,$size,$type)){
          print "File uploaded successfully";
        }else{
          print "Failed to upload file.";
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>upload file</title>
  <link rel="stylesheet" href="">
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="fileUpload" value="" multipart>
    <input type="submit" name="up" value="Upload">
  </form>
</body>

</html>