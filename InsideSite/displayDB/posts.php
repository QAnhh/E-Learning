<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from posts
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

	<title>Gentelella Alela! | </title>

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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">user id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="userID" class="form-control" value="<?php echo $profile['user_id'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">content </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="content" class="form-control" value="<?php echo $profile['content'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">student code </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="studentCode" class="form-control" value="<?php echo $profile['student_code'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">scheduled date </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="date" name="scheduledDate" class="form-control" value="<?php echo $profile['scheduled_date'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">type </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="type" class="form-control" value="<?php echo $profile['type'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">status </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="status" class="form-control" value="<?php echo $profile['status'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">classroom id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="classroomID" class="form-control" value="<?php echo $profile['classroom_id'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">file id </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="fileID" class="form-control" value="<?php echo $profile['file_id'] ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="manageDatabase.php?page=posts" class="btn btn-primary ">Back</a>
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
			$userID = trim($_POST["userID"]);
			$content = trim($_POST["content"]);
			$studentCode = trim($_POST["studentCode"]);
			$scheduledDate = trim($_POST["scheduledDate"]);
			$type = trim($_POST["type"]);
			$status = trim($_POST["status"]);
			$classroomID = trim($_POST["classroomID"]);
			$fileID = trim($_POST["fileID"]);

			if($userID=="") {
	          	$error[] = "Nhập user ID!"; 
	       	}
	       	else if($studentCode=="") {
	          	$error[] = "Nhập student Code!";
	       	}
	       	else if($content=="") {
	          	$error[] = "Nhập content!"; 
	       	}
			else if($scheduledDate=="") {
	          	$error[] = "Nhập scheduled Date!";
	       	}
	       	else if($type=="") {
	          	$error[] = "Nhập type!";
	       	}
	       	else if($status=="") {
	          	$error[] = "Nhập status!";
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
			        //thay đổi dữ liệu database
					$sql = "update posts
							set user_id = '".$userID."',content = '".$content."',studentCode = '".$studentCode."',scheduled_date = '".$scheduledDate."',type = '".$type."',status = '".$status."',classroom_id = '".$classroomID."',file_id = '".$fileID."',updated_by = '".$_SESSION['id']."'
							where id = '".$_GET['edit']."'";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					header("location: manageDatabase.php?page=posts");
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
		$sql = "DELETE from posts
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location: manageDatabase.php?page=posts");
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
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">user id </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="userID" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">content </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="content" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">student code </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="studentCode" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">scheduled date </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="date" name="scheduledDate" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">type </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="type" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">status </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="status" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">classroom id </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="classroomID" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">file id </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="fileID" class="form-control" />
								</div>
							</div>			
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<a href="manageDatabase.php?page=posts" class="btn btn-primary ">Back</a>
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
			$userID = trim($_POST["userID"]);
			$content = trim($_POST["content"]);
			$studentCode = trim($_POST["studentCode"]);
			$scheduledDate = trim($_POST["scheduledDate"]);
			$type = trim($_POST["type"]);
			$status = trim($_POST["status"]);
			$classroomID = trim($_POST["classroomID"]);
			$fileID = trim($_POST["fileID"]);

			if($userID=="") {
	          	$error[] = "Nhập user ID!"; 
	       	}
	       	else if($studentCode=="") {
	          	$error[] = "Nhập student Code!";
	       	}
	       	else if($content=="") {
	          	$error[] = "Nhập content!"; 
	       	}
			else if($scheduledDate=="") {
	          	$error[] = "Nhập scheduled Date!";
	       	}
	       	else if($type=="") {
	          	$error[] = "Nhập type!";
	       	}
	       	else if($status=="") {
	          	$error[] = "Nhập status!";
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
		             
	             	$sql = "INSERT into posts (user_id,content,student_code,scheduled_date,type,status,classroom_id,file_id,created_by)
	                		VALUES ('".$userID."','".$content."','".$studentCode."','".$scheduledDate."','".$type."','".$status."','".$classroomID."','".$fileID."','".$_SESSION['id']."')";
	                $stmt = $conn->prepare($sql);
	                $stmt->execute();
	                header("location: manageDatabase.php?page=posts");
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
							<th>user id</th>
							<th>content</th>
							<th>student code</th>
							<th>scheduled date</th>
							<th>time to top</th>
							<th>type</th>
							<th>status</th>
							<th>classroom id</th>
							<th>created at</th>
							<th>updated at</th>
							<th>deleted at</th>
							<th>created by</th>
							<th>updated by</th>
							<th>deleted by</th>
							<th>file id</th>
                        </tr>
                      </thead>

                      <tbody>
                        
<?php
	$sql = "select * from posts";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['user_id'].'</td>';
		echo '<td>'.$row['content'].'</td>';
		echo '<td>'.$row['student_code'].'</td>';
		echo '<td>'.$row['scheduled_date'].'</td>';
		echo '<td>'.$row['time_to_top'].'</td>';
		echo '<td>'.$row['type'].'</td>';
		echo '<td>'.$row['status'].'</td>';
		echo '<td>'.$row['classroom_id'].'</td>';
		echo '<td>'.$row['created_at'].'</td>';
		echo '<td>'.$row['updated_at'].'</td>';
		echo '<td>'.$row['deleted_at'].'</td>';
		echo '<td>'.$row['created_by'].'</td>';
		echo '<td>'.$row['updated_by'].'</td>';
		echo '<td>'.$row['deleted_by'].'</td>';
		echo '<td>'.$row['file_id'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=posts&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=posts&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=posts&&insert" class="btn btn-outline-dark" >Thêm</a>
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