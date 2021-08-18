<?php
	//kiểm tra edit
	if(isset($_GET['edit'])){
		//lấy dữ liệu (nếu có)
		$sql = "select * from email_logs
				where id = '".$_GET['edit']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$profile=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="subject-Type" subject="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" subject="IE=edge">
	<meta name="viewport" subject="width=device-width, initial-scale=1">

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
			<!-- page subject -->
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
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">to email </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="toEmail" class="form-control" value="<?php echo $profile['to_email'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">subject </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="subject" class="form-control" value="<?php echo $profile['subject'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">view </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="view" class="form-control" value="<?php echo $profile['view'] ?>">
											</div>
										</div>	
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">parameter </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="parameter" class="form-control" value="<?php echo $profile['parameter'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">status </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="status" class="form-control" value="<?php echo $profile['status'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">type </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="type" class="form-control" value="<?php echo $profile['type'] ?>">
											</div>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">num submissions </label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="numSubmissions" class="form-control" value="<?php echo $profile['num_submissions'] ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="manageDatabase.php?page=email_logs" class="btn btn-primary ">Back</a>
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
			<!-- /page subject -->

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
			$toEmail = trim($_POST["toEmail"]);
			$subject = trim($_POST["subject"]);
			$view = trim($_POST["view"]);
			$parameter = trim($_POST["parameter"]);
			$status = trim($_POST["status"]);
			$type = trim($_POST["type"]);
			$numSubmissions = trim($_POST["numSubmissions"]);

			if($toEmail=="") {
	          	$error[] = "Nhập to email!"; 
	       	}
	       	else if($view=="") {
	          	$error[] = "Nhập view!";
	       	}
	       	else if($subject=="") {
	          	$error[] = "Nhập subject!"; 
	       	}
			else if($parameter=="") {
	          	$error[] = "Nhập parameter!";
	       	}
	       	else if($status=="") {
	          	$error[] = "Nhập status!";
	       	}
	       	else if($type=="") {
	          	$error[] = "Nhập type!";
	       	}
	       	else if($numSubmissions=="") {
	          	$error[] = "Nhập num Submissions!";
	       	}
	       	else
	       	{
	          	try
	          	{
			        //thay đổi dữ liệu database
					$sql = "update email_logs
							set to_email = '".$toEmail."',subject = '".$subject."',view = '".$view."',parameter = '".$parameter."',status = '".$status."',type = '".$type."',num_submissions = '".$numSubmissions."',udpated_by = '".$_SESSION['id']."'
							where id = '".$_GET['edit']."'";
					$stmt = $conn->prepare($sql);
					$stmt->execute();
					header("location:manageDatabase.php?page=email_logs");
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
		$sql = "DELETE from email_logs
				where id = '".$_GET['del']."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		setcookie("success","xóa thành công",time()+1,"/","");
		header("location:manageDatabase.php?page=email_logs");
	}
	//kiểm tra insert
	else if(isset($_GET['insert'])){
?>
		<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="subject-Type" subject="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" subject="IE=edge">
	<meta name="viewport" subject="width=device-width, initial-scale=1">

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
		<!-- page subject -->
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
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">to email </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="toEmail" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">subject </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="subject" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">view </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="view" class="form-control" />
								</div>
							</div>	
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">parameter </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="parameter" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">status </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="status" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">type </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="type" class="form-control" />
								</div>
							</div>
							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">num submissions </label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="numSubmissions" class="form-control" />
								</div>
							</div>			
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<a href="manageDatabase.php?page=email_logs" class="btn btn-primary ">Back</a>
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
			$toEmail = trim($_POST["toEmail"]);
			$subject = trim($_POST["subject"]);
			$view = trim($_POST["view"]);
			$parameter = trim($_POST["parameter"]);
			$status = trim($_POST["status"]);
			$type = trim($_POST["type"]);
			$numSubmissions = trim($_POST["numSubmissions"]);

			if($toEmail=="") {
	          	$error[] = "Nhập to email!"; 
	       	}
	       	else if($view=="") {
	          	$error[] = "Nhập view!";
	       	}
	       	else if($subject=="") {
	          	$error[] = "Nhập subject!"; 
	       	}
			else if($parameter=="") {
	          	$error[] = "Nhập parameter!";
	       	}
	       	else if($status=="") {
	          	$error[] = "Nhập status!";
	       	}
	       	else if($type=="") {
	          	$error[] = "Nhập type!";
	       	}
	       	else if($numSubmissions=="") {
	          	$error[] = "Nhập num Submissions!";
	       	}
	       	else
	       	{
		        try
		        {
		             
	             	$sql = "INSERT into email_logs (to_email,subject,view,parameter,status,type,num_submissions,created_by)
	                		VALUES ('".$toEmail."','".$subject."','".$view."','".$parameter."','".$status."','".$type."','".$numSubmissions."','".$_SESSION['id']."')";
	                $stmt = $conn->prepare($sql);
	                $stmt->execute();
	                header("location: manageDatabase.php?page=email_logs");
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
    <meta http-equiv="subject-Type" subject="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" subject="IE=edge">
    <meta name="viewport" subject="width=device-width, initial-scale=1">

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
							<th>to email</th>
							<th>subject</th>
							<th>view</th>
							<th>parameter</th>
							<th>status</th>
							<th>type</th>
							<th>num submissions</th>
							<th>send at</th>
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
	$sql = "select * from email_logs";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr><td>'.$row['id'].'</td>';
		echo '<td>'.$row['to_email'].'</td>';
		echo '<td>'.$row['subject'].'</td>';
		echo '<td>'.$row['view'].'</td>';
		echo '<td>'.$row['parameter'].'</td>';
		echo '<td>'.$row['status'].'</td>';
		echo '<td>'.$row['type'].'</td>';
		echo '<td>'.$row['num_submissions'].'</td>';
		echo '<td>'.$row['send_at'].'</td>';
		echo '<td>'.$row['created_at'].'</td>';
		echo '<td>'.$row['updated_at'].'</td>';
		echo '<td>'.$row['deleted_at'].'</td>';
		echo '<td>'.$row['created_by'].'</td>';
		echo '<td>'.$row['udpated_by'].'</td>';
		echo '<td>'.$row['deleted_by'].'</td>';
?>
		<td>
			<a href="manageDatabase.php?page=email_logs&&edit=<?php echo $row['id'];?>" class=" btn-outline-dark ">Sửa</a>
			<a href="manageDatabase.php?page=email_logs&&del=<?php echo $row['id'];?>" class=" btn-outline-dark ">Xóa</a>
		</td>
		</tr>
<?php
	}
?>

                      </tbody>
					</table>
					<a href="manageDatabase.php?page=email_logs&&insert" class="btn btn-outline-dark" >Thêm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	</div>
	
          
        <!-- /page subject -->

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