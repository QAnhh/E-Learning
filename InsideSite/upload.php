<?PHP
session_start();
require_once "progress/dbConnect.php";
ob_start();
if(!empty($_FILES['uploaded_file']))
{
  $fileName = trim($_FILES["uploaded_file"]['name']);
  $fileUrl = "uploads/".$fileName;
  $size = $_FILES["uploaded_file"]['size'];
  $type = $_FILES["uploaded_file"]['type'];
  try
  {
    $sql = "INSERT into files (file_name,file_url,size,type)
    VALUES ('".$fileName."','".$fileUrl."','".$size."','".$type."')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    setcookie("success", "Thêm thành công!", time()+1, "/","");
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
  $path = "uploads/";
  $path = $path . basename( $_FILES['uploaded_file']['name']);
  echo $path;
  if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
    echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
    " has been uploaded";
    header("location:manageDatabase.php?page=files");
  } else{
    echo "There was an error uploading the file, please try again!";
  }
}
?>