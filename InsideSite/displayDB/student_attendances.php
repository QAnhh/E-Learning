<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from student_attendances
				where id = '".$_GET['edit']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$profile=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- Bootstrap -->
	<link href="../css/cssdb/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../css/cssdb/font-awesome.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../css/cssdb/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
	<div class="main_container">			
			<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="row">
					<div class="col-md-12 col-sm-12 ">
						<div class="x_panel">
							<div class="x_title">
								<h2>Edit</h2>
								</div>
									<div class="x_content">
									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="classroom-unit-id">classroom unit id</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="classroomUnitID" class="form-control" value="<?php echo $profile['classroom_unit_id'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="student-code">student code </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="studentCode" class="form-control" value="<?php echo $profile['student_code'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">status </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="datetime-local" name="status" class="form-control" value="<?php echo $profile['status'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">reason </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="reason" class="form-control" value="<?php echo $profile['reason'] ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="manageDatabase.php?page=student_attendances" class="btn btn-primary ">Back</a>
												<button type="submit" name="saveProfile" class="btn btn-success pull-right">Submit</button>
											</div>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			<!-- /page content -->

	<!-- jQuery -->
	<script src="../js/jsdb/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../js/jsdb/bootstrap.bundle.min.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../js/jsdb/custom.min.js"></script>

</body>
</html>

<?php
		
		if(isset($_POST["saveProfile"])){
			$classroomUnitID = trim($_POST["classroomUnitID"]);
			$studentCode = trim($_POST["studentCode"]);
			$status = trim($_POST["status"]);
			$reason = trim($_POST["reason"]);
			$timeAttendance = trim($_POST["timeAttendance"]);

			if($classroomUnitID=="") {
	          	$error[] = "Nhập classroom unit ID!"; 
	       	}
	       	else if($studentCode=="") {
	          	$error[] = "Nhập student Code!";
	       	}
	       	else if($status=="") {
	          	$error[] = "Nhập status!"; 
	       	}
			else if($reason=="") {
	          	$error[] = "Nhập reason!";
	       	}
	       	else if($timeAttendance=="") {
	          	$error[] = "Nhập time Attendance!";
	       	}
	       	else
	       	{
	          	try
	          	{
			        //thay đổi dữ liệu database
					$sql = "update student_attendances
							set classroom_unit_id = '".$classroomUnitID."',student_code = '".$studentCode."',status = '".$status."',reason = '".$reason."',time_attendance = '".$timeAttendance."',updated_by = '".$_SESSION['id']."'
							where id = '".$_GET['edit']."'";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					header("location: manageDatabase.php?page=student_attendances");
					setcookie("success", "Sửa thành công!", time()+1, "/","");
	         	}
	         	catch(PDOException $e)
	         	{
	            	echo $e->getMessage();
	         	}
	     	}
			
		}
		if(isset($error))
        {
            foreach($error as $err)
            {
                ?>
                <div class="right_col" role="main">
                	<div class="alert alert-danger">
                    	<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $err; ?>
                    </div>
                </div>
                <?php
            }
        }	
	}
	//kiểm tra delete
	else if(isset($_GET['del'])){
		$sql = "DELETE from student_attendances
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location: manageDatabase.php?page=student_attendances");
	}
	//kiểm tra insert
	else if(isset($_GET['insert'])){
?>
		<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin</title>

	<!-- Bootstrap -->
	<link href="../css/cssdb/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="../css/cssdb/font-awesome.min.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="../css/cssdb/green.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="../css/cssdb/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
	<div class="main_container">
		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="x_panel">
						<div class="x_title">
							<h2>Registration Form <small>Click to validate</small></h2>
						</div>
					<div class="x_content">
									<!-- start form for validation -->
						<form id="demo-form" data-parsley-validate class="form-horizontal form-label-left" action="#" method="post">
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="classroom-unit-id">classroom unit id</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="classroomUnitID" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="student-code">student code </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="studentCode" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">status </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="datetime-local" name="status" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">reason </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="reason" class="form-control">
								</div>
							</div>		
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<a href="manageDatabase.php?page=student_attendances" class="btn btn-primary ">Back</a>
									<button type="submit" name="btn-signup" class="btn btn-success pull-right">Submit</button>
								</div>
							</div>
						</form>
							<!-- end form for validations -->
					</div>
				</div>
			</div>				
		</div>
	</div>
</div>

	<!-- jQuery -->
	<script src="../js/jsdb/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="../js/jsdb/bootstrap.bundle.min.js"></script>
	<!-- iCheck -->
	<script src="../js/jsdb/icheck.min.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="../js/jsdb/custom.min.js"></script>

</body>
</html>

<?php
		//kiểm tra btn-signup
		if(isset($_POST["btn-signup"])){
			$classroomUnitID = trim($_POST["classroomUnitID"]);
			$studentCode = trim($_POST["studentCode"]);
			$status = trim($_POST["status"]);
			$reason = trim($_POST["reason"]);
	      
	       	if($classroomUnitID=="") {
	          	$error[] = "Nhập classroom unit ID!"; 
	       	}
	       	else if($studentCode=="") {
	          	$error[] = "Nhập student Code!";
	       	}
	       	else if($status=="") {
	          	$error[] = "Nhập status!"; 
	       	}
			else if($reason=="") {
	          	$error[] = "Nhập reason!";
	       	}
	      	else
	       	{
		        try
		        {
		             
	             	$sql = "INSERT into student_attendances (classroom_unit_id,student_code,status,reason,created_by)
	                		VALUES ('".$classroomUnitID."','".$studentCode."','".$status."','".$reason."','".$_SESSION['id']."')";
	                $stmt = $conn->prepare($sql);
	                $stmt->execute();
	                header("location: manageDatabase.php?page=student_attendances");
					setcookie("success", "Thêm thành công!", time()+1, "/","");
		             
		        }
		        catch(PDOException $e)
		        {
		            echo $e->getMessage();
		        }
	    	}	
			
		}
		if(isset($error))
        {
            foreach($error as $err)
            {
                ?>
                <div class="right_col" role="main">
                	<div class="alert alert-danger">
                    	<i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $err; ?>
                    </div>
                </div>
                <?php
            }
        }
	}
	else{
		if(isset($_COOKIE['success'])){
			?>
			<div class="right_col">	
			<?php
			echo $_COOKIE['success'];
		}
?>
			</div>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Students</title>
    <!-- Bootstrap -->
    <link href="../css/cssdb/bootstrap.min.css" rel="stylesheet">  

    <!-- Custom Theme Style -->
    <link href="../css/cssdb/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          	<th>id</th>
							<th>classroom unit id</th>
							<th>student code</th>
							<th>status</th>
							<th>reason</th>
							<th>time attendance</th>
							<th>created at</th>
							<th>updated at</th>
							<th>deleted at</th>
							<th>created by</th>
							<th>updated by</th>
							<th>deleted by</th>
                        </tr>
                      </thead>

                      <tbody>
                        
<?php
	$sql = "select * from student_attendances";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['classroom_unit_id'].'</td>';
		echo '<td>'.$row['student_code'].'</td>';
		echo '<td>'.$row['status'].'</td>';
		echo '<td>'.$row['reason'].'</td>';
		echo '<td>'.$row['time_attendance'].'</td>';
		echo '<td>'.$row['created_at'].'</td>';
		echo '<td>'.$row['updated_at'].'</td>';
		echo '<td>'.$row['deleted_at'].'</td>';
		echo '<td>'.$row['created_by'].'</td>';
		echo '<td>'.$row['updated_by'].'</td>';
		echo '<td>'.$row['deleted_by'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=student_attendances&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=student_attendances&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=student_attendances&&insert" class="btn btn-outline-dark" >Thêm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	</div>
	
          
        <!-- /page content -->

    <!-- jQuery -->
    <script src="../js/jsdb/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../js/jsdb/bootstrap.bundle.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../js/jsdb/custom.min.js"></script>

  </body>
</html>


<?php
}
?>