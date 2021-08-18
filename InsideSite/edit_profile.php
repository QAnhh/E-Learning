<?php
    session_start();
    require_once "progress/dbConnect.php";
?>

<?php
if(isset($_POST["btn_submit"])){
    $name = trim($_POST["txt_name"]);
    $birthday = trim($_POST["date_birthday"]);
    $email = trim($_POST["txt_email"]);
    $phone = trim($_POST["txt_phone"]);
    $address = trim($_POST["txt_address"]);
    $id= $_SESSION['id'];
    
    if($name=="") {
          $error[] = "Nhập username!"; 
       }
       else if($email=="") {
          $error[] = "Nhập email!"; 
       }
       else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $error[] = 'Email phải hợp lệ!';
       }
       else
       {
          try
          {
            //thay đổi dữ liệu database
            
            $sql = "UPDATE students
                    SET name = '".$name."',birthday = '".$birthday."',email = '".$email."',phone = '".$phone."',address = '".$address."'
                    where id = '".$id."'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $_SESSION['ten']=$name;
            ?>
            <script type="text/javascript">
                alert("Successfully");
                window.location ="student_profile.php";
            </script>
            <?php
         }
         catch(PDOException $e)
         {
            echo $e->getMessage();
         }
     }
    }
?>
<?php
    require_once "progress/dbConnect.php";
    $sql = "select * from students where id like '".$_SESSION['id']."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    $birthday = $row['birthday'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $image = $row['image_url'];
?>


<?php
    if(isset($_POST['update'])){
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
        //print_r($_FILES['u_image']['name']);
        $picName="upload/".$_SESSION['id'].$_POST['u_image'];
        move_uploaded_file($_FILES["u_image"]["tmp_name"], $picName);
        $sql = "UPDATE students SET image_url = '".$picName."' WHERE id = '" . $_SESSION['id'] . "'";

    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Update user profile - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_edit_profile.css" rel="stylesheet">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="content-panel">
                    <h2 class="title">Edit Profile<span class="pro-label label label-warning">PRO</span></h2>
                    <form class="form-horizontal" action="" method="post">
                        <fieldset class="fieldset">
                            <div class="form-group avatar">
                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                    <img class="img-rounded img-responsive" src="img/phoenix.jpg" alt="">
                                </figure>
                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                    <input type="file" class="file-uploader pull-left" name="u_image" id="u_image">
                                    <button type="submit" class="btn btn-sm btn-default-alt pull-left" name="update">Update Image</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Full Name</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control"name="txt_name"  value="<?php print($name);?>">
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Birthday</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="date" class="form-control" name="date_birthday" value="<?php print($birthday);?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="txt_email"  value="<?php print($email);?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Phone</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="txt_phone"  value="<?php print($phone);?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Address</label>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="txt_address" value="<?php print($address);?>">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                            
                            <input type="submit" name = "btn_submit" class="btn btn-primary" value="Update Profile" >
                         
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>


