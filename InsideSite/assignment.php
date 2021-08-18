<?php
require_once "progress/dbConnect.php";
if (!isset($student) || !$student->is_loggedin()) {
    header("Location:index.php?page=login");
    ob_end_flush();
}
else{

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload View & Download file in PHP and MySQL | Demo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>
<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                
                
                $sql = "SELECT * FROM batch_exercises join files on batch_exercises.file_id = files.id
                        where classroom_id in ( select classroom_id from student_classrooms 
                                                where student_code = '".$_SESSION['id']."')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['file_name']; ?></td>
                        <td><a href="uploads/<?php echo $row['file_name']; ?>" target="_blank">View</a></td>
                        <td><a href="uploads/<?php echo $row['file_name']; ?>" download>Download</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>